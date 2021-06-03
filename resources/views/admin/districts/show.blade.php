@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
            
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/districts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Orqaga</button></a>
                <a href="{{ url('/admin/districts/' . $district->id . '/edit') }}" title="Edit District"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/districts', $district->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish    ', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $district->id }}</td>
                            </tr>
                            <tr><th> Tuman yoki shahar nomi </th><td> {{ $district->name }} </td></tr>
                            <tr><th> Viloyati </th><td> {{ $district->region->name }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
           
    </div>
</div>
@endsection
