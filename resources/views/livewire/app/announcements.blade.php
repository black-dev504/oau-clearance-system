<div class="">
    <div class="p-6.5 w-full grid grid-cols-2 rounded-[14px] shadow-xs bg-white dark:bg-zinc-800 dark:border-white/10 border border-[#E0DCD4]">

        <div class="flex-col flex ">
            <h2>Priority level</h2>
            <div>
                <div class="px-4 py-2 bg-gradient-to-r from-primary to-secondary w-fit rounded-[10px]">
                    <h1 class="text-white">All</h1>
                </div>
            </div>
        </div>
        <div>
            <flux:input class="w-full" label="Category" />
        </div>
    </div>

    <div class="flex flex-col gap-2 p-6 mt-8 rounded-[14px] border border-[#FEE685] bg-white dark:bg-zinc-800">
        <x-tag />
        <h1 class="font-bold text-2xl dark:text-zinc-100">System Maintenance Scheduled</h1>
        <p class="text-base text-[#666666] dark:text-zinc-400">Dear Clearance Officers, We wish to inform you that a scheduled system maintenance will take place on April 20, 2026, from 2:00 AM to 6:00 AM (WAT). During this period, the clearance review portal will be temporarily unavailable. We advise all officers to complete any pending reviews before the maintenance window. The </p>
        <div class="border-t border-[#E0DCD4] mt-1 flex justify-between pt-4">
            <div class="bg-gradient-to-r text-white from-primary to-secondary font-bold rounded-full image-fit zoom-in mr-3 h-10 w-10 flex items-center justify-center">
                <span>JD</span>
            </div>

            <div class="flex-1 min-w-0 grid grid-cols-4 gap-6">
                <div>
                    <div class="flex items-center gap-1 ">
                        <div class="font-medium text-[#2D2D2D] text-sm dark:text-zinc-100">John Doe</div>
                    </div>
                    <div class="text-[12px] text-[#666666] dark:text-zinc-400">CSC/2000/1002</div>
                </div>

            </div>

            <div class="justify-end">
                <div class="flex items-center gap-1 ">
                    <div class="font-medium text-[#2D2D2D] text-sm dark:text-zinc-100">April 25, 2026</div>
                </div>
                <div class="text-[12px] text-[#666666] dark:text-zinc-400">7:30am</div>
            </div>
        </div>
    </div>

</div>
