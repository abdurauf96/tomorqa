@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/stored-products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/stored-products/' . $storedproduct->id . '/edit') }}" title="Edit StoredProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/storedproducts', $storedproduct->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete StoredProduct',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $storedproduct->id }}</td>
                            </tr>
                            <tr><th> Mahsulot </th><td> {{ $storedproduct->product->name }} </td></tr>
                            <tr><th> Miqdori </th><td> {{ $storedproduct->amount }} ({{ $storedproduct->product->segment_short }}) </td></tr>
                            <tr><th> Agrofirma </th><td> {{ $storedproduct->firm->name }} </td></tr>
                            <tr><th> Viloyat </th><td> {{ $storedproduct->region->name }} </td></tr>
                            <tr><th> Tuman </th><td> {{ $storedproduct->district->name }} </td></tr>
                            <tr><th> Mahalla </th><td> {{ $storedproduct->quarter->name }} </td></tr>
                            <tr><th> Ko'cha </th><td> {{ $storedproduct->street->name }} </td></tr>
                            <tr><th> Uy raqami </th><td> {{ $storedproduct->home_number }} </td></tr>
                            <tr><th> Uy egasi </th><td> {{ $storedproduct->owner }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
