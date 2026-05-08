@props(
[
    'label' => '',
    'path' => '',
])

<div>

    <label class="block text-sm font-medium text-gray-700 dark:text-zinc-400 mb-1">
        {{strtoupper($label)}}
    </label>

  @if(!$path)
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

@else
    <div class="flex relative items-center justify-center w-full max-h-44">
        <img src="{{ $path }}" alt="{{$label}}-image" class="max-w-full h-full object-cover rounded-lg ">
        <span class="absolute top-35 left-1/2 transform -translate-x-1/2 -translate-y-1/2 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary rounded-full hover:bg-primary/90 transition">
                       view upload
                </span>
    </div>

    @endif

</div>



