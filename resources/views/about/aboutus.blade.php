@extends('layouts.master')
@section('title')
About Us
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/aboutus.css') }}">
@endsection
@section('bodytitle')
Meet The Creators
@endsection
@section('content')

	<div class="row">

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="row section-success ourTeam-box text-center">
				<div class="col-md-12 section1">
					<img src="{{ URL::asset('images/team/haris.png') }}">
				</div>

				<div class="col-md-12 section2">

					<div id = "test">
					<p>HARIS RIAZ</p><br>
					</div>
					<div id = "test">
					<p>Programmer</p><br>
					</div>

				</div>

			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="row section-info ourTeam-box text-center">
				<div class="col-md-12 section1">
					<img src="{{ URL::asset('images/team/ali.png') }}">
				</div>
				<div class="col-md-12 section2">
					<div id = "test">
					<p>ALI HASSAAN MUGHAL</p><br>
					</div>
					<div id = "test">
					<p>Programmer</p><br>
					</div>
				</div>

			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="row section-danger ourTeam-box text-center">
				<div class="col-md-12 section1">
					<img src="{{ URL::asset('images/team/furqan.png') }}">
				</div>
				<div class="col-md-12 section2">
					<div id = "test">
					<p>FURQAN SADIQ</p><br>
					</div>
					<div id = "test">
					<p>Dev/Ideas</p>
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection
