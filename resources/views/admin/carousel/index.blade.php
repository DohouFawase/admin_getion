@extends('layouts.admin')

@section('title', 'Carousels')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.carousel.create')}}" class="btn btn-primary">Ajouter un product</a>
</div>

<table class="table table-striped">
<thead>
    <tr>
        <td>ID</td>
        <td>Image</td>
        <td>Note</td>
        <td>Action</td>
    </tr>
</thead>
<tbody>
    @foreach ($carousels as $carousel)
        <tr>
            <td>{{$carousel->id}}</td>
            <td><img src="/storage/{{$carousel->image}}" alt=""></td>
            <td>{{Str::limit($carousel->note, 10, '...')}}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{route('admin.carousel.edit', $carousel)}}" class="btn btn-primary">Modifier</a>
                    <form id="delete-form" action="{{route('admin.carousel.destroy', $carousel)}}" method="post">
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
{{ $carousels->links() }}
   
@endsection