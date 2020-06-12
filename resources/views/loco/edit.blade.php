@extends('layouts.afterlogin')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<h2>Edit Locodetails</h2>
    	</div>
    	<div class="col-md-6">
    		<div class="float-right">
    			<a href="{{ route('loco.index') }}" class="btn btn-primary">Back</a>
    		</div>
    	</div>
    	<br>
        <div class="col-md-12">
        	@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif
      <form action="{{ route('loco.update', $locodetails->id) }}" method="POST">
        @csrf
                @method('PUT')
        <div class="form-group">
          <label for="title">Locono:</label>
          <input type="text" class="form-control" id="locono" name="locono" value="{{ $locodetails->locono }}">
        </div>
        <div class="form-group">
          <label for="homeshed">Homeshed:</label>
          <input type="text" class="form-control text-uppercase" id="homeshed" name="homeshed" value="{{ $locodetails->homeshed }}">
        </div>
        <div class="form-group">
          <label for="title">Trainno:</label>
          <input type="text" class="form-control text-uppercase" id="trainno" name="trainno" value="{{ $locodetails->trainno }}">
        </div>
        <div class="form-group">
          <label for="title">Source:</label>
          <input type="text" class="form-control text-uppercase" id="source" name="source" value="{{ $locodetails->source }}">
        </div>
        <div class="form-group">
          <label for="title">Destination:</label>
          <input type="text" class="form-control text-uppercase" id="destination" name="destination" value="{{ $locodetails->destination }}">
        </div>
        <div class="form-group">
          <label for="ddate">Dest Date:</label>
          <input type="date" class="form-control" id="ddate" name="ddate" value="{{ $locodetails->ddate }}">
        </div>
        <div class="form-group">
          <label for="title">Dest Time:</label>
          <input type="time" class="form-control" id="time" name="time" value="{{ $locodetails->time }}">
        </div>
        <div class="form-group">
          <label for="title">Enteredby:</label>
          <input type="text" class="form-control" id="enteredby" name="enteredby" value="{{ $locodetails->enteredby }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
        </div>
    </div>
</div>
@endsection
