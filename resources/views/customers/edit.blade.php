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
						<form method="POST" action="{{ route('customers.update',$customer) }}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="first_name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->nombre}}">
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registered_by" value="{{ Auth::user()->id }}">
							</div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Document <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="identification_document" placeholder="valor actual: {{ old('identification_document') }}" autocomplete="off" value="{{ old('purchase_price') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email <strong style="color:red;">(*)</strong></label>
                                        <input type="email" class="form-control" name="email" placeholder="" autocomplete="off" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Phone <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="phone" placeholder="" autocomplete="off" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">address <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="address" placeholder="" autocomplete="off" value="{{ old('address') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Fotografía</label>
                                        <input type="file" class="form-control-file" name="image" id="image">
                                    </div>
                                </div>
                            </div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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