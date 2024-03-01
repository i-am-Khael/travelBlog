
@props(['contents'])
<section class="w-full h-screen grid place-items-center" >
    <div class="flex flex-col items-center justify-center" >
        <h1>{{ $contents ? $contents->title : 'Title here. ' }}</h1>
        <p>{{ $contents ? $contents->desc : 'A simple paragaraph here' }}</p>
    </div>
</section>
