@extends('layouts.event')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Create Event</h1>
            <form action="{{route('events.store')}}" method="POST">
                @csrf

                <x-form-text field-type="text" field-label="Name" field-name="name"/>
                <x-form-text field-type="text" field-label="Slug" field-name="slug"/>
                <x-form-text field-type="datetime-local" field-label="Start At" field-name="startAt"/>
                <x-form-text field-type="datetime-local" field-label="End At" field-name="endAt"/>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button class="btn btn-primary" type="submit">Create Event</button>
                            <a role="button" href="{{route('events.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
