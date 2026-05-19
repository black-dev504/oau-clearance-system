@props([
'title' => ''

]
)

<div class="flex flex-col gap-4 w-full">
    <div class="flex flex-col w-full gap-2">
        <h1 class="font-semibold font-serif text-[20px] dark:text-zinc-100">{{$title}}</h1>
        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
    </div>

    <div class="flex flex-col gap-3">
         {{$slot}}
    </div>
</div>
