@extends('layouts.event')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($data['fact']))
           <div class="col-12">
                <h3>Fact</h3>
                <h4>{{$data['fact']}}</h4>
               {{--<table class="table table-striped">
                   <tbody>
                   <tr>
                       @foreach($fieldList as $field)
                           <th>{{$field}}</th>
                       @endforeach

                   </tr>
                   </tbody>


                   @foreach($data['entries'] as $entries)
                       <tr>
                           @foreach($fieldList as $field)
                               <th>{{$entries[$field] ?? '--'}}</th>
                           @endforeach
                       </tr>
                   @endforeach

               </table>--}}
           </div>
                @endif
        </div>
    </div>
@endsection
