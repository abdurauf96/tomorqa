<div class="form-group{{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Mahsulot tipi', ['class' => 'control-label']) !!}
   <select name="category_id" required class="form-control">
       @foreach ($categories as $category)
           <option  @isset($product) {{ $product->category_id==$category->id ? 'selected' : '' }} @endisset value="{{ $category->id }}">{{ $category->name }}</option>
       @endforeach
   </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nomi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('segment_short') ? 'has-error' : ''}}">
    {!! Form::label('segment_short', 'Mahsulot birligi (qisqa)', ['class' => 'control-label']) !!}
    {!! Form::text('segment_short', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('segment_short', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('segment_full') ? 'has-error' : ''}}">
    {!! Form::label('segment_full', 'Mahsulot birligi (to`liq)', ['class' => 'control-label']) !!}
    {!! Form::text('segment_full', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('segment_full', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Yangilash' : 'Qo`shish', ['class' => 'btn btn-primary']) !!}
</div>
