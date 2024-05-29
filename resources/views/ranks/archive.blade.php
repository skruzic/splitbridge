@extends('layouts.master_sidebar')

@section('content')
    <h1 class="text-4xl mb-4">Sezone</h1>
    <ul>
        @foreach ($seasons as $season)
            <li>
                <a href="{{ route('ranks.season', ['id' => $season->id]) }}">{{ $season->title }}</a>
            </li>
        @endforeach
    </ul>
@stop

@section('title')
    Sezone ::
@stop
