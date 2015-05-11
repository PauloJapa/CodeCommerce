<h1>Categories</h1>
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
		<th>Ação</th>
	</tr>
	@foreach($categories as $category)
		<tr>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td>
				<a href="{{ route('categories') }}/editar/{{ $category->id }}">editar</a>
				<a href="{{ route('categories') }}/excluir/{{ $category->id }}">excluir</a>
			</td>
		</tr>
	@endforeach
</table>

