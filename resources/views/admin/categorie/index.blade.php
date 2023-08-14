@extends('layouts.admin')
@section('title', "les categorie")


@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.categorie.create')}}" class="btn btn-primary">Ajouter un product</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="text-center">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.categorie.edit', $category)}}" class="btn btn-primary">Modifier</a>
                            <form id="delete-form" action="{{route('admin.categorie.destroy', $category)}}" method="post">
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
   {{ $categories->links() }}

@endsection