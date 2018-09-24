@extends("layouts.layout")
@include('partials._nav')
@section('content')
  <div class="title">
      Create User
  </div>
  <div class="container">
  	<form action="{{ route('users.store') }}" method="POST" accept-charset="utf-8">
      @csrf
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputName">Name</label>
	    <input type="text" name="name" class="form-control col-10" id="inputName" placeholder="Enter name">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputEmail">Email</label>
	    <input type="email" name="email" class="form-control col-10" id="inputEmail" placeholder="Enter email">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputAnimalName">Animal Name</label>
	    <input type="text" name="animalName" class="form-control col-10" id="inputAnimalName" placeholder="Enter Pet Name">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputAnimalType">Animal Type</label>
	    <input type="text" name="animalType" class="form-control col-10" id="inputAnimalType" placeholder="Enter Pet Type">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputRole">User Role</label>
	    <select multiple id="inputRole" class="form-control col-10" name="roles[]">
        	<option>admin</option>
        	<option>moderator</option>
        	<option selected>user</option>
      </select>
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<hr>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<a href="{{route('users.index')}}" class="btn btn-outline-primary">Назад</a>
  </div>
@endsection