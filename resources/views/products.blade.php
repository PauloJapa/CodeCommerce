<h1>Products</h1>
<style>
table{
	width:100%;
	border:1px solid black;
}
td{
	border:1px solid black;
}
</style>
<table>
	<tr>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Preço</th>
		<th>Ação</th>
	</tr>
	@foreach($products as $product)
		<tr>
			<td>{{ $product->name }}</td>
			<td>{{ $product->description }}</td>
			<td>{{ $product->price }}</td>
			<td>
				<a href="{{ route('products') }}/editar/{{ $product->id }}">editar</a>
				<a href="{{ route('products') }}/excluir/{{ $product->id }}">excluir</a>
			</td>
		</tr>
	@endforeach
</table>