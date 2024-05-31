@extends('layouts.master')

@section('content')
    <h1 class="text-4xl mb-4">Turnir {{ $t->date->format('d.m.Y.') }} - {{ $t->type }}</h1>

    <x-dynamic-component :component="strtolower('ladder.'.$t->type)" :ranks="$ranks" :tournament_id="$t->id"/>

    <h3 class="text-2xl my-4">Travellers</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @if (count($t->sessions) == 1)
            @foreach($t->sessions[0]->boards as $board)
                <div>
                    <x-diagram :board="$board"/>
                    <x-diagram.travellers :travellers="$board->travellers" :type="$t->type"/>
                </div>
            @endforeach
        @else
            više sjednica
        @endif
    </div>
@stop

@section('title')
    Turnir {{ $t->date->format('d.m.Y.') }} ::
@stop
