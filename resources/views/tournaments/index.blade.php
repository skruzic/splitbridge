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
                    @if($t->remote_id > 0)
                        <td><a href="{{ url('https://bridge.hr/tournaments/pairs/'.$t->remote_id) }}" class="btn btn-outline-primary btn-sm"
                               target="_blank">Rezultati</a></td>
                    @else
                        <td><button disabled class="btn btn-outline btn-sm" target="_blank">Rezultati</button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tournaments->links() }}
@stop

@section('title')
    Turniri ::
@stop
