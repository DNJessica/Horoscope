@extends('layout')
@section('title') Signup @endsection
@section('content')
<form method="post" action="/signup">
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
        <input type="email" name="email" placeholder="Email" class="form-control" required><br>
        <input type="text" name="username" placeholder="Username" class="form-control" required><br>
        <input type="password" name="password" id="pass" placeholder="Password" class="form-control" required><br>
        <input type="password"  id="confirm_pass" placeholder="Confirm password" class="form-control" required>
        <span id="match_pass" style="color: red; visibility:hidden;">Please make sure your passwords match</span><br><br>
        <button id="btn_submit" class="btn btn-purple" type="submit" disabled="true">Continue</button><br>
        <div class="text-center" style="padding-top: 15px">
            <span> Already a member? <a class="signup-link" href="login">Log in</a></span>
        </div> 
    </div>
</form>
<script type="text/javascript">

$( document ).ready(function() {
    document.getElementById('pass').addEventListener("keyup", function (evt) {
        var confirm_pass = document.getElementById("confirm_pass");
        var submit = document.getElementById("btn_submit");
        var warning = document.getElementById("match_pass");
        if(this.value && (confirm_pass.value == this.value)){
            confirm_pass.style.borderColor = "silver";
            warning.style.visibility = "hidden";
            submit.disabled=false;
        } else {
            submit.disabled=true;
        }
    }, false);

    document.getElementById('confirm_pass').addEventListener("keyup", function (evt) {
        var pass = document.getElementById("pass");
        var submit = document.getElementById("btn_submit");
        var warning = document.getElementById("match_pass");
        if(pass.value && (pass.value == this.value)){
            this.style.borderColor = "silver";
            warning.style.visibility = "hidden";
            submit.disabled=false;
        } else {
            this.style.borderColor = "red";
            warning.style.visibility = "visible" ;
            submit.disabled=true;
        }
    }, false);
});
</script>
@endsection