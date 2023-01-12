@extends('layouts.master_sidebar')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('contact.send') }}">

        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ime</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ime" required/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required/>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Poruka</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Poruka" rows="3" required></textarea>
        </div>
        @if (config('services.recaptcha.key'))
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}" />
        @endif

        <input type="submit" name="send" value="Pošalji" class="btn btn-outline-primary"/>
    </form>
@stop

@section('title')
    Kontakt ::
@stop
