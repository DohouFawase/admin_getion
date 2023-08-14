@extends('layouts.admin')

@section('title', $product->exists ? "Editer le Product" : "Créer un Product")

@section('content')
    
<h1>@yield('title')</h1>
    <form action="{{route($product->exists? 'admin.product.update':'admin.product.store', $product )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method($product->exists ? 'put' : 'post')
        <div class="col row ms-5">
            @include('shared.checkbox', ['name'=>'stock', 'label'=>"disponible", 'value'=> $product->stock])
        </div>
        <div class="row">
        @include('shared.input', ['class'=>'col','label'=> 'Titre', 'name' => 'title',"value"=> $product->title])
            <div class="col row">
        @include('shared.input', ['class'=>'col','label'=> 'Prix', 'name' => 'price',"value"=> $product->price]) 
            </div>
        </div>
        @include('shared.file', ['class'=>'col','label'=> 'Image', 'name' => 'image',"value"=> $product->image]) 

        @include('shared.input', [ 'type'=>'textarea','class'=>'col', 'name' => 'description',"value"=> $product->description])  


        <div>
            <button class="btn btn-success">
                @if ($product->exists)
                Modifier     
                @else
                Créer   
                @endif  
            </button>
        </div>
    </form>
@endsection