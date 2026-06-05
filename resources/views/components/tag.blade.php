@props(['status' => '', 'classes'=>[
    'bg' => '',
    'dot' => '',
    'text' => ''
]])

<div class="inline-flex w-fit items-center px-3 py-0.5 rounded-full {{$classes['bg']}}">
    <div class="w-2 h-2 rounded-full {{$classes['dot']}}"></div>
    <div class="ml-2 text-[12px] font-medium {{$classes['text']}}">
        {{Str::title($status)}}
    </div>

</div>
