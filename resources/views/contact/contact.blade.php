@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section id="contact" class="contact">
        <div class="row">
            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokacija:</h4>
                        <p>Osječka 24a, Split</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>E-mail:</h4>
                        <p>klub@splitbridge.hr</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-clock"></i>
                        <h4>Turniri:</h4>
                        <p>Ponedjeljkom i četvrtkom od 19:00 sati</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2893.7514006633655!2d16.451926616323895!3d43.50752137912666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13355e1c9909d345%3A0x9ecb86a56c10cc74!2sBridge%20klub%20Split!5e0!3m2!1sen!2shr!4v1673780193490!5m2!1sen!2shr"
                        style="border:0; width:100%; height:290px" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form method="post" action="{{ route('contact.send') }}" class="php-email-form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Ime</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ime" required/>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required/>
                    </div>
                    <div class="form-group mt-3">
                        <label for="content" class="form-label">Poruka</label>
                        <textarea type="text" class="form-control" name="content" id="content" placeholder="Poruka"
                                  rows="5"
                                  required></textarea>
                    </div>

                    <div class="text-center my-3">
                        <button type="submit" name="send">Pošalji</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

@section('title')
    Kontakt ::
@stop
