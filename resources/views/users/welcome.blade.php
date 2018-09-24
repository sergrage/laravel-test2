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
      <th scope="col">First</th>
      <th scope="col">email</th>
      <th scope="col">Animal - One to One</th>
      <th scope="col">Articles - One to Many</th>
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
                
