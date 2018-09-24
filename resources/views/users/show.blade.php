@extends("layouts.layout")
@include('partials._nav')
@section('content')
  <div class="title">
      Show User
  </div>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">email</th>
        <th scope="col">Animal - One to One</th>
        <th scope="col">Articles - One to Many</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"> {{$user->id}}  </th>
        <td>{{ $user->name ?? 'NONAME' }}</td>
        <td>{{ $user->email }}</td>
        <td>{!! $user->animal->type ?? '<span class="badge badge-secondary">No animal</span>' !!}</td>
        <td>
          <ul>
              @forelse($user->article as $article)
                
                <li>  <span> - </span> {{ $article->title }} </li>
              @empty
                  <span class="badge badge-secondary">No articles</span>
              @endforelse
           </ul>  
        </td>
      </tr>
    </tbody>
  </table>
<hr>
<a href="{{route('users.index')}}" class="btn btn-outline-primary">Назад</a>
                
@endsection