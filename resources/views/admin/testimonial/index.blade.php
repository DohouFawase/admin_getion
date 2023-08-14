@extends('layouts.admin')
@section('title', 'Les temoignages')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route( 'admin.testimonial.create') }}" class="btn btn-primary">Ajouter Des temoignages</a>

    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Type de Personne</th>
                <th>Second Name</th>
                <th>temoignages</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{$testimonial->id}}</td>
                    <td><img src="/storage/{{$testimonial->image}}" alt=""></td>
                    <td>{{$testimonial->name}}</td>
                    <td>{{$testimonial->second_name}}</td>
                    <td>{{$testimonial->type}}</td>
                    <td>{{Str::limit($testimonial->description,20,'...')}}</td>

                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.testimonial.edit', $testimonial)}}" class="btn btn-primary">Modifier</a>
                            <form id="delete-form" action="{{route('admin.testimonial.destroy', $testimonial)}}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection