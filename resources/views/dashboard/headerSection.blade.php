
@extends('layouts.__dashLayout')
@section('title', 'Header Section')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll" >

    <div class="w-full p-3 rounded-md flex items-center justify-between bg-gray-900">
        <h2 class="text-xl max-sm:text-base uppercase tracking-wide font-semibold" >Header Section</h2>
        <a href="{{route('header.create')}}"
            class="px-4 py-2 rounded-md bg-green-700 hover:bg-green-600 text-gray-50" >Add</a>
    </div>

    <x-flashMessage class="my-3" />

    <div class="w-full my-12 overflow-x-scroll" >
        <table class="w-full table-auto">
            <thead class="border-b-[1px] border-gray-50/5" >
                <tr class="text-left" >
                    <th class="p-3 text-left" >Title</th>
                    <th class="p-3 text-left" >Description</th>
                    <th class="p-3 text-left" >Image</th>
                    <th class="p-3 text-left" >Published</th>
                    <th class="p-3 text-left" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($headerContent as $content )
                <tr class="border-b-[1px] border-gray-50/5" >
                    <td class="p-3" >{{ $content->title }}</td>
                    <td class="p-3 text-wrap line-clamp-1">{{ $content->desc }}</td>
                    <td class="p-3" >
                        <img src="{{asset('storage/'.$content->image)}}" alt="image"
                            class="w-[100px] h-[50px]">
                    </td>
                    <td class="p-3" >
                        <form id="form{{$content->id}}" action="{{ route('header.updatePublished', $content->id) }}" method="POST" >
                            @csrf
                            <input name="isPublished" type="checkbox" {{ $content->isPublished ? 'checked' : '' }} onchange="submitForm({{$content->id}})" >
                        </form>
                    </td>
                    <td class="p-3 flex gap-4">
                        <a href="{{ route('header.edit', $content->id) }}" class="px-4 py-2 rounded-md
                            bg-blue-700 hover:bg-blue-600 text-gray-50" >Edit</a>
                        <form action="{{ route('header.delete', $content->id) }}" method="POST">
                            @method('delete') @csrf
                            <button class="px-4 py-2 rounded-md bg-red-700 hover:bg-red-600 text-gray-50" >Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
