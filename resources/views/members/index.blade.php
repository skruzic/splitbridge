@extends('layouts.master')

@section('content')
    <h1>Članovi kluba</h1>

    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>Prezime</th>
                <th>Ime</th>
                <th>E-mail</th>
                <th>HBS</th>
                <th><span class="fa fa-cog"></span></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->surname }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->crobridge }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-default btn-xs pull-left">Detalji</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('title')
    Članovi kluba ::
@stop
