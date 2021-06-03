<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Viloyat nomi', ['class' => 'control-label']) !!}
    
    <select name="region_id" id="regions" class="form-control " required >
        <option value="">Tanlang</option>
        @foreach ($regions as $region)
            
        <option @isset($street)
            {{ $street->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}" >{{ $region->name }}
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
            
        <option @isset($street)
            {{ $street->district_id==$district->id ? 'selected' : '' }} @endisset value="{{ $district->id }}" data-region_id={{ $district->region->id }}>{{ $district->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Mahalla nomi', ['class' => 'control-label']) !!}
    <select name="quarter_id" id="quarters" class="form-control" required>
        <option value="">Tanlang</option>
        @foreach ($quarters as $quarter)
            
        <option @isset($street)
            {{ $street->quarter_id==$quarter->id ? 'selected' : '' }} @endisset value="{{ $quarter->id }}" data-district_id={{ $quarter->district->id }}>{{ $quarter->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('quarter_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Ko`cha', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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

        $('#districts').change(function() {
            
            var district_id=$(this).val();
        
            var $options = $('#quarters')
           
                .val('')
                
                .find('option')
                
                .show();
    
            if (district_id != '0')
                $options.not('[data-district_id="' + district_id + '"],[data-district_id=""]').hide();
        })
       
    </script>
@endsection