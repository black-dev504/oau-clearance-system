@props(
[
    'title'=>'Title',
    'reapply' => false
])

<div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between mb-3">
        <h3 class="text-xl text-gray-900">{{$title}}</h3>
        <x-tag />
    </div>
    <p class="text-base text-gray-500">Submitted: April 10, 2026</p>

    @if($reapply)
        <button class="mt-3 w-full bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white py-2 px-4 rounded-lg hover:opacity-90 transition-opacity">
             Reapply
        </button>
    @endif

</div>
