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
        <div class="relative bg-center bg-cover">
            <youtube-play-list :response-body="{{ $youtube_api_response }}"/>
        </div>
    </div>

    {{-- INSTAGRAM --}}
    <div class="relative bg-white pt-24 pb-24">
        <div class="relative bg-center bg-cover">
            <instagram-post-list :response-body="{{ $instagram_api_response }}"/>
        </div>
    </div>

</x-guest-layout>

