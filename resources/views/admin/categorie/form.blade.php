@extends('layouts.admin')
@section('title', $category->exists ? 'Modifier une Categorie' : 'Ajouter une Categorie')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($category->exists? 'admin.categorie.update' : 'admin.categorie.store', $category ) }}" method="post">
    @csrf
    @method($category->exists? 'put' : 'post')
<div class="row">
    @include('shared.input', ['class'=>'col','label'=> 'Name', 'name' => 'name',"value"=> $category->name])
</div>
    



<button class="btn btn-success">
    @if ($category->exists)
    
    Modifier     
    @else
    Créer   
    @endif 
</button>

    </form>
@endsection
    
