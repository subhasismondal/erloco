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
        	<div class="md-output-form">
                <strong>Locono</strong> {{ $locodetails->locono }}
            </div>
            <br>
            <br><br>
        	<div class="md-output-form">
                <strong>Trainno</strong> {{ $locodetails ->trainno }}
            </div>
            <br>
            <br><br>
        	<div class="md-output-form">
                <strong>Source:</strong> {{ $locodetails->source }}
            </div>
            <br><br>
        	<div class="md-output-form">
                <strong>Destination:</strong> {{ $locodetails->destination }}
            </div>
            <br>
            <div class="md-output-form">
                <strong>Dept Date:</strong> {{ $locodetails->ddate }}
            </div>
            <br>
            <div class="md-output-form">
                <strong>Dept Time:</strong> {{ $locodetails->time }}
            </div>
            <br>
            <div class="md-output-form">
                <strong>Homeshed</strong> {{ $locodetails->homeshed }}
            </div>
            <br>
            <div class="md-output-form">
                <strong>Entered By</strong> {{ $locodetails->enteredby }}
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
