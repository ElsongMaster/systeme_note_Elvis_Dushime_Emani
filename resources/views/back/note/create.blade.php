@extends('back.template.main')








@section('backContent')
<div class="container d-flex flex-column  mb-2 w-75">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
          <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


 <h1 class="text-center my-3"> Create Data Note </h1>

<form action="{{route('notes.store')}}" method="post"  enctype="multipart/form-data">
    @csrf



<div class="mb-3">
    <label for="titre" class="form-label">Titre</label>
    <input type="text" value = "{{old('titre')}}"   class="form-control" id="titre" name="titre" >
</div>
<div class="mb-3">
    <label for="texte" class="form-label">Texte </label>
    <input type="text" value = "{{old('texte')}}"   class="form-control" id="texte" name="texte" >
</div>
<div class="mb-3">
    <label for="tags" class="form-label">Tags</label>
    <select  id="mon-select"  class="selectpicker" multiple name="tags[]" id="tags" >
        @foreach ($tags as $tag )
            
            <option value="{{$tag->id}}">{{$tag->nom}}</option>
        @endforeach
    </select>
</div>
<script>
    $(document).ready(function() {
        $('#mon-select').selectpicker();
    });
</script>







<div class="d-flex justify-content-center">

    <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>

</div>
@endsection
