@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/streets') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/streets/' . $street->id . '/edit') }}" title="Edit Street"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/streets', $street->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Street',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $street->id }}</td>
                            </tr>
                            <tr><th> Ko'cha </th><td> {{ $street->name }} </td></tr>
                            <tr><th> Mahalla </th><td> {{ $street->quarter->name }} </td></tr>
                            <tr><th> Tuman </th><td> {{ $street->district->name }} </td></tr>
                            <tr><th> Viloyat </th><td> {{ $street->region->name }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
           
    </div>
</div>
@endsection
