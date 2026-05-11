@props(['clearance'])

<div class="bg-white dark:bg-zinc-600/20 dark:border-white/10 border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between mb-3">
        <h3 class="text-xl text-gray-900 dark:text-zinc-100">{{$clearance?->unit?->name}}</h3>
        <x-tag :status="$clearance->status->label()" :classes="$clearance->status->classes()"  />
    </div>
    <p class="text-base text-gray-500 dark:text-zinc-400">Submitted: {{ $clearance->created_at->diffForHumans()}}</p>

    @if($clearance->status->label() === 'Rejected')
        <button
            wire:click="openModal('view-rejection-reason'); $wire.set('rejection_reason', '{{$clearance->remark}}')"
             class="mt-3 w-full bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white py-2 px-4 rounded-lg hover:opacity-90 transition-opacity">
             View Reason
        </button>
    @endif

</div>


