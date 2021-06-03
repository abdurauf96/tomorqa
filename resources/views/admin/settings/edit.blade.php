@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Edit Setting #{{ $setting->id }}</div>
                    <div class="box-body">
                        <a href="{{ url('/admin/settings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($setting, [
                            'method' => 'PATCH',
                            'url' => ['/admin/settings', $setting->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.settings.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
