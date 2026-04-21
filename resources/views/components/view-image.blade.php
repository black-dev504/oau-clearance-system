@props(
[
    'label' => ''
])

<div>

    <label class="block text-sm font-medium text-gray-700 dark:text-zinc-400 mb-1">
        {{strtoupper($label)}}
    </label>

    <label for="upload" class="flex flex-col items-center justify-center w-full h-48 border border-dashed hover:border-primary border-primary-border py-1 dark:border-white/10 rounded-2xl cursor-pointer dark:hover:bg-zinc-700 hover:bg-gray-50 text-center transition">
        <div class="flex flex-col items-center justify-center text-gray-500 space-y-2">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#F9F5FF] text-[#6941C6]">
                <x-icons.upload class="w-5 h-5" />
            </div>
            <span class="mt-2 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary-600 rounded-full hover:bg-primary-600/90 transition">
                                 View upload
                    </span>

        </div>
    </label>

</div>
