<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </x-slot>
    {{-- Hots --}}
     {{-- Slider --}}
     <div class="swiper mySwiper px-4 py-2 mb-8 mt-4 ">
        <div class="swiper-wrapper">
        @foreach ($serials as $keys => $serial)
        <div class="swiper-slide">
            <div class="object-cover w-full h-96 grid grid-cols-2">
              <div class="ml-32 mt-8">
                  <div class="font-semibold text-2xl text-white">{{$serial->judul}}</div>
                  <div class="mb-8 mt-4">{{$serial->sinopsis}}</div>
                  <div class="content-end">
                      <a href="{{ route('serial.show' , $serial->id) }}" class="py-4 w-48 underline text-gray-200 hover:text-white rounded-md hover:scale-110 ease-out duration-300"> 
                           See More!
                      </a>
                  </div>
              </div>
              <div class="mt-8">
                  <img class="rounded-md scale-100 " src="{{$serial->coverImage()}}" alt="">
              </div>
            </div>
        </div>
        <!--{{++$keys}}-->
        @if ($keys == 4)
            @break
        @endif
        @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    {{--  Movie Poster  --}}
    <div class="p-6 overflow-hidden bg-slate-800 rounded-md shadow-md">
       
      <div class="p-6 overflow-hidden bg-slate-800 rounded-md shadow-md">
        <x-auth-validation-errors />
        <x-success-message />

        <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center">
            <div class="mr-2">
                <x-heroicon-o-lightning-bolt class="w-8 h-8 text-gray-200"/>
            </div>
            Films
        </h2>
        <div class="mt-4 grid md:grid-cols-5 sm:grid sm:grid-cols-2 gap-6 sm:justify-center">
            @foreach ($films as $keys=>$data)
            <a href="{{route('serial.show' , $data->id)}}">
                <div class="w-48 h-64 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            <!-- {{++$keys}} -->
            @if ($keys == 5)
                @break
            @endif
            @endforeach
        </div>

        <h2 class="flex text-white font-semibold text-2xl mt-12 items-center content-center">
            <div class="mr-2">
                <x-heroicon-o-fire class="w-8 h-8 text-gray-200"/>
            </div>
            Serials
        </h2>

        <div class="mt-4 grid md:grid-cols-5 sm:grid sm:grid-cols-2 gap-6 sm:justify-center">
            @foreach ($serials as $keys=>$data)
            <a href="{{route('serial.show' , $data->id)}}">
                <div class="w-48 h-64 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            <!--{{++$keys}}-->
            @if ($keys == 5)
                @break
            @endif
            @endforeach
        </div>
    </div>


     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script>
       var swiper = new Swiper('.mySwiper', {
         spaceBetween: 30,
         centeredSlides: true,
         autoplay: {
           delay: 3150,
           disableOnInteraction: false,
         },
         pagination: {
           el: '.swiper-pagination',
           clickable: true,
         },
         navigation: {
           nextEl: '.swiper-button-next',
           prevEl: '.swiper-button-prev',
         },
       });
     </script>


</x-app-layout>