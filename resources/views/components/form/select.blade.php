@props(['id', 'label', 'selected', 'name', 'value'])

<label for="{{$id}}">{{$label}}</label>
<select
    id="{{$id}}"
    name="{{$name}}"
    {{$attributes->class(['form-control','is-invalid'=>errors->has($name)])}}
>
    <option value="" ></option>
        @foreach ($options as $key => $text)
        <option value="{{$key}}"@if($key == old($name,$selected)) selected @endif>$text</option>
        @endforeach
</select>
    @error('{{$name}}')
    <div class="alert alert-danger invalid-feedback">
        {{ $message }}
    </div>
    @enderror



    <select class="form-control " id="parent_id" name="parent_id" >
        <option value="" ></option>
        @foreach ($parents as $parent)
        <option value="{{$parent->id}}"@if($parent->id == old('parent_id',$category->parent_id)) selected @endif>{{$parent->name}}</option>
        @endforeach
    </select>
