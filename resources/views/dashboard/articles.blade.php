
@extends('layouts.__dashLayout')
@section('title', 'Articles')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll" >

    <div class="w-full flex items-center justify-between">
        <h2>Articles</h2>
        <a href="{{ route('article.create') }}">Add</a>
    </div>

    <div class="w-full flex flex-col items-center">

        <x-flashMessage/>

        <table class="w-full">
            <thead>
                <tr class="text-left">
                    <th>Title</th>
                    <th>Featured</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $article )
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->featured === 1 ? 'Yes' : 'No' }}</td>
                    <td class="flex gap-3">
                        <a href="{{ route('article.edit', $article->id) }}">Edit</a>
                        <form action="{{ route('article.delete', $article->id) }}" method="POST">
                            @method('delete') @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
