
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
<body class="gridContainer bg-gray-950 text-gray-400" >
    <x-dashSideBar/>
    <main class="mainContainer overflow-scroll" >
        <x-dashNavBar/>
        @yield('content')
    </main>
    <script defer >
        const submitForm = (id) => {
            const isPublishedForm = document.querySelector(`#form${id}`);
            isPublishedForm.submit();
        }
    </script>
</body>
</html>
