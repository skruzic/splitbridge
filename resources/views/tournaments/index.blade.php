@extends('layouts.master')

@section('content')
    <h1>Klupski turniri</h1>
    <table class="table table-responsive table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Datum</th>
                <th scope="col">Dan</th>
                <th scope="col">Obračun</th>
                <th scope="col"><i class="bi-eye"/></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tournaments as $t)
                <tr>
                    <td>{{ $t->date->format('d.m.Y.') }}</td>
                    <td>{{ $t->date->dayName }}</td>
                    <td>{{ $t->type }}</td>
                    <td><a href="{{ url('tournaments/' . $t->id) }}" class="btn btn-outline-primary btn-sm"
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
