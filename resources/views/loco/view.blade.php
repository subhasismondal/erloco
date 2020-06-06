@extends('layouts.afterlogin')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<h2>Todo Details</h2>
    	</div>
    	<div class="col-md-6">
    		<div class="float-right">
    			<a href="{{ route('loco.index') }}" class="btn btn-primary">Back</a>
    		</div>
    	</div>
    	<br>
        <div class="col-md-12">
            <br><br>
        	<div class="todo-title">
                <strong>Locono</strong> {{ $locodetails->locono }}
            </div>
            <br>
            <br><br>
        	<div class="todo-title">
                <strong>Trainno</strong> {{ $locodetails->trainno }}
            </div>
            <br>
            <br><br>
        	<div class="todo-title">
                <strong>Source:</strong> {{ $locodetails->source }}
            </div>
            <br><br>
        	<div class="todo-title">
                <strong>Destination:</strong> {{ $locodetails->destination }}
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
