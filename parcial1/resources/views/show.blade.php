<h1>Lista de Productos</h1>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Categoría</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos as $producto)
			<tr>
				   <td>{{ $producto->ID }}</td>
				   <td>{{ $producto->Nombre }}</td>
				   <td>{{ $producto->Precio }}</td>
				   <td>
					   @php
						   $categoria = $categorias->where('ID', $producto->categoria_id ?? null)->first();
					   @endphp
					   {{ $categoria ? $categoria->Nombre : 'Sin categoría' }}
				   </td>
			</tr>
		@endforeach
	</tbody>
</table>
<br>
<a href="{{ route('products.index') }}">Volver al formulario</a>
