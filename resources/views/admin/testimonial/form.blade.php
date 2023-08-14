@extends('layouts.admin')
@section('title', $testimonial->exists? 'Editer le témoignages' : 'Ajouter un temoignatge')
@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($testimonial->exists? 'admin.testimonial.update' : 'admin.testimonial.store', $testimonial) }}"  method="post" enctype="multipart/form-data">
        @csrf
        @method($testimonial->exists? 'put' : 'post')

        <div class="row">
        @include('shared.input', ['class'=>'col','label'=> 'Nom', 'name' => 'name',"value"=> $testimonial->name])
        @include('shared.input', ['class'=>'col','label'=> 'Prenoms', 'name' => 'second_name',"value"=> $testimonial->second_name])
        </div>
        <div class="col row">
            @include('shared.input', ['class'=>'col','label'=> 'Type de Personne', 'name' => 'type',"value"=> $testimonial->type])
        </div>
        <div class="row d-flex ">
            @include('shared.file', ['class'=>'col','label'=> 'Image', 'name' => 'image',"value"=> $testimonial->image]) 
            @if (isset($testimonial->image))
            <img src="/storage/{{$testimonial->image}}" alt="" width="100%" height="auto">
            @endif
           </div>
        @include('shared.input', [ 'type'=>'textarea','class'=>'col', 'name' => 'description',"value"=> $testimonial->description])  





        
        <button class="btn btn-success">
            @if ($testimonial->exists)
            Modifier     
            @else
            Créer   
            @endif 
        </button>
    </form>
@endsection