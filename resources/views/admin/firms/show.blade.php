@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
          
            <div class="box-body">

                <a href="{{ url('/admin/firms') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                <a href="{{ url('/admin/firms/' . $firm->id . '/edit') }}" title="Edit Firm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tahrirlash</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/firms', $firm->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> O`chirish', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Firm',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $firm->id }}</td>
                            </tr>
                            <tr><th> Nomi </th><td> {{ $firm->name }} </td></tr>
                            <tr><th> Viloyat </th><td> {{ $firm->region->name }} </td></tr>
                            <tr><th> Tuman </th><td> {{ $firm->district->name }} </td></tr>
                            <tr><th> Telefon </th><td> {{ $firm->phone }} </td></tr>
                            <tr><th> Rahbar </th><td> {{ $firm->director }} </td></tr>
                            <tr><th> Manzil </th><td> {{ $firm->addres }} </td></tr>
                            <tr><th> Bank </th><td> {{ $firm->bank }} </td></tr>
                            <tr><th> Bank valyutasi</th><td> {{ $firm->bank_currency }} </td></tr>
                            <tr><th> INN</th><td> {{ $firm->inn }} </td></tr>
                            <tr><th> H/R</th><td> {{ $firm->hr }} </td></tr>
                            <tr><th> MFO</th><td> {{ $firm->mfo }} </td></tr>
                            <tr><th> Valyuta MFO</th><td> {{ $firm->currency_mfo }} </td></tr>
                            <tr><th> Valyuta H/R</th><td> {{ $firm->currency_hr }} </td></tr>
                            <tr><th> Xolati</th><td> {{ $firm->status==1 ? 'Faol' : 'Faol emas' }} </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
