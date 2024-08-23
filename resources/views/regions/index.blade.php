@extends('base')

@section('title', 'Régions')

@section('content')

    <div class="full-w relative overflow-x-auto">
        <table class="w-full md:w-auto text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Noms de la région
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $region->name }}
                        </th>
                        <td>
                            <a href="{{route('region.edit', $region)}}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Editer</a>
                                <button data-modal-target="modal-{{ $region->id }}" data-modal-toggle="modal-{{ $region->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline p-2" type="button">
                                    Supprimer
                                </button>
                                
                                <x-confirm-delete-modal
                                    :modalId="'modal-'.$region->id"
                                    :action="route('region.destroy', $region->id)"
                                    :message="'Es-tu sûr de vouloir supprimer la région : '.$region->name.' ?'"
                                />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
