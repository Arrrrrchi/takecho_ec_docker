<x-guest-layout>
    {{-- HERO --}}
    <div class="relative bg-gray-900">
        <div class="relative h-[80vh] bg-center bg-cover">
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset("images/top1.JPG")}}" alt="Hero Image">
        </div>
    </div>

    {{-- BARRNER --}}
    <div class="relative bg-white h-[80vh] pt-24 pb-24">
        <div class="relative bg-center bg-cover">
        </div>
    </div>

    {{-- ITEMS --}}
    <div class="relative pt-24 pb-24" style="background-color: RGB(248, 244, 241)">
        <div class="relative bg-center bg-cover">
        </div>
    </div>

    {{-- RECIPI --}}
    <div class="relative bg-white pt-24 pb-24">
        <div class="relative bg-center bg-cover">
        </div>
    </div>

    {{-- YOUTUBE --}}
    <div class="relative pt-24 pb-24" style="background-color: RGB(248, 244, 241)">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
            </svg>
            <h2 class="text-3xl">YouTube新着</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <youtube-play-list :response-body="{{ $youtube_api_response }}"/>
        </div>
    </div>

    {{-- INSTAGRAM --}}
    <div class="relative bg-white pt-24 pb-24">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
            </svg>
            <h2 class="text-3xl">Instagram</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <instagram-post-list :response-body="{{ $instagram_api_response }}"/>
        </div>
    </div>

</x-guest-layout>

