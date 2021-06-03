@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
 
            <div class="box">
                
                <div class="box-body">

                    <a href="{{ url('/admin/homes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                    <a href="{{ url('/admin/homes/' . $home->id . '/edit') }}" title="Edit Home"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/homes', $home->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete Home',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $home->id }}</td>
                                </tr>
                                <tr><th> Uy nomeri </th><td> {{ $home->home_number }} </td></tr>
                                <tr><th> Uy maydoni </th><td> {{ $home->landarea }} </td></tr>
                                <tr><th> Ko'cha </th><td> {{ $home->street->name }} </td></tr>
                                <tr><th> Mahalla </th><td> {{ $home->quarter->name }} </td></tr>
                                <tr><th> Tuman, shahar </th><td> {{ $home->district->name }} </td></tr>
                                <tr><th> Viloyat </th><td> {{ $home->region->name }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
@endsection
