
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }} | Login</title>
</head>
<body class="w-full h-screen grid place-items-center bg-gray-900 text-gray-50">

    <div class="w-[450px] h-[500px] max-sm:w-[90%] mx-auto p-5 rounded-md shadow-xl border-[1px] border-gray-50/10">

        <h1 class="my-5 text-center text-3xl font-semibold tracking-wide" >Travel Blog</h1>

        <form action="{{ route('auth.login') }}" method="POST"
            class="w-full mt-16 px-10 max-sm:px-2 flex flex-col items-center justify-center gap-10" >

            @csrf

            <x-flashMessage/>

            <div class="w-full flex flex-col gap-2">
                <label for="email" class="font-bold">Email</label>
                <input name="email" id="email" type="email" required
                    class="w-full px-2 outline-none border-b-[1px] border-gray-50 bg-transparent">
                <x-formErrors inputName="email" />
            </div>

            <div class="w-full flex flex-col gap-2">
                <label for="password" class="font-bold">Password</label>
                <input name="password" id="password" type="password" required
                    class="w-full px-2 outline-none border-b-[1px] border-gray-50 bg-transparent">
                <x-formErrors inputName="password" />
            </div>

            <button class="w-full py-2 rounded-md font-bold uppercase tracking-wide hover:bg-gray-600 hover:text-gray-50 bg-gray-50 text-gray-900">Login</button>

        </form>

    </div>

</body>
</html>
