
<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen">
<x-navbar :logo="'assets/images/oauLogo.svg'" />

<main class="min-h-screen bg-background dark:bg-zinc-800 px-4 sm:px-6 lg:px-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-8 bg-[#F9FAFB] dark:bg-zinc-800 min-h-screen py-5 sm:py-6 items-stretch w-full border-b border-[#EAECF0] transition-all duration-300">

        {{-- Main content --}}
        <div class="lg:col-span-2 flex flex-col gap-5 sm:gap-6 lg:gap-8 min-w-0">

            {{-- Hero image --}}
            <div class="rounded-2xl sm:rounded-[20px] overflow-hidden">
                <img
                    src="{{ asset('assets/images/hero.png') }}"
                    alt="OAU Automated Clearance System"
                    class="block w-full h-auto object-cover rounded-2xl sm:rounded-[20px]"
                >
            </div>

            {{-- Welcome section --}}
            <div class="flex flex-col gap-4 border p-4 sm:p-5 lg:p-6 bg-white border-[#EAECF0] dark:bg-zinc-600/20 dark:border-white/10 rounded-2xl sm:rounded-[20px]">

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 dark:text-zinc-100 leading-tight">
                    Welcome to OAU Automated Clearance System!
                </h1>

                <p class="text-gray-600 text-sm sm:text-base leading-relaxed dark:text-zinc-400">
                    This portal provides a centralized dashboard where you can submit documents, track the approval status of each unit (Library, Bursary, etc.) in real time, and download your final certificate upon completion. No queues.
                </p>

                <p class="text-gray-600 text-sm sm:text-base leading-relaxed dark:text-zinc-400">
                    To get started and access your unique clearance checklist, click the link below. Before accessing the portal, review the essential prerequisites and ensure you have all the required documents ready.
                </p>

            </div>

            {{-- Get Started button --}}
            <a
                href="{{ route('login') }}"
                class="inline-flex items-center justify-center w-full sm:w-max text-center bg-linear-to-r from-[#4B3BE4] to-[#A70088] text-white px-6 py-3.5 rounded-xl hover:opacity-90 transition-opacity duration-200 font-medium"
            >
                Get Started
            </a>
        </div>

        {{-- Criteria sidebar --}}
        <aside class="min-w-0">
            <div class="flex flex-col gap-5 border p-4 sm:p-5 lg:p-6 h-full bg-white dark:bg-zinc-600/20 dark:border-white/10 border-[#EAECF0] rounded-2xl sm:rounded-[20px]">

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-zinc-100">
                        Criteria
                    </h2>

                    <p class="text-red-500 text-sm mt-2 leading-relaxed">
                        For a seamless and automated clearance journey, please provide the following prerequisites.
                    </p>
                </div>

                <div
                    x-data="{
                            criteria: [
                                {
                                    id: '1',
                                    text: 'Digital scans of all necessary documents.'
                                },
                                {
                                    id: '2',
                                    text: 'A high-resolution digital scan of a valid school ID.'
                                },
                                {
                                    id: '3',
                                    text: 'An active university-issued email account for communication.'
                                },
                                {
                                    id: '4',
                                    text: 'An up-to-date and verified phone number in your student profile.'
                                }
                            ]
                        }"
                    class="flex flex-col gap-5 sm:gap-6"
                >
                    <template x-for="criterion in criteria" :key="criterion.id">
                        <div class="flex items-start gap-3 sm:gap-4">

                            <div class="shrink-0 rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-[#F4F4F4] dark:bg-zinc-800">
                                    <span
                                        class="text-lg sm:text-xl text-gray-800 dark:text-zinc-100"
                                        x-text="criterion.id"
                                    ></span>
                            </div>

                            <p
                                class="flex-1 min-w-0 text-sm sm:text-base leading-relaxed text-gray-900 dark:text-zinc-400 pt-1 sm:pt-2"
                                x-text="criterion.text"
                            ></p>

                        </div>
                    </template>
                </div>

            </div>
        </aside>

    </div>
</main>
</body>
</html>

