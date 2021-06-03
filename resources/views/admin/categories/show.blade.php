@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/categories', $category->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Category',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $category->id }}</td>
                            </tr>
                            <tr><th> Nomi </th><td> {{ $category->name }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div> 
    </div>
</div>
@endsection
