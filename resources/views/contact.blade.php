@extends('layouts.app')

@section('content')



@endsection

<h1>Contact Page </h1>

@if(count($people))
    <ul>
    @foreach($people as $person)

        <li>{{$person}}</li>

    @endforeach
    </ul>

    @endif

@section('footer')


    <script>

       // alert('Hello you are hoşgledin')

    </script>

@stop