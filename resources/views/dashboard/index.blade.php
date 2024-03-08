
@extends('layouts.__dashLayout')
@section('title', 'Users')
@section('content')
<section class="w-full h-screen p-4 pb-20 overflow-scroll" >

    <div class="w-full px-4 rounded-md flex items-center justify-between shadow-md bg-gray-900" >
        <h2 class="font-semibold uppercase tracking-wider">Users</h2>
        <a href="{{ route('user.create') }}" class="my-2 px-4 py-2 rounded-md bg-green-700 hover:bg-green-600 text-white" >Add</a>
    </div>

    <x-flashMessage/>

    <div class="w-full p-6 overflow-hidden overflow-x-scroll" >
        <table class="w-full table-auto border-seperate" >
            <thead class="border-b-[1px] border-gray-50/10">
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left max-sm:hidden" >Email</th>
                    <th class="p-2 text-left" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user )
                <tr class="w-full border-b-[1px] border-gray-50/5" >
                    <td class="p-2 text-left max-ms:flex max-sm:flex-col max-sm:gap-2" >
                        <span>{{ $user->name }}</span>
                        <small class="hidden max-sm:block" >{{ $user->email }}</small>
                    </td>
                    <td class="p-2 max-sm:hidden" >{{ $user->email }}</td>
                    <td class="p-2 flex gap-2" >
                        <a href="{{ route('user.edit', $user->id) }}"
                            class="px-4 py-1 rounded-sm bg-blue-800 text-gray-50 hover:bg-blue-600" >Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @method('delete') @csrf
                            <button class="px-4 py-1 rounded-sm bg-red-800 text-gray-50 hover:bg-red-600" >Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full flex items-center justify-between" >
        <div></div>
        <div>
            {{ $users->links() }}
        </div>
    </div>

</section>
@endsection
