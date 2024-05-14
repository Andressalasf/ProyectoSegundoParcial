@extends('layouts.app')
@section('title', 'Listado De Ventas')
@section('content')

    <div class="wrapper">
        <!-- Navbar -->
        <!-- Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #00DF8F;">
                                    @yield('title')
                                    <a href="{{ route('sales.create') }}" class="btn btn-primary float-right"
                                        title="Agregar"><i class="fas fa-plus nav-icon"></i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="background-color: #0A1E41;">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Client</th>
                                                <th>Client_id</th>
                                                <th>Sale_date</th>
                                                <th>Total_sale</th>
                                                <th>Status</th>
                                                <th>registered_by</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{ $sale->id }}</td>
                                                    <td>
                                                        
                                                            {{ $sale->first_name }}
                                                       
                                                    </td>
                                                    <td>
                                                       
                                                            {{ $sale->identification_document }}
                                                        
                                                    </td>
                                                    <td>{{ $sale->sale_date }}</td>
                                                    <td>{{ $sale->total_sale }}</td>
                                                    <td>{{ $sale->status }}</td>
                                                    <td>{{ $sale->registered_by }}</td>
                                                    <td>
                                                        @if ($sale->image != null)
                                                            <img class="img-responsive img-thumbnail"
                                                                src="{{ asset('uploads/sales/' . $sale->image) }}"
                                                                style="height: 70px; width: 70px" alt="">
                                                        @else
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <input data-id="{{ $sale->id }}" class="toggle-class"
                                                            type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="Activo" data-off="Inactivo"
                                                            {{ $sale->status ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <form class="d-inline delete-form"
                                                            action="{{ route('sales.destroy', $sale->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                        </form>

                                                        <a href="{{ route('sales.show', $sale) }}"
                                                        class="btn btn-primary btn-sm" title="View bill">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("example1").DataTable()
        });
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var sale_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'changestatus_sale',
                    data: {
                        'status': status,
                        'sale_id': sale_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>


    <script>
        $('.delete-form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "Este registro se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado exitosamente',
                    'success'
                ) <
                /scrip>
            @endif

                
  <script type = "text/javascript" >
                $(function() {
                    $("#example1").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        //"buttons": ["excel", "pdf", "print", "colvis"],
                        "language": {
                            "sLengthMenu": "Mostrar MENU entradas",
                            "sEmptyTable": "No hay datos disponibles en la tabla",
                            "sInfo": "Mostrando START a END de TOTAL entradas",
                            "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                            "sSearch": "Buscar:",
                            "sZeroRecords": "No se encontraron registros coincidentes en la tabla",
                            "sInfoFiltered": "(Filtrado de MAX entradas totales)",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sPrevious": "Anterior",
                                "sNext": "Siguiente",
                                "sLast": "Ultimo"
                            },
                            /*"buttons": {
                              "print": "Imprimir",
                              "colvis": "Visibilidad Columnas"
                              /*"create": "Nuevo",
                              "edit": "Cambiar",
                              "remove": "Borrar",
                              "copy": "Copiar",
                              "csv": "fichero CSV",
                              "excel": "tabla Excel",
                              "pdf": "documento PDF",
                              "collection": "Colección",
                              "upload": "Seleccione fichero...."
                            }*/
                        }
                    }); //.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
  </script>

    @endpush
