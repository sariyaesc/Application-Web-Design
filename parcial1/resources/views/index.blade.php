<h1>Crear Producto</h1>
@if ($errors->any())
	<div style="color:red;">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<form method="POST" action="{{ route('products.store') }}">
	@csrf
	<label for="nombre">Nombre del producto:</label>
	<input type="text" name="nombre" id="nombre" required>
	<br>
	<label for="precio">Precio:</label>
	<input type="number" name="precio" id="precio" step="0.01" min="0" required>
	<br>
	<label for="categoria_id">Categoría:</label>
	<select name="categoria_id" id="categoria_id" required>
		<option value="">Seleccione una categoría</option>
		@foreach($categorias as $categoria)
			<option value="{{ $categoria->ID }}">{{ $categoria->Nombre }}</option>
		@endforeach
	</select>
	<br>
	<button type="submit">Crear</button>
</form>
<br>
<a href="{{ route('products.show') }}">Ver productos</a>
