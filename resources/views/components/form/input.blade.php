@props(['name','type'=>'text','required'=>'required','value'=>''])
<x-form.input-wrapper>
<x-form.label :name="$name"/>
<input {{$required}} type="{{$type}}" class="form-control" id="{{$name}}" name="{{$name}}" value="{{old($name,$value)}}">
<x-form.error :name="$name"/>
</x-form.input-wrapper>
