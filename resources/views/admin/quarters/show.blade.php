@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/quarters') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Orqaga</button></a>
                <a href="{{ url('/admin/quarters/' . $quarter->id . '/edit') }}" title="Edit Quarter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/quarters', $quarter->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Quarter',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $quarter->id }}</td>
                            </tr>
                            <tr><th> Mahalla nomi</th><td> {{ $quarter->name }} </td></tr>
                            <tr><th> Mahalla raisi</th><td> {{ $quarter->leader }} </td></tr>
                            <tr><th> Manzili </th><td> {{ $quarter->addres }} </td></tr>
                            <tr><th> Telefon raqami </th><td> {{ $quarter->phone }} </td></tr>
                            <tr><th>Tuman nomi </th><td> {{ $quarter->district->name }} </td></tr>
                            <tr><th>Viloyat nomi </th><td> {{ $quarter->region->name }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
          
    </div>
</div>
@endsection
