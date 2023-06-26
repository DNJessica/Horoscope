@extends('layout')
@section('title') Settings @endsection
@section('content')
<form method="post" action="/settings/{{$user->login_id}}">
    @csrf
    <div class="col-md-6 login-form text-center">
        <h2 style="color: #a31aff">Profile settings</h2><hr>
        <input type="text" name="name" value="{{$user->name}}" class="form-control" required><br>
        <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" required><br>
        <div class="date-form">
            <label for="birthdate" style="margin-right: 5px">Date of birth:</label>
            <input type="date" value="{{$user->birth_date}}" id="birthdate" name="birthdate" required>
        </div>
        <div class="date-form">
        <hr><h5 style="text-align: center;">Would you like to receive horoscope every day?</h5>
            <div class="form-check form-switch">
                <label class="form-check-label" for="email_egree">Receive horoscope</label>
                @if($user->email_agree)
                    <input class="form-check-input" type="checkbox" role="switch" name="email_agree" id="email_agree" checked>
                @else
                    <input class="form-check-input" type="checkbox" role="switch" name="email_agree" id="email_agree">
                @endif    
            </div>
        </div>
        <button class="btn btn-purple" type="submit">Save</button><br>
    </div>
</form>

<script type="text/javascript">

// $( document ).ready(function() {
//     var agree = document.getElementById("email_agree");
//     console.log(agree.value);
//     if(agree.value == 1){
//         agree.checked=true;
//     } else {
//         agree.checked=false;
//     }
    
// });
</script>
@endsection