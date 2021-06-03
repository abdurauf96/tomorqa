<div class="form-group{{ $errors->has('region_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Viloyat', ['class' => 'control-label']) !!}
    
    <select name="region_id" id="regions" class="form-control " required >
        <option value="">Tanlang</option>
        @foreach ($regions as $region)
            
        <option @isset($firm)
            {{ $firm->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}" >{{ $region->name }}
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
            
        <option @isset($firm)
            {{ $firm->district_id==$district->id ? 'selected' : '' }} @endisset value="{{ $district->id }}" data-region_id={{ $district->region->id }}>{{ $district->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nomi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('bank') ? 'has-error' : ''}}">
    {!! Form::label('bank', 'Bank nomi', ['class' => 'control-label']) !!}
    {!! Form::text('bank', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('bank_currency') ? 'has-error' : ''}}">
    {!! Form::label('bank_currency', 'Bank valyutasi', ['class' => 'control-label']) !!}
    {!! Form::text('bank_currency', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bank_currency', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('addres') ? 'has-error' : ''}}">
    {!! Form::label('addres', 'Manzil', ['class' => 'control-label']) !!}
    {!! Form::text('addres', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('addres', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('director') ? 'has-error' : ''}}">
    {!! Form::label('director', 'Rahbar (F.I.O)', ['class' => 'control-label']) !!}
    {!! Form::text('director', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('director', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Telefon', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('inn') ? 'has-error' : ''}}">
    {!! Form::label('inn', 'INN', ['class' => 'control-label']) !!}
    {!! Form::text('inn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('inn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('hr') ? 'has-error' : ''}}">
    {!! Form::label('hr', 'H/R', ['class' => 'control-label']) !!}
    {!! Form::text('hr', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('hr', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('mfo') ? 'has-error' : ''}}">
    {!! Form::label('mfo', 'MFO', ['class' => 'control-label']) !!}
    {!! Form::text('mfo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('mfo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('currency_mfo') ? 'has-error' : ''}}">
    {!! Form::label('currency_mfo', 'Valyuta MFO', ['class' => 'control-label']) !!}
    {!! Form::text('currency_mfo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('currency_mfo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('currency_hr') ? 'has-error' : ''}}">
    {!! Form::label('currency_hr', 'Valyuta H/R', ['class' => 'control-label']) !!}
    {!! Form::text('currency_hr', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('currency_hr', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}<br>
    <input type="radio" name="status" value="1" @isset($firm) {{ $firm->status==1 ? 'checked' : '' }}  @endisset> Faol 
    <input type="radio" name="status" value="0" @isset($firm) {{ $firm->status==0 ? 'checked' : '' }}  @endisset> Faol emas 
  
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