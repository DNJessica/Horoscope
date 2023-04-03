@extends('layout')
@section('title') Signup @endsection
@section('content')
<form method="post" action="/signup/details">
    @csrf
    <div class="col-md-6 login-form text-center">
        <h2 style="color: #a31aff">Signup Form</h2><hr>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" name="name" placeholder="Name" class="form-control" required><br>
        <input type="text" name="last_name" placeholder="Lastname" class="form-control" required><br>
        <div class="date-form">
            <label for="birthdate" style="margin-right: 5px">Date of birth:</label>
            <input type="date" id="birthdate" name="birthdate" required>
        </div>
        <button id="btn_submit" class="btn btn-purple" type="submit">Signup</button><br>
    </div>
</form>
@endsection