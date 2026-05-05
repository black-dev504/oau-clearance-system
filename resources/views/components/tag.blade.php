@props(['status' => '', 'classes'=>[
    'bg' => '',
    'dot' => '',
    'text' => ''
]])

<div class="inline-flex w-fit items-center px-3 py-1 rounded-full {{$classes['bg']}}">
    <div class="w-2 h-2 rounded-full {{$classes['dot']}}"></div>
    <div class="ml-2 text-sm font-medium {{$classes['text']}}">
        {{$status}}
    </div>

</div>
