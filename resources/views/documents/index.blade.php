@extends('layouts.master_sidebar')

@section('content')
   <h1>Dokumenti</h1>
    @if($documents->isEmpty())
        <p class="lead">Trenutno nema objavljenih dokumenata!</p>
    @else
        <table class="table table-responsive table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Dokument</th>
                    <th scope="col"><i class="bi-eye"/></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->title }}</td>
                        <td><a href="{{ $document->getUrl() }}" class="btn btn-outline-primary btn-sm" target="_blank">Pregled</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@endsection
