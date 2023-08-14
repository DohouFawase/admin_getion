@extends('layouts.admin')

    @section('title', 'Tous les product')
        
   
@section('content')
   <div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.product.create')}}" class="btn btn-primary">Ajouter un product</a>
    
   </div>
   <table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Image</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Price</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="text-center">
                <td>{{$product->id}}</td>
                <td><img src="/storage/{{$product->image}}" alt=""></td>
                <td>{{$product->title}}</td>
                <td>{{$product->description }}</td>
                <td>{{number_format($product->price, thousands_separator: ' ')}}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{route('admin.product.edit', $product)}}" class="btn btn-primary">Modifier</a>
                        <form id="delete-form" action="{{route('admin.product.destroy', $product)}}" method="post">
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
   {{ $products->links() }}
@endsection