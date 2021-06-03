<div class="form-group{{ $errors->has('region_id') ? 'has-error' : ''}}">
    <label class="control-label" for="">Viloyat nomi</label>
    <select name="region_id" id="" class="form-control" required>
        @foreach ($regions as $region)
            
        <option @isset($district)
            {{ $district->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}">{{ $region->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('region_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Tuman nomi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Yangilash' : 'Saqlash', ['class' => 'btn btn-primary']) !!}
</div>
