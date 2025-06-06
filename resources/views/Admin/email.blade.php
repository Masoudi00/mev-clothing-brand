@extends('Master_page')
@section('title','email')

@section('content')
<h2 class="text-white fw-bolder  pt-5"> Envoyer un email :</h2>

<div class="container justify-content-center ">
    @include('incs.flash')
</div>
    <div class="container text-white fw-bold pt-5">
        <div class="row justify-content-center">
            <form action="{{ route('send.email') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="recipient_email">Recipient Email:</label>
                    <input type="email" class="form-control" name="recipient_email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Send Email</button>
            </form>
        </div>
    </div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

