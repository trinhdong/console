<style>
    .radio {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 20px;
        cursor: pointer;
        font-size: 20px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    input:checked ~ .checkmark:after {
        display: block;
    }

    .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>
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
