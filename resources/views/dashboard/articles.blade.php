
@extends('layouts.__dashLayout')
@section('title', 'Articles')
@section('content')
<section class="w-full h-screen p-4 pb-[10rem] overflow-scroll" >

    <div class="w-full p-2 rounded-md flex items-center justify-between bg-gray-900">
        <h2 class="uppercase tracking-wider font-semibold">Articles</h2>
        <a href="{{ route('article.create') }}" class="px-4 py-2 rounded-md bg-green-700 hover:bg-green-600 text-gray-50" >Add</a>
    </div>

    <div class="w-full mt-10 flex flex-col items-center">

        <x-flashMessage/>

        <table class="w-full table-auto">
            <thead class="border-b-[1px] border-gray-50/5" >
                <tr class="text-left">
                    <th class="p-2 text-left" >Title</th>
                    <th class="p-2 text-left" >Image</th>
                    <th class="p-2 text-left" >Featured</th>
                    <th class="p-2 text-left" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $article )
                <tr class="border-b-[1px] border-gray-50/5" >
                    <td class="p-4">{{ $article->title }}</td>
                    <td class="p-4" >
                        <img src="{{asset('storage/'.$article->image)}}" alt="Image"
                            class="w-[100px] h-[50px]">
                    </td>
                    <td class="p-4">{{ $article->featured === 1 ? 'Yes' : 'No' }}</td>
                    <td class="p-4 text-left flex items-center gap-2">
                        <a href="{{ route('article.edit', $article->id) }}"
                            class="px-4 py-2 bg-blue-700 hover:bg-blue-600 text-gray-50 rounded-sm" >Edit</a>
                        <form action="{{ route('article.delete', $article->id) }}" method="POST"
                                class="flex items-center justify-center" >
                            @method('delete') @csrf
                            <button class="px-4 py-2 bg-red-700 hover:bg-red-600 text-gray-50 rounded-sm" >Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
