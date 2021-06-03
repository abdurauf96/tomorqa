@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h4>Saqlanayotgan mahsulotlar</h4>
            <h3>{{ $amount_stored_products/1000 }} (tonna)</h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('stored-products.index') }}" class="small-box-footer">Batafsil <i class="fa fa-arrow-circle-right"></i></a>
          <div class="info">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th>T/r</th>
                  <th>Mahsulot turi</th>
                  <th>Xajmi</th>
                </tr>
              </thead>
                @foreach ($storedproducts as $stored)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $stored->product->name }}</td>
                  <td>{{ $stored->sum/1000 }}</td>
                </tr>
                @endforeach
                
            </table>
          </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h4>Ekilgan mahsulotlar</h4>
            <h3>{{ $amount_planted_products/100 }} (gektar)</h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('planted-products.index') }}" class="small-box-footer">Batafsil <i class="fa fa-arrow-circle-right"></i></a>
          <div class="info">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th>T/r</th>
                  <th>Mahsulot turi</th>
                  <th>Xajmi</th>
                </tr>
              </thead>
                @foreach ($plantedproducts as $planted)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $planted->product->name }}</td>
                  <td>{{ $planted->sum/100 }}</td>
                </tr>
                @endforeach
                
            </table>
          </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h4>Kutilayotgan mahsulotlar</h4>
            <h3>{{ $amount_expected_products/1000 }} (tonna)</h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('expected-products.index') }}" class="small-box-footer">Batafsil <i class="fa fa-arrow-circle-right"></i></a>
          <div class="info">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th>T/r</th>
                  <th>Mahsulot turi</th>
                  <th>Xajmi</th>
                </tr>
              </thead>
                @foreach ($expectedproducts as $expected)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $expected->product->name }}</td>
                  <td>{{ $expected->sum/1000 }}</td>
                </tr>
                @endforeach
                
            </table>
          </div>
        </div>
    </div>
</div>

{{-- chart row --}}
<div class="row">
  <div class="col-lg-6">
    <figure class="highcharts-figure">
      <div id="stored_products"></div>
    </figure>
  </div>
  <div class="col-lg-6">
    <figure class="highcharts-figure">
      <div id="planted_products"></div>
      {{-- <p class="highcharts-description">
        Chart showing use of rotated axis labels and data labels. This can be a
        way to include more labels in the chart, but note that more labels can
        sometimes make charts harder to read.
      </p> --}}
    </figure>
  </div>
  
</div>
{{-- end chart row --}}

<div class="row">
	<div class="col-lg-6">
		<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Ushbu oyda kutilayotgan hosillar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
			  <table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>T/R</th>
						<th>Mahsulot</th>
						<th>Xajmi</th>
						<th>Viloyat</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($expectedproducts_thismonth as $expectedproduct_thismonth)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{ $expectedproduct_thismonth->product->name }} </td>
						<td> {{ $expectedproduct_thismonth->amount }} </td>
						<td> {{ $expectedproduct_thismonth->region->name }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="{{ route('expected-products.index', ['year'=>date('Y'), 'month'=>date('m')]) }}"  class="btn btn-default pull-right"><i class="fa fa-list"></i> Batafsil</a>
            </div>
        </div>
	</div>
  <div class="col-lg-6">
		<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-bank"></i>
              <h3 class="box-title">Agrofirmalar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
			  <table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>T/R</th>
						<th>Nomi</th>
						<th>Tuman</th>
						<th>Viloyat</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($agrofirms as $firm)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{ $firm->name }} </td>
						<td> {{ $firm->district->name }} </td>
						<td> {{ $firm->region->name }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <a href="{{ route('firms.index') }}"  class="btn btn-default pull-right"><i class="fa fa-list"></i> Batafsil</a>
            </div>
        </div>
	</div>
</div>

@endsection
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  Highcharts.chart('stored_products', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Viloyatlar bo\'yicha saqlanayotgan mahsulotlar statistikasi (tonnada)'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Mahsulot miqdori (tonnada)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Saqlanayotgan mahsulotlar 2021: <b>{point.y:.1f} tonna</b>'
  },
  series: [{
    name: 'Population',
    data: [<?php echo $statStoredProductsByRegions ?>],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});

Highcharts.chart('planted_products', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Viloyatlar bo\'yicha mahsulotlar ekilgan maydonlar statistikasi (gektarda)'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'yer maydoni (gektar)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Mahsulot ekilgan maydon: <b>{point.y:.1f} gektar</b>'
  },
  series: [{
    name: 'Population',
    data: [<?php echo $statPlantedProductsByRegions ?>],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }],
  
});
</script>
@endsection