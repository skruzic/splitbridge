@extends('layouts.master_sidebar')

@section('content')
    <h1>Sezone</h1>
    <div class="list-group">
        @foreach ($seasons as $season)
            <a class="list-group-item list-group-item-action" href="{{ route('ranks.season', ['id' => $season->id]) }}">{{ $season->title }}</a>
        @endforeach
    </div>
@stop

@section('title')
    Sezone ::
@stop
