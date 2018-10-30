@extends('layouts.main')

@section('title', 'Home - Red Dot Network')

@section('content')

	@include('_about_section')
	@include('_activation_process_section')
	@include('_registration_process_section')
	@include('_benefits_section')
	@include('_promotions_section')
		
@endsection