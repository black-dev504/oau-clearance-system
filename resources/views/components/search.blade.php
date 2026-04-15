<form class="max-w-md">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-zinc-400">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="search" id="default-search"
               wire:model.live.debounce.300ms="search"
               class="block p-4 py-2 w-72 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-primary focus:border-primary  dark:bg-white/10 dark:border-white/10  dark:placeholder-zinc-400 dark:text-zinc-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
               placeholder="Search ..." required />
    </div>
</form>
