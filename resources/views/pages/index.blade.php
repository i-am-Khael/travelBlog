@extends('layouts.__pagesLayout')
@section('title', 'Home')
@section('content')
    <main class="max-w-[2000px] h-full mx-auto">
        <x-heroSection :contents="$header[0]" />
    </main>
@endsection
