@extends('layouts.__pagesLayout')
@section('title', 'Article')
@section('content')
    <main class="max-w-[2000px] mx-auto min-h-screen py-[4rem]" >

      <section class="w-[90%] h-full mx-auto flex flex-col gap-4 ">

        <h2 class="text-3xl max-ms:text-base font-semibold tracking-wide" >{{ $article->title }}</h2>

        <div class="">
          <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }} Image">
          <small>{{ date('Y-m-d', strtotime($article->created_at)) }}</small>
        </div>

        <div class="indent-4 text-justify">
          <p>{{ $article->content }}</p>
        </div>


      </section>

    </main>
@endsection
