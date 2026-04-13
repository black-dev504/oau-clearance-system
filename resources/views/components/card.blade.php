@props(
[
    'title' => 'Pending Requests',
    'value' => '4,210',
    'icon' => '',
]
)


<div {{$attributes->merge(["class" => "relative w-full flex flex-col bg-white border border-gray-200 border-l-4  rounded-xl shadow-sm p-6"])}} >
    <div class="flex justify-between items-start">

        <div>
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">
                {{$title}}
            </h3>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{$value}}
            </p>
        </div>

          {{$slot}}

    </div>

    <div class="mt-4 flex items-center text-sm">
        <span class="flex items-center font-medium text-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
            12%
        </span>
        <span class="ml-2 text-gray-500">vs last month</span>
    </div>
</div>
