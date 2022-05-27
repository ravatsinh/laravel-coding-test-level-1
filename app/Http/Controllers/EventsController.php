<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Notifications\EventCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EventsController extends Controller
{
    public function externalApi(){
        $data=[];
        try {
            $apiData=Http::get('https://catfact.ninja/fact')->body();
            $data=json_decode($apiData,true);
        }catch (\Exception $e){

        }
      /*  $fieldList=[
            "API",
        "Description",
        "Auth",
        "HTTPS",
        "Cors",
        "Link",
        "Category",
        ];
        dump($data);*/

        return view('external-api',['data'=>$data]);
    }
    public function index()
    {
        if (request()->ajax()) {

            $data = Event::query()->orderBy('createdAt');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return '<a href="'.route('events.show',$row->id).'">'.$row->name.'</a>';
                })
                ->addColumn('action', function ($row) {
                    $btnHtml = '<div class="btn-group">';
                    $btnHtml .= '<a href="' . route('events.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btnHtml .= '<form class= "" action="' . route('events.destroy', $row->id) . '" method="post">';
                    $btnHtml .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                    $btnHtml .= '<input type="hidden" name="_method" value="DELETE">';
                    $btnHtml .= '<button  type="submit" class="btn btn-danger btn-sm" data-id = "' . $row->id . '">Delete</button>';
                    $btnHtml .= '</form></div>';
                    return $btnHtml;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }


        return view('events.index');
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->validated());
        if ($event) {

            $request->user()->notify(new EventCreatedNotification($event));

            session()->flash('success', 'Event created successfully');
            return redirect()->route('events.index');
        }
        session()->flash('success', 'Something went wrong');
        return back();

    }

    public function show(Event $event)
    {
        return view('events.show',['event'=>$event]);
    }

    public function edit(Event $event)
    {
        return view('events.edit',['event'=>$event]);
    }

    public function update(EventUpdateRequest $request,Event $event)
    {
        /*$eventQuery = Event::where('slug', $request->get('slug', Str::slug($request->get('name'))));
        $slugUniqueCheck = $eventQuery->where('id', '!=', $event->id)->count();
        dd($slugUniqueCheck);
        if ($slugUniqueCheck > 0) {
            session()->flash('error','Slug already used please use different slug.');
            return back();
        }*/
        $event->fill($request->validated())->save();
        session()->flash('success','Event has been updated.');
        return response()->redirectToRoute('events.index');
    }

    public function destroy(Event $event)
    {
        if ($event->delete()) {
            session()->flash('success','Event has been deleted.');
            return response()->redirectToRoute('events.index');
        }
        session()->flash('error','Something goes wrong.');
        return response()->redirectToRoute('events.index');
    }
}
