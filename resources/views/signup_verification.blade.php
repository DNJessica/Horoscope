@extends('layout')
@section('title') Signup @endsection
@section('content')
<form method="post" action="/signup/verification">
    @csrf
    <div class="col-md-4 login-form text-center">
        <h2 style="color: #a31aff">Enter your verification code</h2><hr>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" name="code" id="code" placeholder="123456" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" ><br>
        <button id="btn_submit" class="btn btn-purple" type="submit" disabled="true">Signup</button><br>
    </div>
</form>
<script type="text/javascript">

$( document ).ready(function() {
    document.getElementById('code').addEventListener("keyup", function (evt) {
        var submit = document.getElementById("btn_submit");
        if(this.value.length === 6){
            submit.disabled=false;
        } else {
            submit.disabled=true;
        }
    }, false);
});
</script>
@endsection