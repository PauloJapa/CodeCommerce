@extends('app')

@section('content')
<div class="container">

	<h1>Editing Products: {{ $product->name }}</h1>
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

	{!! Form::open(['route' => ['products.update', $product->id, 'method' => 'put' ]]) !!}

	<!-- Name Form Select -->

	<div class="form-group">
		{!! Form::label('category','Category:') !!}
		{!! Form::select('category_id',$categories, $product->category->id, ['class' => 'form-control']) !!}
	</div>

	<!-- Name Form Input -->

	<div class="form-group">
		{!! Form::label('name','Name:') !!}
		{!! Form::text('name',$product->name, ['class' => 'form-control']) !!}
	</div>

	<!--  Description Form Input -->

	<div class="form-group">
		{!! Form::label('description','Description:') !!}
		{!! Form::textarea('description',$product->description, ['class' => 'form-control']) !!}
	</div>

	<!-- Price Form Input -->

	<div class="form-group">
		{!! Form::label('price','Price:') !!}
		{!! Form::text('price',$product->price, ['class' => 'form-control']) !!}
	</div>

	<!-- Featured Form Input -->

	<div class="form-group">
		{!! Form::label('featured','Featured:') !!}
		{!! Form::select('featured', array('false' => 'Não', 'true' => 'Sim'), $product->featured) !!}
	</div>

	<!-- Recommend Form Input -->

	<div class="form-group">
		{!! Form::label('recommend','Recommend:') !!}
		sim{!! Form::radio('recommend', 'true', ($product->recommend == "true")?true:false); !!}
		não{!! Form::radio('recommend', 'false', ($product->recommend != "true")?true:false) !!}
	</div>


	<div class="form-group">
		{!! Form::submit('Save Product', ['class' => 'btn btn-primary form-control']) !!}
	</div>

	{!! Form::close() !!}

</div>
@endsection