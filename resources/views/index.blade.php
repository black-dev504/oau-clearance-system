@extends('layouts.student')

@section('title', '0AU Clearance System')

@section('logo', 'assets/images/oauLogo.svg')
@section('navbar-bg', 'bg-white border-b border-white/20')
@section('navbar-text', 'text-white/70')
@section('textColor', 'text-white')

{{-- @section('logo', 'assets/images/logo.svg') --}}

@section('content')
    <div class="grid grid-cols-3 gap-8 justify-between bg-[#F9FAFB] min-h-screen px-4 sm:px-8 lg:px-20 py-4 lg:py-6  items-center w-full border-b-1 border-[#EAECF0] transition-all duration-300 ">
        <div class="col-span-2 flex flex-col gap-8 h-full">
            <div class="rounded-[20px]">
                <img src="{{ asset('assets/images/hero.png') }}" alt="Hero Image" class="w-full h-auto rounded-[20px]">
            </div>

            <div class="flex flex-col gap-4 border p-5 bg-white border-[#EAECF0] rounded-[20px]">
                <h1 class="text-4xl font-bold text-gray-800">Welcome to OAU automated clearance system!</h1>
                <p class="text-gray-600 text-base">This portal is designed to provide a centralized dashboard where you can submit documents, track the approval status of each unit (Library, Bursary, etc.) in real-time, and download your final certificate upon completion. No queues.</p>
                <p class="text-gray-600 text-base">To get started and access your unique clearance checklist, please click the link below. Before you access the portal, take a moment to review the essential prerequisites on the right and ensure you have all needed documents ready.</p>
                <p class="text-gray-600 text-base">To get started and access your unique clearance checklist, please click the link below. Before you access the portal, take a moment to review the essential prerequisites on the right and ensure you have all needed documents ready.</p>

            </div>

            <a href="{{route('login')}}"  class="bg-linear-to-r from-[#4B3BE4] to-[#A70088] text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200 w-max">
                Get Started
            </a>
        </div>
        <div class="h-full">
                <div class="flex flex-col gap-4 border p-5 h-full bg-white border-[#EAECF0] rounded-[20px]">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Criteria</h2>
                        <p class="text-red-500 text-sm">For a seamless and automated clearance journey, please provide the following prerequisites.</p>
                    </div>

                    <div x-data="{
                    criteria: [
                        {
                            id: '1',
                            text: 'Digital Scans of necessary documents (all categories).'
                        },

                         {
                            id: '2',
                            text: 'High resolution digital scan of valid school ID.'
                        },

                         {
                            id: '3',
                            text: 'An active university issued email account for  communication.'
                        },

                         {
                            id: '4',
                            text: 'Up to date and verified phone number in student profile.'
                        },
                     ]
                     }">
                        <template x-for="criterion in criteria" :key="criterion.id" >
                            <div class="flex gap-4 mb-6">
                                <div class="rounded-full w-12 h-12 items-center flex px-4.5 py-3.5 bg-[#F4F4F4]">
                                    <h1 class="text-xl" x-text="criterion.id"></h1>
                                </div>

                                <h1 class="text-gray-900 text-base" x-text="criterion.text"></h1>
                            </div>
                        </template>
                    </div>


                </div>
        </div>
    </div>
@endsection
