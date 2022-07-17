@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('contact.send') }}">

        @csrf
        <div class="form-group">
            <label>Ime</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ime"/>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"/>
        </div>
        <div class="form-group">
            <label>Poruka</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Poruka" rows="3"></textarea>
        </div>

        <input type="submit" name="send" value="Pošalji" class="btn btn-default"/>
    </form>
@stop

@section('title')
    Kontakt ::
@stop
