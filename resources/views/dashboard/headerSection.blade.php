
@extends('layouts.__dashLayout')
@section('title', 'Header Section')
@section('content')
<section class="w-full h-screen p-4 overflow-scroll" >

    <div class="w-full flex items-center justify-between">
        <h2>Contents</h2>
        <a href="{{route('header.create')}}">Add</a>
    </div>

    <x-flashMessage/>

    <div class="w-full overflow-x-scroll" >
        <table class="w-full">
            <thead>
                <tr class="text-left" >
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($headerContent as $content )
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ $content->desc }}</td>
                    <td>{{ $content->image }}</td>
                    <td>
                        <form id="isPublishedForm" action="{{ route('header.updatePublished', $content->id) }}" method="POST" >
                            @csrf
                            <input name="isPublished" type="checkbox" {{ $content->isPublished ? 'checked' : '' }} onchange="submitForm()" >
                        </form>
                    </td>
                    <td class="flex gap-4">
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
