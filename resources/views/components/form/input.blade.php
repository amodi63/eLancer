@props(['id', 'label', 'type'=> 'text', 'name', 'value'])

    <label for="{{$id}}">{{$label}}</label>
    <input
     type="{{$type}}"
     id="{{$id}}"
     name="{{$name}}"
     value = "{{old($name, $value)}}">
    {{$attributes->class(['form-control','is-invalid'=>errors->has($name)])}}
    />
    @error('{{$name}}')
    <div class="alert alert-danger invalid-feedback">
        {{ $message }}
    </div>
    @enderror
