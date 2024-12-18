@php
    $tags = explode(',', $gigs->tags);
@endphp

@extends('layouts.layout')
@section('body')
    <main>
        <!-- Search -->
        <form action="/search">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="text" name="search"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Search Laravel Gigs..." />
                <div class="absolute top-2 right-2">
                    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                        Search
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ url()->previous() }} " class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>
            Back
        </a>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div class="flex flex-col items-center justify-center text-center">
                    <img class="w-48 mr-6 mb-6" src="/images/no-image.png" alt="" />

                    <h3 class="text-2xl mb-2">{{ $gigs->title }}</h3>
                    <div class="text-xl font-bold mb-4">{{ $gigs->company }}</div>
                    <ul class="flex">
                        @foreach ($tags as $tag)
                            <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                                <a href="#">{{ $tag }}</a>
                            </li>
                        @endforEach
                    </ul>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $gigs->location }}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>
                                {{ $gigs->description }}
                            </p>
                            <a href="mailto:test@test.com"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-envelope"></i>
                                Contact Employer</a>

                            <a href="https://test.com" target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-globe"></i> Visit
                                Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
