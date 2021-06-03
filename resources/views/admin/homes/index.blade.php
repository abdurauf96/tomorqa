@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Xonadonlar</h3>
                <div class="add-btn">
                    <a href="{{ url('/admin/homes/create') }}" class="btn btn-success " title="Add New Product">
                    <i class="fa fa-plus" aria-hidden="true"></i> Yangi qo'shish
                    </a>
                </div>
            </div><!-- /.box-header -->
            
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                
                    <table id="homes" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                        <thead>
                            <tr>
                              <th>№</th>
                              <th>Uy nomeri</th>
                              <th>Yer maydoni (sotix)</th>
                              <th>Ko'cha</th>
                              <th>Mahalla</th>
                              <th>Tuman</th>
                              <th>Viloyat</th>
                              <th>Amallar</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($homes as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $item->home_number }}</td>
                                <td>{{ $item->landarea }}</td>
                                <td>{{ $item->street->name }}</td>
                                <td>{{ $item->quarter->name }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->region->name }}</td>
                                <td>
                                    <a href="{{ url('/admin/homes/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/admin/homes/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/homes', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Delete Product',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
            
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
  </div>
@endsection
@section('js')
<script type="text/javascript">
    $(function () {
      $("#homes").dataTable();
    })
</script>
@endsection