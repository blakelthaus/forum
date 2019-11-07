<script>
    function showMenu() {
        var menu = this.document.getElementById('menu-options');
        console.log(menu.style.display);
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }
</script>

<nav class="flex items-center justify-between flex-wrap bg-black p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <img class="h-18 w-12" src="/img/vgk-logo.png" alt="Vegas Golden Knights">
    </div>
    <div class="block lg:hidden">
        <button onclick="showMenu()" class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div id="menu-options" class="w-full hidden flex-grow lg:block lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="{{ route('vgk.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200 mr-4">
                Home
            </a>
            <a href="{{ route('vgk.players') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200 mr-4">
                Players
            </a>
            <a href="{{ route('vgk.games') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200">
                Schedule
            </a>
        </div>
    </div>
</nav>

