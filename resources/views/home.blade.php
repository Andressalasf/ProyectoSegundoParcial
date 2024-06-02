@extends('layouts.app')

@section('content')

  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  </head>
    <div class="wrapper">

        <!-- Navbar -->


        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-blue">EcoMarket</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
           
            <div class="container">
              <h1 class="mt-5 text-success">Productos de la Semana</h1>
              
              <!-- Imagenes de productos -->
              <div class="row mt-4">
                <div class="col-md-4 mb-4">
                  <div class="card product-card">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.dxnPNNR6Xg26_8emK6Ve_QHaEK&pid=Api&P=0&h=180" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                      <h5 class="card-title">Verduras</h5>
                      <p class="card-text">Verduras frescas recien traidas del campo. Apoya a los agricultores</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card product-card">
                    <img src="https://tse3.mm.bing.net/th?id=OIP.iGFP_VmoG7Q7SVtV8ss-IAHaEK&pid=Api&P=0&h=180" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                      <h5 class="card-title">Carnes</h5>
                      <p class="card-text">¡Las mejores carnes estan aquí en EcoMarket!</p>
                    </div>
                  </div>
                </div>
               
              </div>
              
              <!-- Informaci0n sobre el origen y la calidad de los productos -->
              <div class="row mt-5">
                <div class="col-md-6">
                  <h2 class="text-success">Origen de los Productos</h2>
                  <p>Los productos de esta semana provienen de agricultores locales comprometidos con la producción sostenible y el comercio justo.</p>
                </div>
                <div class="col-md-6">
                  <h2 class="text-success">Calidad de los Productos</h2>
                  <p>Nuestros productos son seleccionados cuidadosamente para garantizar su frescura y calidad. Trabajamos directamente con productores de confianza para ofrecer los mejores productos a nuestros clientes.</p>
                </div>
              </div>
              
          
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- men u antiguo --}}

    <div class="content-wrapper" style="background-color: #ffff;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
              <h1 class="m-0">Tablas de estadisticas</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$productCount}}</h3>
                <p>Quantity of Product</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
     
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ $customerCount}}</h3>

                <p>Quantity of Client</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
            
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
              

                <h3>{{ $saleCountDay}} / {{$saleCountTotal}}</h3>

                <p>Order Count Day</p>

                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
               
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{$saleCountMes}} / {{ $saleCountTotalMes}}</h3>

                <p>Order total Month</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
        </div>
       
           
</section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
      
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
@endsection
