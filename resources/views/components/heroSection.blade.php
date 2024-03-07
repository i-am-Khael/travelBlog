
@props(['contents'])

<section class="w-full h-screen mx-auto flex justify-center relative" >

    <div class="w-full h-full flex flex-col items-center justify-center">
        <h1 class="text-4xl max-sm:text-2xl font-bold">{{ $contents->title }}</h1>
        <p class="text-lg max-sm:text-base" >{{ $contents->desc }}</p>
        <a href="{{ route('page.article') }}" class="mt-6 px-6 py-2 font-semibold rounded-md bg-green-600 text-gray-50 hover:bg-green-800">Articles</a>
    </div>

    <div class="w-full h-full absolute top-0 left-0 z-[-2] bg-cover">
        <img src="{{asset('storage/'.$contents->image)}}" alt="image"
        class="w-full h-full object-cover]">
    </div>

    <div class="w-full h-full top-0 left-0 absolute z-[-1] bg-black/50"></div>

</section>
