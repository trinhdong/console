@foreach($pets as $key => $pet)
    <label class="radio">
        {{$pet}}
        {{ Form::radio('pet_id', $key, '', ['class' => 'optradio']) }}
        <span class="checkmark"></span>
    </label>
@endforeach
@if ($errors->has('pet_id'))
    <p class="help is-danger">{{ $errors->first('pet_id') }}</p>
@endif
@include('admin.elements.button.next_step')
