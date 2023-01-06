@extends('layouts.master_sidebar')

@section('content')
    <h1>Rang lista za sezonu {{ $season->title }}</h1>
    <table class="table table-striped" id="dec">
        <thead>
            <tr>
                <th>#</th>
                <th>Član</th>
                <th>Bodovi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranks as $rank)
                <tr>
                    <td>{{ $count++ }}.</td>
                    <td><a href="{{ route('members.show', $rank->id) }}">{{ $rank->surname}} {{$rank->name }}</a></td>
                    <td>{{ number_format($rank->point_count, 2, ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('title')
    Rang lista za sezonu {{ $season->title }} ::
@stop
