{{--@props['']--}}
<div>
<div
    class="block bg-white intro-y overflow-auto  dark:bg-zinc-800 dark:border-white/10 border border-gray-100 rounded-2xl mt-8 shadow-sm dark:shadow-none">
    <div class="px-8 py-6 border-b dark:border-white/10 border-gray-100">
        {{$options}}
    </div>

    <table class=" w-full">
        <thead class="bg-[#F3F4F6] text-[#6A7282] px-6 py-3 w-full">
        <tr>
            {{$header}}
        </tr>
        </thead>


        <tbody class="divide-y divide-gray-200">
            {{$slot}}

        </tbody>
    </table>


</div>
    {{$pagination}}

</div>
