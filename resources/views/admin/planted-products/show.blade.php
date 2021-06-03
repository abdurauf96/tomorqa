@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/planted-products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/planted-products/' . $plantedproduct->id . '/edit') }}" title="Edit StoredProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/plantedproducts', $plantedproduct->id],
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
                                <th>ID</th><td>{{ $plantedproduct->id }}</td>
                            </tr>
                            <tr><th> Mahsulot </th><td> {{ $plantedproduct->product->name }} </td></tr>
                            <tr><th> Yer maydoni (sotix) </th><td> {{ $plantedproduct->amount }} </td></tr>
                            <tr><th> Agrofirma </th><td> {{ $plantedproduct->firm->name }} </td></tr>
                            <tr><th> Viloyat </th><td> {{ $plantedproduct->region->name }} </td></tr>
                            <tr><th> Tuman </th><td> {{ $plantedproduct->district->name }} </td></tr>
                            <tr><th> Mahalla </th><td> {{ $plantedproduct->quarter->name }} </td></tr>
                            <tr><th> Ko'cha </th><td> {{ $plantedproduct->street->name }} </td></tr>
                            <tr><th> Uy raqami </th><td> {{ $plantedproduct->home_number }} </td></tr>
                            <tr><th> Uy egasi </th><td> {{ $plantedproduct->owner }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
