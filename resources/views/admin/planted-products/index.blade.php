@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <p class="lead">Ekilgan mahsulotlar</p>
                <div class="add-btn">
                    <h3 class="box-title"> Mahsulot qo'shish </h3>
                    @foreach ($categories as $category)
                    <a href="{{ url('/admin/planted-products/'.$category->id.'/create') }}" class="btn btn-success " title="Add New Product">
                    <i class="fa fa-plus" aria-hidden="true"></i> {{  $category->name }}
                    </a>
                    @endforeach
                </div>
            </div><!-- /.box-header -->
            
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                
                    <table id="planted-products" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                        <thead>
                            <tr>
                              <th>№</th>
                              <th>Mahsulot</th>
                              <th>Maydon (sotix)</th>
                              <th>Viloyat</th>
                              <th>Tuman</th>
                              <th>Mahalla</th>
                              <th>Amallar</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($plantedproducts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->amount }}</td>
                                
                                <td>{{ $item->region->name }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->quarter->name }}</td>
                                <td>
                                    <a href="{{ url('/admin/planted-products/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/admin/planted-products/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/planted-products', $item->id],
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
      $("#planted-products").dataTable();   
    })
</script>
@endsection