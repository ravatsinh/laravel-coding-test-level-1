<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use Illuminate\Support\Str;


class EventsController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new EventCollection(Event::all());
    }


    public function activeEvents()
    {
        return new EventCollection(Event::whereDate('startAt', '<=', now())->whereDate('endAt', '>', now())->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        //$validated['slug']=$request->get('slug',Str::slug($validated['name']));
        $event = Event::create($validated);
        return new EventResource($event);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if ($event) {
            return new EventResource($event);
        }
        return ['message' => "Resource not found"];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, $id)
    {

        $event = Event::find($id);
        $eventQuery = Event::where('slug', $request->get('slug', Str::slug($request->get('name'))));
        if ($request->isMethod('PUT')) {
            if (empty($event)) {
                $event = new Event;
                $event->id = $id;
            }
        }

        if (empty($event)) {
            return ['message' => "resource not found"];
        }
        $slugUniqueCheck = $eventQuery->where('id', '!=', $event->id)->count();
        if ($slugUniqueCheck > 0) {
            return ['message' => 'Slug already used please use different slug'];
        }
        foreach (['name', 'slug', 'startAt', 'endAt'] as $eventField) {
            if ($request->has($eventField)) {
                $event->{$eventField} = $request->{$eventField};
            }
        }

        $event->save();

        return new EventResource($event);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return ['message' => 'Event deleted successfully'];
        }
        return ['message' => "Resource not found"];

    }
}
