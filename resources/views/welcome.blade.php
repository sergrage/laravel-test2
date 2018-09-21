@extends("layout")

@section('content')
<div class="title">
    Laravel Relationships
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">email</th>
      <th scope="col">Animal - One to One</th>
      <th scope="col">Articles - One to Many</th>
      <th scope="col">CRUD</th>
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
      <td>
          <a class="btn btn-outline-success" href="{{ action ('IndexController@show', [$person->id])  }}">Show</a>
          <a class="btn btn-outline-primary" href="{{route('users.edit', $person->id)}}">Edit</a>
          <a class="btn btn-outline-danger" href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
                
