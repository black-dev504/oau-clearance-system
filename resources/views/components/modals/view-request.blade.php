<flux:modal name="view-request"  class="min-w-5xl rounded-2xl !p-0">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-[#2D2855] to-secondary">
        <div class="flex gap-3 items-center" >
            <div class="flex w-20 h-20 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
               <h1 class="font-bold text-white">A</h1>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">John Doe<span class="ml-1"> <x-tag /></span></h1>
                <p class="text-[14px] text-white/70">Submitted on  <span>April 15, 2026</span></p>

            </div>
        </div>
    </div>


    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full grid lg:grid-cols-2 gap-8">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px]">Academic Details</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <flux:input label="MATRIC NUMBER" value="CSC/200/100"  />
                        <flux:input label="COURSE OF STUDY" value="Computer Science"  />
                        <flux:input label="DEPARTMENT" value="Computer Science and Engineering"/>
                        <flux:input label="FACULTY" value="Technology" />
                        <flux:input label="YEAR OF GRADUATION" value="2026" />
                    </div>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px]">Library Details</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <flux:input label="MATRIC NUMBER" value="CSC/200/100"  />
                        <flux:input label="COURSE OF STUDY" value="Computer Science"  />
                        <flux:input label="DEPARTMENT" value="Computer Science and Engineering"/>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col gap-4 w-full">
                    <div class="flex flex-col w-full gap-2">
                        <h1 class="font-semibold font-serif text-[20px]">Uploaded Documents</h1>
                        <div class="w-full h-[2px] bg-gradient-to-r from-primary to-secondary"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <x-view-image label="means of identification" />
                        <x-view-image label="DSA payment receipt" />

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200 px-8 py-6 bg-gray-50 flex-shrink-0">
        <div class="flex items-center flex-row-reverse gap-4">

            <flux:modal.trigger name="confirm-submission">
                <button
                    class="px-6 py-3 bg-gradient-to-r from-[#4b3be4] to-[#a70088] text-white rounded-lg">
                    Approve Application
                </button>
            </flux:modal.trigger>

            <flux:modal.trigger name="rejection-confirmation">

                <button
                    class="px-6 py-3 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                    Reject Application
                </button>
            </flux:modal.trigger>



        </div>
    </div>
</flux:modal>
