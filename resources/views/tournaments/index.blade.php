@extends('layouts.master')

@section('content')
    <h1>Klupski turniri</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Dan</th>
                <th>Vrsta</th>
                <th><span class="fa fa-cog"></span></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tournaments as $t)
                <tr>
                    <td>{{ date('d.m.Y.', strtotime($t->date)) }}</td>
                    <td>{{ mb_strtolower(strftime('%A', strtotime($t->date))) }}</td>
                    <td>{{ $t->type }}</td>
                    <td><a href="{{ url('tournaments/' . $t->id) }}" class="btn btn-default btn-xs"
                           target="_blank">Rezultati</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tournaments->links() }}
@stop

@section('title')
    Turniri ::
@stop
