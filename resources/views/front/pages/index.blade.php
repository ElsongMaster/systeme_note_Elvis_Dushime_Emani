@extends('front.template.main')





@section('content')
    <h1 class="text-center">Pages principales</h1>



    <a href="{{route('notes.create')}}" class="btn btn-info">créer une note</a>

    <div class="container-fluid">
        <h2>Liste des notes</h2>
        <div class="container">
        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
        </div>
    </div>
@endsection