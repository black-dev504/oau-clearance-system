
@props([
    'label' => '',
    'model' => '',
    'preview' => false,
    'id' => uniqid('upload_'),
    'name' => 'ID',

])

<div>

    <label class="block text-sm font-medium text-gray-700 dark:text-zinc-400 mb-1">
        {{ $label }}
    </label>

    <label for="{{$id}}" class="relative flex flex-col items-center justify-center w-full h-48 border border-dashed hover:border-primary border-primary-border py-1 dark:border-white/10 rounded-2xl cursor-pointer dark:hover:bg-zinc-700 hover:bg-gray-50 text-center transition">

        <div class="flex flex-col items-center justify-center text-gray-500 space-y-2">
            @if(!$preview)
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                        <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                        <path d="M17 8L12 3L7 8" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                        <path d="M12 3V15" stroke="#4b3be4" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-900 mb-1 dark:text-zinc-400">Click to upload {{$name}}</p>
                <p class="text-xs text-gray-500">PNG, JPG or JPEG (max. 2MB)</p>

            @else
                <div class="flex relative items-center justify-center w-full max-h-44">
                    <img src="{{ $preview }}" alt="Preview" class="max-w-full h-full object-contain rounded-lg ">
                    <span class="absolute top-35 left-1/2 transform -translate-x-1/2 -translate-y-1/2 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary rounded-full hover:bg-primary/90 transition">
                        Change Picture
                </span>
                </div>

            @endif

        </div>

        {{-- Loading overlay: shown only while THIS specific file is uploading --}}
        <div wire:loading.flex wire:target="{{ $model }}"
             class="absolute inset-0 flex flex-col items-center justify-center gap-2 bg-white/85 dark:bg-zinc-800/85 backdrop-blur-sm rounded-2xl">
            <svg class="animate-spin h-8 w-8 text-[#4b3be4]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            <p class="text-xs font-medium text-[#4b3be4] dark:text-zinc-100">Uploading...</p>
        </div>

    </label>
    @error($model)
    <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
    @enderror

    <input wire:model="{{$model}}" id="{{$id}}" type="file" class="sr-only"  />
</div>
