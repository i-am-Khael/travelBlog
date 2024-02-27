
@extends('layouts.__dashLayout')
@section('title', 'Users')
@section('content')
<main class="mainContainer" >
    <x-dashNavBar/>
    <section class="w-full h-screen p-4 overflow-scroll" >

        <div class="w-full p-3 px-6 rounded-full flex items-center justify-between bg-gray-900" >
            <h2>Users</h2>
            <button class="py-2 px-6 rounded-full bg-green-700 hover:bg-green-600 text-white">Add</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>

    </section>
</main>
@endsection
