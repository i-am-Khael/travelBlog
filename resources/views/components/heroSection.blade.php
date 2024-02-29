
@props(['contents'])
<section class="w-full h-screen grid place-items-center" >
    <div class="flex flex-col items-center justify-center" >
        <h1>{{ $contents->title }}</h1>
        <p>{{ $contents->desc }}</p>
    </div>
</section>
