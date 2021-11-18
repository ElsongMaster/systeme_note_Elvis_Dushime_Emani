@extends('front.template.main')




@section('content')
<h2 class="text-center">Voici les données de l'user:</h2>
<div class="a-box">
  <div class="img-container">
    <div class="img-inner">
      <div class="inner-skew">
        {{-- <img src="{{$user->image}}"> --}}
        @if (Storage::disk('public')->exists('img/'.$user->image))
        
            <img src="{{asset('img/'.$user->image)}}"  alt="...">
        @else
            <img src="{{$user->image}}"  alt="...">
        
        @endif
      </div>
    </div>
  </div>
  <div class="text-container">
    <h3>{{$user->name}}</h3>
    <p>{{$user->role->nom}}</p>
    <p>{{$user->email}}</p>

    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-flex justify-content-center">
        @method('DELETE')
        @csrf
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning my-2 mr-2"><i class="fas fa-edit"></i></a>
            <button type="submit" class="btn btn-danger my-2"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
<style>
body {
  text-align: center;
  padding: 30px;
  background: #f8f4f2;
  font-family: Arial;
}

.a-box {
  display: inline-block;
  width: 240px;
  text-align: center;
}

.img-container {
    height: 230px;
    width: 200px;
    overflow: hidden;
    border-radius: 0px 0px 20px 20px;
    display: inline-block;
}

.img-container img {
    transform: skew(0deg, -13deg);
    height: 250px;
    margin: -35px 0px 0px -70px;
}

.inner-skew {
    display: inline-block;
    border-radius: 20px;
    overflow: hidden;
    padding: 0px;
    transform: skew(0deg, 13deg);
    font-size: 0px;
    margin: 30px 0px 0px 0px;
    background: #c8c2c2;
    height: 250px;
    width: 200px;
}

.text-container {
  box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
  padding: 120px 20px 20px 20px;
  border-radius: 20px;
  background: #fff;
  margin: -120px 0px 0px 0px;
  line-height: 19px;
  font-size: 14px;
}

.text-container h3 {
  margin: 20px 0px 10px 0px;
  color: #04bcff;
  font-size: 18px;
}
</style>
@endsection