@extends("layouts.layout")
@include('partials._nav')
@section('content')
  <div class="title">
      Edit User Profile
  </div>
  <div class="container">
  	<form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="utf-8">
  	  @method('PUT')
      @csrf
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputName">Name</label>
	    <input type="text" name="name" class="form-control col-10" id="inputName" value="{{ $user->name }}" placeholder="Enter name">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputEmail">Email</label>
	    <input type="email" name="email" class="form-control col-10" id="inputEmail" value="{{ $user->email }}" placeholder="Enter email">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputAnimalName">Animal Name</label>
	    <input type="text" name="animalName" class="form-control col-10" id="inputAnimalName" value="{{ $user->animal->name }}" placeholder="Enter Pet Name">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputAnimalType">Animal Type</label>
	    <input type="text" name="animalType" class="form-control col-10" id="inputAnimalType" value="{{ $user->animal->type }}" placeholder="Enter Pet Type">
	  </div>
	  <div class="form-group row">
	    <label class="col-2 col-form-label" for="inputRole">User Role</label>
	    <select id="inputRole" class="form-control col-10" name="role">
        	<option>Admin</option>
        	<option>Moderator</option>
        	<option selected>User</option>
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