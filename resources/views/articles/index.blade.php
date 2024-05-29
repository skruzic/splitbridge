@extends('layouts.master_sidebar')

@section('content')
    @if ($articles->isEmpty())
        <p class="lead">Trenutno nema objavljenih vijesti!</p>
    @else
        @foreach ($articles as $article)
            <article class="mb-4">
                <h1 class="text-4xl text-primary mb-2">
                    <a href="{{ url('articles/' .$article->id) }}">{{$article->title}}</a>
                </h1>
                <div class="flex items-center">
                    <i class="fa fa-clock-o"></i>
                    {{ date('d.m.Y. H:i', strtotime($article->created_at)) }}
                </div>
                <div class="*:mb-4">
                    @if (empty($article->summary))
                        {!! $article->body !!}
                    @else
                        {!!  $article->summary !!}
                        <a class="text-primary hover:underline" href="{{ url('articles/' .$article->id) }}">Više...</a>
                    @endif
                </div>
            </article>
        @endforeach
        {{$articles->links() }}
    @endif
@endsection
