@props([
    'logo' => 'assets/images/oauLogo.svg',
    'bgColor' => 'bg-white backdrop-blur-sm shadow-md',
])

<header
    class="px-4 sm:px-8 lg:px-20 py-4 lg:py-6 flex items-center justify-between w-full border-b-1 border-[#EAECF0] transition-all duration-300 {{ $bgColor }}">



    <a href="#">
        <img src="{{ asset($logo) }}" alt="logo"
             class=" w-full h-[24px] lg:h-[58px]">
    </a>

    <h1 class="text-xl font-bold text-gray-800">
        Welcome Applicants!
    </h1>

</header>
