@extends('layouts.master')

@section('content')
    <article>
        <header>
            <h1>{{ $page->title }}</h1>
        </header>
        <div class="content">
            {!! $page->body !!}
        </div>
    </article>
@stop

@section('title')
    {{ $page->title }} ::
@stop
