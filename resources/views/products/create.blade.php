@extends('app')

@section('content')
<div class="container">

	<h1>Create Products</h1>
<!--
	{{ print_r($errors) }}
-->
	@if ($errors->any())

		<ul class="alert">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>

	@endif

	{!! Form::open(['route' => ['products.store']]) !!}

	<!-- Name Form Select -->

	<div class="form-group">
		{!! Form::label('category','Category:') !!}
		{!! Form::select('category_id',$categories, null, ['class' => 'form-control']) !!}
	</div>
	<!-- Name Form Input -->

	<div class="form-group">
		{!! Form::label('name','Name:') !!}
		{!! Form::text('name',null, ['class' => 'form-control']) !!}
	</div>

	<!--  Description Form Input -->

	<div class="form-group">
		{!! Form::label('description','Description:') !!}
		{!! Form::textarea('description',null, ['class' => 'form-control']) !!}
	</div>

	<!-- Price Form Input -->

	<div class="form-group">
		{!! Form::label('price','Price:') !!}
		{!! Form::text('price',null, ['class' => 'form-control']) !!}
	</div>

	<!-- Featured Form Input -->

	<div class="form-group">
		{!! Form::label('featured','Featured:') !!}
		{!! Form::select('featured', array('false' => 'Não', 'true' => 'Sim')) !!}
	</div>

	<!-- Recommend Form Input -->

	<div class="form-group">
		{!! Form::label('recommend','Recommend:') !!}
		sim{!! Form::radio('recommend', 'true'); !!}
		não{!! Form::radio('recommend', 'false', true); !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Add Products', ['class' => 'btn btn-primary form-control']) !!}
	</div>

	{!! Form::close() !!}

</div>
@endsection