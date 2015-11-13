<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>


	</head>
	<body>
		<div class="container">
			<div class="content">


				<h1>Koszyk</h1>

				@if (count($cart) > 0)

					<br />
					<a href="clean">(empty me)</a>
					<br />


					@foreach ($cart as $product)

						{{ $product }} <br />

					@endforeach


				@endif



			<hr />
				<h1>Produkty</h1>
				@if (count($products) > 0)


					<form method="post" action="saveit">

					@foreach ($products as $product)

						<input name="selected_product" type="radio" value="{{ $product->id }}">{{ $product->name }} <br />

					@endforeach



						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit"/>

					</form>

				@endif




			</div>
		</div>
	</body>
</html>
