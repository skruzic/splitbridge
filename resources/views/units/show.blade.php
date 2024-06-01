@extends('layouts.master')

@php
    $total = $boards->reduce(fn (?float $acc, $b) => $acc + ($unit['pairNumber'] == $b['pairNS'] ? $b['pointsNS'] : $b['pointsEW']), 0);
@endphp

@section('content')
    <h3 class="text-3xl mb-4">PAR: {{ $unit['player1'] }} - {{ $unit['player2'] }}</h3>

    <x-dynamic-component :component="strtolower('scorecard.'.$t->type)" :boards="$boards" :unit="$unit"/>
@stop

@section('title')
    Turnir {{ $t->date->format('d.m.Y.') }} ::
@stop
