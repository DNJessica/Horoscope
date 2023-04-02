@extends('layout')
@section('title') Login @endsection
@section('content')
<form method="post" action="/login">
    @csrf
    <div class="col-md-6 login-form text-center">
        <h2 style="color: #a31aff">Login Form</h2><hr>
        <input type="text" name="username" placeholder="Username or email" class="form-control" required><br>
        <input type="password" name="pass" id="pass" placeholder="Password" class="form-control" required><br>
        <button class="btn btn-purple" type="submit">Login</button><br>
        <div class="text-center" style="padding-top: 15px">
            <span> Not a member? <a class="signup-link" href="signup">Signup now</a></span>
        </div> 
    </div>
</form>
<!-- <script type="text/javascript">
    $( document ).ready(function() {
        console.log( "document loaded" );
    });

</script> -->
@endsection