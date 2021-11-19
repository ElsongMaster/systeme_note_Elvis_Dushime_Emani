@extends('back.template.main')










@section('backContent')

    <div class="container">

        <h2 class="text-center fs-2 text-decoration-underline">Toute les données de notes</h2>



        <div class="d-flex flex-wrap ">
            @foreach ($notes as $note )
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$note->titre}}</h5>
                        <p class="card-text text-center ckeditor">{{html_entity_decode($note->texte)}}</p>
                        <div class="tagContent d-flex justify-content-between w-25 mx-auto">
                            @foreach ($note->tags as $tag )
                                
                            <a href="#" class="card-link">#{{$tag->nom}}</a>

                            @endforeach
                        </div>
                        <div class="d-flex justify-content-evenly w-25 mx-auto">
                            @can('auteur_note',$note->id)
                                
                            
                            <form action="{{route('notes.destroy', $note->id)}}" method="POST" class="d-flex justify-content-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger my-2"><i class="fas fa-trash-alt"></i></button>

                            </form>
                            @endcan
                            <a href="{{route('notes.edit',$note->id)}}" class="btn btn-warning my-2 mr-2"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>

                    

                </div>
            @endforeach
                
            <div class="container d-flex justify-content-center">
            
                <a href="{{route('notes.create')}}" class="btn btn-warning p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-secondary fs-2"></i></a>
            </div>
        </div>
    </div>
@endsection