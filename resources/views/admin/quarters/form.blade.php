<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Viloyat nomi', ['class' => 'control-label']) !!}
    
    <select name="region_id" id="regions" class="form-control " required >
        <option value="">Tanlang</option>
        @foreach ($regions as $region)
            
        <option @isset($quarter)
            {{ $quarter->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}" >{{ $region->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('region_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Tuman yoki shahar nomi', ['class' => 'control-label']) !!}
    <select name="district_id" id="districts" class="form-control" required>
        <option value="">Tanlang</option>
        @foreach ($districts as $district)
            
        <option @isset($quarter)
            {{ $quarter->district_id==$district->id ? 'selected' : '' }} @endisset value="{{ $district->id }}" data-region_id={{ $district->region->id }}>{{ $district->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Mahalla nomi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('addres') ? 'has-error' : ''}}">
    {!! Form::label('addres', 'Manzili', ['class' => 'control-label']) !!}
    {!! Form::text('addres', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('addres', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('leader') ? 'has-error' : ''}}">
    {!! Form::label('leader', 'Rahbari', ['class' => 'control-label']) !!}
    {!! Form::text('leader', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('leader', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Telefon', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Yangilash' : 'Saqlash', ['class' => 'btn btn-primary']) !!}
</div>

@section('js')
    <script>
        
        $('#regions').change(function() {
            
            var region_id=$(this).val();
        
        var $options = $('#districts')
           
            .val('')
            
            .find('option')
            
            .show();
    
        if (region_id != '0')
            $options.not('[data-region_id="' + region_id + '"],[data-region_id=""]').hide();
        })
       
    </script>
@endsection