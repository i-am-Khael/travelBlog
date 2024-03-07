@extends('layouts.__pagesLayout')
@section('title', 'Home')
@section('content')
    <main class="max-w-[2000px] h-full mx-auto">

        <x-heroSection :contents="$header[0]" />

        <section class="w-[90%] h-full mx-auto py-[5rem]">

            <h2 class="pb-4 uppercase tracking-wider font-bold text-2xl">Featured Articles</h2>

            <div class="w-full h-full grid grid-cols-3 max-md:grid-cols-2 max-sm:grid-cols-1 gap-4">

                @foreach ($articles as $article)
                    <a href="{{ route('page.viewArticle', $article->id) }}">
                        <div class="w-full h-full p-4 rounded-md border-[1px] border-gray-50/5
                            flex flex-col gap-3">

                            <h3>{{ $article->title }}</h3>

                            <div>
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }} Image"
                                    class="w-full h-full object-cover">
                            </div>

                            <div>
                                <p class="line-clamp-2">{{ $article->content }}</p>
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>


        </section>

    </main>
@endsection
