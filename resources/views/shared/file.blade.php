@php
    $class ??=null;
    $value ??= '';

@endphp
<div @class(['form-group', $class])>
    <label class="formFile" for="{{$name}}"> <h3>{{$label}}</h3></label>
    <input type="file" value="{{ old($name, $value)}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" >
    @error($name)
    <div class="invalid-feedback">  
        {{ $message }}
    </div>
@enderror
</div>