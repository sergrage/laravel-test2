@extends("layouts.layout")
@include('partials._nav')
@section('content')
<div class="title">
    Laravel Relationships - <a class="btn btn-success" href="{{route('users.create')}}">Create new user</a>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Animal - One to One</th>
      <th scope="col">Articles - One to Many</th>
      <th scope="col">Roles - Many to Many</th>
      @if(Auth::check())
      <th scope="col">CRUD</th>
      @endif
    </tr>
  </thead>
  <tbody>
  @foreach($users as $person)
    <tr>
      <th scope="row"> {{$person->id}}  </th>
      <td>{{ $person->name ?? 'NONAME' }}</td>
      <td>{{ $person->email }}</td>
      <td>{!! $person->animal->type ?? '<span class="badge badge-secondary">No animal</span>' !!}</td>
      <td>
        <ul>
            @forelse($person->article as $article)
              <li>  <span> - </span> {{ $article->title }} </li>
            @empty
                <span class="badge badge-secondary">No articles</span>
            @endforelse
         </ul>
         <hr>
         <form class="form form__body" method="POST" action="{{route('artical.create')}}">
          @csrf
          <div class="form__close">X</div>
          <div class="form-group">
            <label for="articalTitle">Article Title</label>
            <input type="text" name="title" id="articalTitle" class="form-control">
            <input type="hidden" name="userId" value="{{$person->id}}">
            <small id="passwordHelpInline" class="text-muted">
              Must be 8-255 characters long.
            </small>
          </div>
           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
         <button class="btn btn-warning btn-sm pt-1 action_form_button">Add Article Title</button>  
      </td>
      <td>
        @foreach($person->roles as $role)
          <span class="badge badge-primary">{{$role->name}}</span>
        @endforeach
      </td>
      @if(Auth::check())
      <td>
          <a class="btn btn-outline-success" href="{{ action ('IndexController@show', [$person->id])  }}">Show</a>
          <a class="btn btn-outline-primary" href="{{route('users.edit', $person->id)}}">Edit</a>
          <form class="form-inline" action="{{ route('users.destroy', $person->id) }}" method="POST" accept-charset="utf-8">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger">Delete</button>
          </form>
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
                
