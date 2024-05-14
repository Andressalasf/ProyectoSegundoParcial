@extends('layouts.app')

@section('title','Crear Factura')

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
						<div class="card-header " style="background-color: #00DF8F;">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('sales.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="Client_name">Sale_date <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="customer" id="customer" >
											<option value> select customer</option>
											@foreach($customers as $customer)
											<option value = "{{$customer->id}}">{{$customer->first_name}} (ID. {{ $customer->id}})</option>
											@endforeach
											</select>
                                        </div>
										
                                    </div>
                                </div>
                                
								 <input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registered_by" value="{{ Auth::user()->id }}"> 

								<span id="add-field-button" class="btn btn-primary btn-block btn-flat my-4">
									Añadir Producto
								</span>

								<div class="row" data-details-field=true>
									<select class="form-control" name="product_id[]">
										<option value="-1">Please select a product</option>
										@foreach ($products as $product)
											<option value="{{ $product->id }}">{{ $product->name }}
												(${{ $product->purchase_price }})
											</option>
										@endforeach
									</select>

									<input type="number" class="form-control" name="quantity[]" value="1">
								</div>
							</div>


							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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

@push('scripts')
<!-- SCRIPT TO SELECT CLIENT -->
<script type="text/javascript">
	$("#customer").select2({
		allowClear: true
	});
</script>
<!-- SCRIPT TO LOCAL DATE -->
<script type="text/javascript">
	$.fn.datepicker.dates['en'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		format: "yyyy-mm-dd"
	};
	$('#sale_date').datepicker({
		language: 'en'
	});
</script>
{{-- SCRIPT PARA LO DEL PRODUCTO --}}
<script>
	fields = document.querySelector("#form-fields")
	addButton = document.querySelector("#add-field-button")

	addButton.addEventListener("click", () => {
		elem = createRowWithFields()
		fields.appendChild(elem)
	})

	function createRowWithFields() {
		return document.querySelector("[data-details-field=true]").cloneNode(true);
	}
</script>
@endpush