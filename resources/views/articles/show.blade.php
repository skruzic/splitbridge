@extends('layouts.master')

@section('content')
    <article class="mb-4">
        <h1 class="text-4xl text-primary mb-2">{{ $article->title }}</h1>
        <div class="*:mb-4">
            {!! $article->body !!}
        </div>
    </article>
@stop

@section('title')
    {{ $article->title }} ::
@stop
