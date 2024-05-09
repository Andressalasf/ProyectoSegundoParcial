@extends('layouts.app')

@section('title','Editar Producto')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	{{-- @include('layouts.partial.msg') --}}
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('sale_details.update',$sale_detail) }}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
			
								<input type="hidden" class="form-control" name="registered_by" value="{{ Auth::user()->id }}">
							</div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">cantidad <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="quantity" placeholder="" autocomplete="off" value="{{ old('quantity') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">unit_price <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="unit_price" placeholder="" autocomplete="off" value="{{ old('unit_price') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">subtotal <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="subtotal" placeholder="" autocomplete="off" value="{{ old('subtotal') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">sale_id <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="sale_id" placeholder="" autocomplete="off" value="{{ old('sale_id') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">product_id <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="product_id" placeholder="" autocomplete="off" value="{{ old('product_id') }}">
                                    </div>
                                </div>
                            </div>

                            
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('sale_details.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection