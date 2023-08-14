@extends('layouts.admin')
@section('title', $carousel->exists ? 'Editer le carousel' : 'Ajouter Un carousel')
    
@section('content')
    <h1>@yield('title')</h1>
    <form action="{{route($carousel->exists? 'admin.carousel.update':'admin.carousel.store', $carousel )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method($carousel->exists? 'put':'post')

        <div class="col">
        @include('shared.file', ['class'=>'col','label'=> 'Image', 'name' => 'image',"value"=> $carousel->image]) 
        <div class="row col">
        @include('shared.input', [ 'type'=>'textarea','class'=>'col', 'name' => 'note',"value"=> $carousel->note])  

        </div>            
        </div>




        <button class="btn btn-success">
            @if ($carousel->exists)
              Modifier  
            @else
               Créer 
            @endif
        </button>

    </form>
@endsection