@extends('layouts.afterlogin')
@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add Locodetails</h2>
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
            <form action="{{ route('loco.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="locono">Locono:</label>
                    <input type="text" class="form-control" id="locono" name="locono">
                </div>
                <div class="form-group">
                    <label for="homeshed">Homeshed:</label>
                    <input type="text" class="form-control" id="homeshed" name="homeshed">
                </div>
                <div class="form-group">
                    <label for="trainno">Trainno:</label>
                    <input type="text" class="form-control" id="trainno" name="trainno">
                </div>
                <div class="form-group">
                    <label for="source">Source:</label>
                    <input type="text" class="form-control" id="source" name="source">
                </div>
                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <input type="text" class="form-control" id="destination" name="destination">
                </div>
                <div class="form-group">
                    <label for="ddate">Dept date:</label>
                    <input type="date" class="form-control" id="ddate" name="ddate">
                </div>
                <div class="form-group">
                    <label for="time">Dept Time:</label>
                    <input type="time" class="form-control" id="time" name="time">
                </div>
                <div class="form-group">
                    <label for="inspection">Inspection:</label>
                    <input type="inspection" class="form-control" id="inspection" name="inspection">
                </div>
                <div class="form-group">
                    <label for="idate">Inspection Date:</label>
                    <input type="date" class="form-control" id="idate" name="idate">
                </div>

                <div class="form-group">
                    <label for="title"></label>
                    <input type="hidden" class="form-control" id="enteredby" name="enteredby" value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="division"></label>
                    <input type="hidden" class="form-control" id="division" name="division" value="{{ $user->division }}" readonly>
                </div>
                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
