
@extends('layouts.__dashLayout')
@section('title', 'Articles')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll" >

    <div>
        <h2>Articles</h2>
        <a href="{{ route('article.create') }}">Add</a>
    </div>

</section>
@endsection
