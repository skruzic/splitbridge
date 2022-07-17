@extends('layouts.master')

@section('content')
    <h1>Sezone</h1>
    <ul>
        @foreach ($seasons as $season)
            <li><a href="{{ route('ranks.season', ['id' => $season->id]) }}">{{ $season->title }}</a></li>
        @endforeach
    </ul>
@stop

@section('title')
    Sezone ::
@stop
