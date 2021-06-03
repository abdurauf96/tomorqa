@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-body">

                <a href="{{ url('/admin/expected-products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/expected-products/' . $expectedproduct->id . '/edit') }}" title="Edit expectedproduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/storedproducts', $expectedproduct->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete expectedproduct',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $expectedproduct->id }}</td>
                            </tr>
                            <tr><th> Mahsulot </th><td> {{ $expectedproduct->product->name }} </td></tr>
                            <tr><th> Miqdori </th><td> {{ $expectedproduct->amount }} ({{ $expectedproduct->product->segment_short }}) </td></tr>
                            <tr><th> Kutilayotgan sana </th><td> {{ date('d M, Y', strtotime($expectedproduct->expected_date)) }}  </td></tr>
                            <tr><th> Agrofirma </th><td> {{ $expectedproduct->firm->name }} </td></tr>
                            <tr><th> Viloyat </th><td> {{ $expectedproduct->region->name }} </td></tr>
                            <tr><th> Tuman </th><td> {{ $expectedproduct->district->name }} </td></tr>
                            <tr><th> Mahalla </th><td> {{ $expectedproduct->quarter->name }} </td></tr>
                            <tr><th> Ko'cha </th><td> {{ $expectedproduct->street->name }} </td></tr>
                            <tr><th> Uy raqami </th><td> {{ $expectedproduct->home_number }} </td></tr>
                            <tr><th> Uy egasi </th><td> {{ $expectedproduct->owner }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
