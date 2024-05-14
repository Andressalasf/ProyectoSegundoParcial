@extends('layouts.app')

@section('title', 'Detalle de venta')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID del Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $detail->product_id }}</td>
                                    <td>${{ ($detail->product->purchase_price) }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>${{($detail->subtotal) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection