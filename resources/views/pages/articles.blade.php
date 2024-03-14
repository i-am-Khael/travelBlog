@extends('layouts.__pagesLayout')
@section('title', 'Articles')
@section('content')
    <main class="max-w-[2000px] min-h-screen mx-auto p-4 text-justify overflow-scroll">

        <section class="w-[90%] h-full mx-auto my-10">


            <div class="w-full h-full my-12 grid grid-cols-3 place-items-center gap-4 max-lg:grid-cols-2 max-sm:grid-cols-1">

                @foreach ($articles as $article)
                    <div class="p-4 rounded-md border-[1px] border-gray-50/5 shadow-lg hover:border-gray-50">

                        <p class="pb-4 text-lg font-bold tracking-wide">{{ $article->title }}</p>

                        <div class="">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }} Image"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="w-full flex items-center justify-between">
                            <small>{{ $article->featured === 1 ? 'Featured' : '' }}</small>
                            <small>{{ date('Y-m-d'), strtotime($article->created_at) }}</small>
                        </div>

                        <div class="py-4 justify-text flex flex-col gap-4">
                            <p class="">{{ Str::words($article->content, 20) }}</p>
                        </div>


                        <a href="{{ route('page.viewArticle', $article->id) }}"
                            class="w-[120px] p-2 text-center bg-green-600 rounded-md">Read more</a>

                    </div>
                @endforeach

            </div>

            <div class="w-full flex items-center justify-between">
                <p>{{ $articles->links() }}</p>
            </div>

        </section>

    </main>
@endsection
