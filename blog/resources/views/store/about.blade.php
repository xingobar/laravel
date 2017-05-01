@extends('layouts.store_base')

@section('title')
	<title>關於我們</title>
@endsection

@section('staticFile')
	<link rel="stylesheet" type="text/css" href="/css/index.css">
	<link rel="stylesheet" type="text/css" href="/css/about.css">
@endsection

@section('content')
<div class="ui segment grid">
	<div class="ui container">
		<div class="row">
			<div class="ui two column grid">
				<div class="seven wide column">
					<figure>
						<figcaption>
							<div class="caption-container">
								<div class="caption-content">
									<h2>
										Gary
										<span>Huang</span>
									</h2>
									<p style="word-break: break-all;">
										self introduction 
										self introduction
										self introduction
									</p>
								</div>
								<div class="icons">
									<a href="#">
										<i class="material-icons">home</i>
									</a>
									<a href="#">
										<i class="material-icons">mail_outline</i>
									</a>
									<a href="#">
										<i class="material-icons">phone</i>
									</a>
								</div>
							</div>
						</figcaption>
						<div class="image">
							<img src="https://semantic-ui.com/images/wireframe/image.png" />
						</div>
						<div class="position">
								CEO
						</div>
					</figure>
				</div>
				<div class="two wide column"></div>
				<div class="seven wide column">
					<figure>
						<figcaption>
							<h2>
								Element
								<span>Chen</span>
							</h2>
							<p style="word-break: break-all;">
								self introduction 
								self introduction
								self introduction
							</p>
							
							<div class="icons">
								<a href="#">
									<i class="material-icons">home</i>
								</a>
								<a href="#">
									<i class="material-icons">mail_outline</i>
								</a>
								<a href="#">
									<i class="material-icons">phone</i>
								</a>
							</div>
						</figcaption>
						<div class="image">
							<img src="https://semantic-ui.com/images/wireframe/image.png" />
						</div>
						<div class="position">
								TEST
						</div>
					</figure>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection