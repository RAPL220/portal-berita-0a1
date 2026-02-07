@extends('layouts.app')

@section('title', $category->title)

@section('content')

    <style>
        .news-excerpt {
            font-size: 0.9rem;
            color: var(--text-gray);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* jumlah baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>


    <!-- Header -->
    <div class="w-full mb-16 bg-[#F6F6F6]">
        <h1 class="text-center font-bold text-2xl p-24">{{ $category->title }}</h1>
    </div>


    <!-- Berita -->
    <div class=" flex flex-col gap-5 px-4 lg:px-14">
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">

            @foreach ($category->news as $article)
                <a href="{{ route('news.show', $article->slug) }}">
                    <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out"
                        style="height: 100%">
                        {{-- <div
                            class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                            {{ $category->title }}</div> --}}
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                            class="w-full rounded-xl mb-3" style="height: 200px; object-fit:cover;">
                        <p class="font-bold text-base mb-1">{{ $article->title }}</p>

                        <p class="text-slate-400">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</p>
                    </div>
                </a>
            @endforeach


        </div>

    </div>

@endsection
