<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('About') }}
            </h2>
        </div>
    </x-slot>
    {{-- Hots --}}
    {{--  Movie Poster  --}}
    <div class="p-6 overflow-hidden bg-slate-800 rounded-md shadow-md">
       <h2 class="font-sans text-2xl font-bold">About us.</h2>
        <p class="">
            Website ini dibangun oleh kelompok 5. Yang beranggotakan Dhafin , Daffa , Luthfi , Tharissa , Nabila. Website ini berisikan tentang daftar 
            film dan series, atau kita sebut copy netflix heheh :D .
        </p>
        <br>
        <div><h3 class="font-semibold text-lg">Alasan Membuat</h3>
            <p>Karena ini adalah tugas PWPB Laravel CRUD dengan authentication</p>
        </div>
        
    </div>

    
</x-app-layout>