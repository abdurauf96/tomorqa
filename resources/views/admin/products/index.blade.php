@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mahsulotlar</h3>
                <div class="add-btn">
                    <a href="{{ url('/admin/products/create') }}" class="btn btn-success " title="Add New Product">
                    <i class="fa fa-plus" aria-hidden="true"></i> Yangi qo'shish
                    </a>
                </div>
            </div><!-- /.box-header -->
            
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                
                    <table id="products" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                        <thead>
                            <tr>
                              <th>№</th>
                              <th>Nomi</th>
                              <th>Mahsulot tipi</th>
                              <th>Birligi (qisqa)</th>
                              <th>Birligi (to'liq)</th>
                              <th>Amallar</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->segment_short }}</td>
                                <td>{{ $item->segment_full }}</td>
                              
                                <td>
                                    <a href="{{ url('/admin/products/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/admin/products/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
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
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function () {
      $("#products").dataTable();
    })
</script>
@endsection