@extends('layouts.master_sidebar')

@section('content')
    <h1>Članovi kluba</h1>

    <table class="table table-responsive table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Prezime</th>
                <th scope="col">Ime</th>
                <th scope="col">HBS #</th>
                <th scope="col"><i class="bi bi-eye"/></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->surname }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->crobridge }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-info-circle-fill"></i> Detalji</a>
                        @if ($member->crobridge)
                            <a href="https://bridge.hr/ranking/{{$member->crobridge}}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="bi bi-person"></i> HBS profil</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('title')
    Članovi kluba ::
@stop
