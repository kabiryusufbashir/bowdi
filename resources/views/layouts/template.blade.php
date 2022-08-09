<!-- Toggle  -->
<div id="menu" class="md:hidden cursor-pointer bg-green-800 py-5 flex justify-between">
    <span class="mx-4 text-white text-xl">
        Menu
    </span>
    <span>
        <svg class="w-8 h-8 text-white ml-auto mx-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </span>
</div>
<!-- Nav  -->
<div id="nav" class="col-span-2 hidden md:block">
    @if(Auth::user()->type == 1)
        @include('includes.nav-front')
    @elseif(Auth::user()->type == 2)
        @include('includes.nav-hr')
    @elseif(Auth::user()->type == 3)
        @include('includes.nav-normal')
    @endif
</div>
