@extends('layouts.main')
@section('title', 'Home - Red Dot Network')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			@include('_about_section')
			@include('_activation_process_section')
			@include('_registration_process_section')
			@include('_feature_benefit_section')
			@include('_discount_promotion_section')
		</div>
	</div>
</div>
@endsection