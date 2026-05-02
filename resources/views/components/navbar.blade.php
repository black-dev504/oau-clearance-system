@props([
    'logo' => 'assets/images/oauLogo.svg',
    'bgColor' => 'bg-white backdrop-blur-sm shadow-md',
    'user' => '',

])

<header class="px-4 sm:px-8 lg:px-20 py-4 lg:py-6 flex items-center justify-between w-full border-b-1 border-[#EAECF0] transition-all duration-300 {{ $bgColor }}">

    <div class="flex gap-3 items-center">
        <a href="#">
            <img src="{{ asset($logo) }}" alt="logo"
                 class=" w-full h-[24px] lg:h-[58px]">
        </a>

        <div class="flex flex-col">
            <span class="font-heading text-base text-[#6A7282]">Welcome back,</span>
            <span class="text-[16px] font-heading text-[#101828]">{{$user->fullName}}</span>
        </div>
    </div>

    <div class="flex flex-col">
        <span class="font-heading text-base text-[#6A7282]">Student ID</span>
        <span class="text-[16px] font-heading text-[#101828]"></span>
    </div>

</header>
