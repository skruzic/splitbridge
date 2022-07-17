@extends('layouts.master')

@section('content')
    <article>
        <header>
            <h1>{{ $article->title }}</h1>
            <div class="meta clearfix">
                <div class="date"><i class="fa fa-clock-o"></i> {{ date('d.m.Y. H:i', strtotime($article->published_date)) }}</div>
            </div>
        </header>
        <div class="content">
            {!! $article->body !!}
        </div>
    </article>
@stop

@section('title')
    {{ $article->title }} ::
@stop
