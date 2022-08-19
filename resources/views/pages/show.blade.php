@extends('layouts.master')

@section('content')
    <article>
        <header>
            <h1>{{ $page->title }}</h1>
        </header>
        <div class="py-5">
            {!! $page->body !!}
        </div>
    </article>
@stop

@section('title')
    {{ $page->title }} ::
@stop
