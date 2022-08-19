@extends('layouts.master_sidebar')

@section('content')
    @if ($articles->isEmpty())
        <p class="lead">Trenutno nema objavljenih vijesti!</p>
    @else
        @foreach ($articles as $article)
            <article>
                <header>
                    <h1><a href="{{ url('articles/' .$article->id) }}">{{$article->title}}</a></h1>
                    <div class="meta clearfix">
                        <div class="date"><i
                                class="fa fa-clock-o"></i> {{ date('d.m.Y. H:i', strtotime($article->published_date)) }}
                        </div>
                    </div>
                </header>
                <div class="content">
                    @if (empty($article->summary))
                        {!! $article->body !!}
                    @else
                        {{ $article->summary }}
                        <div class="clearfix">
                            <a class="btn btn-default"
                               href="{{ url('articles/' .$article->id) }}">Više...</a>
                        </div>
                    @endif
                </div>
            </article>
        @endforeach
        {{$articles->links() }}
    @endif
@endsection
