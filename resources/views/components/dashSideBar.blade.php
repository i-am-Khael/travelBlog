
<section class="dashSideBar border-r-[1px] border-gray-50/5 bg-gray-900">

    <div class="w-full h-full flex flex-col items-center justify-between"  >

        <div class="py-5 flex flex-col gap-10" >
            <h2 class="text-center tracking-wider text-2xl max-sm:text-lg font-semibold" >
               <a href="{{ route('user.index') }}"> TravelBlog </a>
            </h2>
            <menu class="flex flex-col gap-4 font-semibold">
                <div class="w-full hover:text-blue-700 flex items-center justify-center gap-2" >
                    <i class="fa-solid fa-heading"></i>
                    <a href="{{route('header.index')}}" >Header</a>
                </div>
                <div class="w-full hover:text-blue-700 flex items-center justify-center gap-2" >
                    <i class="fa-solid fa-newspaper"></i>
                    <a href="{{route('article.index')}}" class="hover:text-blue-700" >Articles</a>
                </div>
            </menu>
        </div>


        <div class="w-full p-4 flex items-center justify-center bg-gray-50/5 hover:text-red-600" >
            <a href="{{ route('auth.logout') }}" class="font-semibold tracking-wide uppercase" >Logout</a>
        </div>

    </div>

</section>
