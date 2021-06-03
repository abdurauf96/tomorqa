@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
                <div class="box">
                 
                    <div class="box-body">

                        <a href="{{ url('/admin/regions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Orqaga</button></a>
                        <a href="{{ url('/admin/regions/' . $region->id . '/edit') }}" title="Edit Region"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/regions', $region->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Region',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $region->id }}</td>
                                    </tr>
                                    <tr><th> Viloyat nomi </th><td> {{ $region->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
        </div>
    </div>
@endsection
