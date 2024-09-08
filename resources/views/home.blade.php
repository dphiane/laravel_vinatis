@extends('base')

@section('title', 'Vinatis - Accueil')

@section('content')
<ul>
    @foreach($wines as $wine)
    <li>{{$wine->name}}</li>
    @endforeach
</ul>
@endsection