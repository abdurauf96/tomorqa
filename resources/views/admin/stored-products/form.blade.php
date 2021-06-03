<div class="form-group{{ $errors->has('district_id') ? 'has-error' : ''}}">
    {!! Form::label('district_id', 'Viloyat nomi', ['class' => 'control-label']) !!}
    
    <select name="region_id" id="regions" class="form-control " required >
        <option value="">Tanlang</option>
        @foreach ($regions as $region)
            
        <option @isset($storedproduct)
            {{ $storedproduct->region_id==$region->id ? 'selected' : '' }} @endisset value="{{ $region->id }}" >{{ $region->name }}
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
            
        <option @isset($storedproduct)
            {{ $storedproduct->district_id==$district->id ? 'selected' : '' }} @endisset value="{{ $district->id }}" data-region_id={{ $district->region->id }}>{{ $district->name }}
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
            
        <option @isset($storedproduct)
            {{ $storedproduct->quarter_id==$quarter->id ? 'selected' : '' }} @endisset value="{{ $quarter->id }}" data-district_id={{ $quarter->district->id }}>{{ $quarter->name }}
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
            
        <option @isset($storedproduct)
            {{ $storedproduct->street_id==$street->id ? 'selected' : '' }} @endisset value="{{ $street->id }}" data-street_id={{ $street->quarter->id }}>{{ $street->name }}
        </option>
        @endforeach
    </select>
    {!! $errors->first('street_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('home_number') ? 'has-error' : ''}}">
    {!! Form::label('home_number', 'Uy nomeri', ['class' => 'control-label']) !!}
    {!! Form::text('home_number', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('home_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('owner') ? 'has-error' : ''}}">
    {!! Form::label('owner', 'Uy egasi', ['class' => 'control-label']) !!}
    {!! Form::text('owner', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('owner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('firm_id') ? 'has-error' : ''}}">
    {!! Form::label('firm_id', 'Agrofirma', ['class' => 'control-label']) !!}
    <select name="firm_id" required class="form-control" >
        @foreach ($firms as $firm)
            <option value="{{ $firm->id }}"> {{ $firm->name }} </option>
        @endforeach
    </select>
</div>


@if($formMode=='edit')
    <div class="form-group cat_products">
        <div class="col-xs-3 cat_products_item">
            <label for="">{{ $storedproduct->product->name }} ({{ $storedproduct->product->segment_short }})</label>
            <input type="number" name="amount" class="form-control" placeholder="Miqdorni kiriting..." value="{{ $storedproduct->amount }}">
           
        </div>
    </div>
@else
    <div class="form-group cat_products">
        @foreach ($category_products as $cat_product)
        <div class="col-xs-3 cat_products_item">
            <label for="">{{ $cat_product->name }} ({{ $cat_product->segment_short }})</label>
            <input type="number" name="amount[]" class="form-control" placeholder="Miqdorni kiriting...">
            <input type="hidden" name="product_id[]" value="{{ $cat_product->id }}" class="form-control" >
        </div>
        @endforeach
    </div>
@endif

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