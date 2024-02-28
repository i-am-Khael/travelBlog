
@extends('layouts.__dashLayout')
@section('title', 'Users')
@section('content')
<section class="w-full h-screen p-4 pb-20 overflow-scroll" >

    <div class="w-full px-4 rounded-md flex items-center justify-between shadow-md bg-gray-900" >
        <h2>Users</h2>
        <a href="{{ route('dash.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-600 text-white" >Add</a>
    </div>

    <div class="w-full p-6 overflow-hidden overflow-x-scroll" >
        <table class="w-full" >
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left max-sm:hidden" >Email</th>
                    <th class="text-left" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user )
                <tr class="w-full" >
                    <td class="text-left max-ms:flex max-sm:flex-col max-sm:gap-2" >
                        <span>{{ $user->name }}</span>
                        <small class="hidden max-sm:block" >{{ $user->email }}</small>
                    </td>
                    <td class="max-sm:hidden" >{{ $user->email }}</td>
                    <td class="flex gap-2" >
                        <a href="">Edit</a>
                        <form action="" method="POST">
                            <button>Delete</button>
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
