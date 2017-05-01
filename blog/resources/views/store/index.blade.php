@extends('layouts.store_base')

@section('title')
	<title>首頁</title>
@endsection

@section('staticFile')
	<link rel="stylesheet" type="text/css" href="/css/index.css">
	<script type="text/javascript" src="/js/index.js"></script>
@endsection

@section('content')
	<div class="ui segment grid " id="content">
		<div class="ui container">
			<div class="row">
				<div class="ui four stackable cards">
					@foreach($products as $product)
						<div class="card">
							<div class="container">
								<div class="ui image">
									<img src="https://semantic-ui.com/images/wireframe/image.png">
								</div>
								<div class="ui content">
									<div class="left">
										<div class="details">
											<h1>{{$product->name}}</h1>
											<p>$ {{$product->unit_price}}</p>
										</div>
										<div class="buy">
											<i class="material-icons add-to-cart">add_shopping_cart</i>
										</div>
									</div>
									<div class="right">
										<div class="buy">
											<i class="material-icons done">done</i>
											<div class="cancel">
												<i class="material-icons">clear</i>
											</div>
										</div>
										<div class="details">
											<h1>{{$product->name}}</h1>
											<p>已加入購物車</p>
										</div>
									</div>
								</div>	
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection