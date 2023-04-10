@extends('layout')
@section('title') Home page @endsection
@section('content')
<script type="text/javascript">

$( document ).ready(function() {
    //const axios = require("axios");

const options = {
  method: 'GET',
  url: 'https://horoscopeapi-horoscope-v1.p.rapidapi.com/daily',
  params: {date: 'today'},
  headers: {
    'X-RapidAPI-Key': '93571833damshc388b21d40a5baap16c71bjsn2549a09ed19e',
    'X-RapidAPI-Host': 'horoscopeapi-horoscope-v1.p.rapidapi.com'
  }
};

axios.request(options).then(function (response) {
	console.log(response.data);
}).catch(function (error) {
	console.error(error);
});
    // $.ajax({
    //     type:'GET',
    //     url:'https://horoscopeapi-horoscope-v1.p.rapidapi.com/daily',
    //     headers: {
    //         'X-RapidAPI-Key': '93571833damshc388b21d40a5baap16c71bjsn2549a09ed19e',
    //         'X-RapidAPI-Host': 'horoscopeapi-horoscope-v1.p.rapidapi.com'
    //     },
    //     success:function(data){
    //         console.log(data);
    //     }
    // });
});
</script>
@endsection
