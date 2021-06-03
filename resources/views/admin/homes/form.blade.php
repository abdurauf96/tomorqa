<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Viloyat nomi', ['class' => 'control-label']) !!}
    
    <select name="region_id" id="regions" class="form-control " required >
        <option value="">Tanlang</option>
        @foreach ($regions as $region)
            
        <option @isset($home)
            {{ $home->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}" >{{ $region->name }}
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
            
        <option @isset($home)
            {{ $home->district_id==$district->id ? 'selected' : '' }} @endisset value="{{ $district->id }}" data-region_id={{ $district->region->id }}>{{ $district->name }}
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
            
        <option @isset($home)
            {{ $home->quarter_id==$quarter->id ? 'selected' : '' }} @endisset value="{{ $quarter->id }}" data-district_id={{ $quarter->district->id }}>{{ $quarter->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('quarter_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Ko`cha nomi', ['class' => 'control-label']) !!}
    <select name="street_id" id="streets" class="form-control" required>
        <option value="">Tanlang</option>
        @foreach ($streets as $street)
            
        <option @isset($home)
            {{ $home->street_id==$street->id ? 'selected' : '' }} @endisset value="{{ $street->id }}" data-street_id={{ $street->quarter->id }}>{{ $street->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('street_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('home_number') ? 'has-error' : ''}}">
    {!! Form::label('home_number', 'Uy raqami', ['class' => 'control-label']) !!}
    {!! Form::text('home_number', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('home_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('landarea') ? 'has-error' : ''}}">
    {!! Form::label('landarea', 'Yer maydoni (sotix)', ['class' => 'control-label']) !!}
    {!! Form::text('landarea', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('landarea', '<p class="help-block">:message</p>') !!}
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

        $('#quarters').change(function() {
            
            var quarter_id=$(this).val();
        
            var $options = $('#streets')
           
                .val('')
                
                .find('option')
                
                .show();
    
            if (quarter_id != '0')
                $options.not('[data-street_id="' + quarter_id + '"],[data-street_id=""]').hide();
        })
       
    </script>
@endsection