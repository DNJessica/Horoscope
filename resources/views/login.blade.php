@extends('layout')
@section('title') Login @endsection
@section('content')
<form method="post" action="/login">
    @csrf
    <div class="col-md-6" style="background-color: white; float:none;margin:auto; margin-top: 10%; padding:30px 10px">
        <input type="text" name="username" id="username" placeholder="Username or email" class="form-control" required><br>
        <input type="text" name="pass" id="pass" placeholder="Password" class="form-control" required><br>
        <button type="submit">Login</button>
    </div>
</form>
<!-- <script type="text/javascript">
    $( document ).ready(function() {
        console.log( "document loaded" );
    });

</script> -->
@endsection