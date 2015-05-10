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
			<td>editar excluir</td>
		</tr>
	@endforeach
</table>

