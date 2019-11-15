@extends('master.master')

@section('title','Trang chủ')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
	<div class="jumbotron mt-3">
		<h1>Trang chủ</h1> 
		<p>Coming soon...</p> 
	</div>	
@endsection