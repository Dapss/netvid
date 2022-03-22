<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row-reverse">
                    <form action="" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" class="text-slate-600 hover:text-slate-500 justify-end items-end self-end">
                    </form>
                    <a href="{{ route('film.edit' , $film->id)}}" class="text-slate-600 hover:text-slate-500 justify-end items-end self-end mr-2">Edit</a>
                </div>
                <div class="p-6">
                    <x-auth-validation-errors />
                    <x-success-message />

                    <div class="grid grid-cols-2 gap-6">
                        <div class="">
                            <div class="font-semibold text-2xl text-white">{{$film->judul}}</div>
                            <div class="mr-2 text-gray-400">{{$film->genre}} | {{$film->tahun}}</div>
                            <div class="mb-8 mt-4">{{$film->sinopsis}}</div>
                            <div class="content-end items-end justify-end">
                                <a href="{{ route('login') }}" class="py-4 px-6 w-48 bg-red-600 hover:bg-red-500 text-white rounded-md hover:scale-110 ease-out duration-300 flex justify-center items-center"> 
                                    <span class="mr-2">
                                        <x-heroicon-o-play class="w-8 h-8 text-white"/>
                                    </span>
                                     Watch Now!
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <img class="rounded-md scale-100 w-52 h-72" src="{{$film->posterImage()}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>