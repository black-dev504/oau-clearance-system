@props(
[
    'title'=>'Title'
])

<div class=" w-full flex flex-col gap-3 rounded-[20px] bg-background border border-primary-border p-5">
    <h2 class="font-semibold text-2xl">{{$title}}</h2>
    <x-tag />
</div>
