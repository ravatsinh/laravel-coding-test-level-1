@extends('layouts.event')

@section('content')
    <div class="container mt-30">
        <div class="row">
            <h1>Edit Event</h1>

            <form  action="{{route('events.update', $event->id)}}" method="POST">
                @csrf
                @method('PUT')
                @if(isset($event))
                    <input type="hidden" value="{{$event->id}}" name="id">
                @endif

                @php
                    $startAt = date('Y-m-d\TH:i:s',strtotime($event->startAt));
                    $endAt = date('Y-m-d\TH:i:s',strtotime($event->endAt));
                @endphp

                <x-form-text field-type="text" field-label="Name" field-name="name" :field-value="$event->name"/>
                <x-form-text field-type="text" field-label="Slug" field-name="slug" :field-value="$event->slug"/>
                <x-form-text field-type="datetime-local" field-label="Start At" field-name="startAt"
                             :field-value="$startAt"/>
                <x-form-text field-type="datetime-local" field-label="End At" field-name="endAt" :field-value="$endAt"/>



                <div class="mb-3">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a role="button" href="{{route('events.index')}}" class="btn btn-danger">Cancel</a>
                            <button class="btn btn-primary " type="submit">Update</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
