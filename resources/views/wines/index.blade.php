@extends('base')

@section('title', 'Liste des vins')

@section('content')

    <a href="{{ route('vins.create') }}">Ajouter du vin</a>

    @foreach ($wines as $wine)
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{route('vins.show', $wine->id) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $wine->name }}</h5>
            </a>
            <ul class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <li>
                    {{ $wine->domain }}
                </li>
                <li>
                    {{ $wine->year }}
                </li>
                <li>
                    {{ $wine->region->name }}
                </li>
            </ul>
        </div>
    @endforeach

@endsection
