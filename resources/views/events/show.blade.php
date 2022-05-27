@extends('layouts.app')

@section('content')
    <div class="container mt-30">
        <div class="my-5">
            <label class="h1 col-10">Event Information</label>
            <hr/>
        </div>
        <div class="row mb-3">
            <label class="col-3 font-weight-bold">Name</label>
            <div class="col-9">{{$event->name}}</div>
        </div>
        <div class="row mb-3">
            <label class="col-3 font-weight-bold">Slug</label>
            <div class="col-9">{{$event->slug}}</div>
        </div>
        <div class="row mb-3">
            <label class="col-3 font-weight-bold">Start At</label>
            <div class="col-9">{{$event->startAt}}</div>
        </div>
        <div class="row">
            <label class="col-3 font-weight-bold">End At</label>
            <div class="col-9">{{$event->endAt}}</div>
        </div>
    </div>
@endsection
