@props(
    ['title'=> 'Clearance Request']
)

<div class="mt-8">
    <h1 class="text-gray-900 text-3xl font-semibold mb-6">{{$title}}</h1>
    <div class="flex justify-between items-center w-full">
        <x-search />
        <div class="flex gap-2">
            <x-export />
            <x-sort />
        </div>
    </div>

<div class=" table-report table-report--tabulator mt-6">
    <div class="intro-y overflow-auto border border-gray-200 shadow-sm dark:border-white/10 rounded-md">
        <table class="table w-full table-report">
            <thead >
            <tr class="bg-slate-50 dark:bg-zinc-700 border-b border-gray-200 dark:border-white/10 text-sm text-black">
                <th class="whitespace-nowrap dark:text-white text-black">
                    <div class="flex text-[#42526D] text-[#42526D]  items-center py-4 pl-7.5 space-x-1.5">
                        Student name
                    </div>
                </th>
                <th class="whitespace-nowrap dark:text-white text-black">
                    <div class="flex text-[#42526D]  items-center space-x-1.5">
                        Department
                    </div>
                </th>
                <th class="whitespace-nowrap dark:text-white text-black">
                    <div class="flex  text-[#42526D] items-center space-x-1.5">
                    Submission Date
                    </div>
                </th>
                <th class="text-center whitespace-nowrap dark:text-white text-black">
                    <div class="flex text-[#42526D]  items-center space-x-1.5">
                        Level
                    </div>
                </th>

                <th class="text-center whitespace-nowrap dark:text-white text-black">
                    <div class="flex text-[#42526D]  items-center space-x-1.5">
                        Status
                    </div>
                </th>

                <th class="text-center whitespace-nowrap dark:text-white text-black">
                    <div class="flex text-[#42526D]  items-center space-x-1.5">
                        Action
                        <div class="ml-1"></div>
                    </div>
                </th>
            </tr>
                  </thead>
            <tbody>
            <tr class="intro-x text- text-black border-gray-200  py-4 dark:text-white border-b dark:border-white/10">
                <td class="w-auto py-4 pl-7.5">
                    <div class="flex text items-center space-x-3">

                        <a  href="#"
                            target="_blank"
                            class="uppercase text-gray-900 dark:text-zinc-400 text-[18px] font-medium hover:underline hover:text-primary-600">
                            Name
                        </a>
                    </div>
                </td>
                <td class="w-auto">
                  CSC
                </td>
                <td class="w-auto">
                    DD-MM-YYYY
                </td>
                <td class="w-auton text-primary">
                    500
                </td>
                <td class="w-auto text-sm">

                  <x-tag />
                </td>
                <td class="w-auto">

                     <flux:button class="px-4 py-2 bg-gradient-to-r from-primary to-secondary !text-white !rounded-full ">
                        <x-icons.eye />
                        View Request
                    </flux:button>


                </td>
            </tr>
            <tr class="intro-x text- text-black border-gray-200  py-4 dark:text-white border-b dark:border-white/10">
                <td class="w-auto py-4 pl-7.5">
                    <div class="flex text items-center space-x-3">

                        <a  href="#"
                            target="_blank"
                            class="uppercase text-gray-900 dark:text-zinc-400 text-[18px] font-medium hover:underline hover:text-primary-600">
                            Name
                        </a>
                    </div>
                </td>
                <td class="w-auto">
                    CSC
                </td>
                <td class="w-auto">
                    DD-MM-YYYY
                </td>
                <td class="w-auton text-primary">
                    500
                </td>
                <td class="w-auto text-sm">

                    <x-tag />
                </td>
                <td class="w-auto">

                      <flux:button class="px-4 py-2 bg-gradient-to-r from-primary to-secondary !text-white !rounded-full ">
                        <x-icons.eye />
                        View Request
                    </flux:button>


                </td>
            </tr>
            <tr class="intro-x text- text-black border-gray-200  py-4 dark:text-white border-b dark:border-white/10">
                <td class="w-auto py-4 pl-7.5">
                    <div class="flex text items-center space-x-3">

                        <a  href="#"
                            target="_blank"
                            class="uppercase text-gray-900 dark:text-zinc-400 text-[18px] font-medium hover:underline hover:text-primary-600">
                            Name
                        </a>
                    </div>
                </td>
                <td class="w-auto">
                    CSC
                </td>
                <td class="w-auto">
                    DD-MM-YYYY
                </td>
                <td class="w-auton text-primary">
                    500
                </td>
                <td class="w-auto text-sm">

                    <x-tag />
                </td>
                <td class="w-auto">

                      <flux:button class="px-4 py-2 bg-gradient-to-r from-primary to-secondary !text-white !rounded-full ">
                        <x-icons.eye />
                        View Request
                    </flux:button>


                </td>
            </tr>
            <tr class="intro-x text- text-black border-gray-200  py-4 dark:text-white border-b dark:border-white/10">
                <td class="w-auto py-4 pl-7.5">
                    <div class="flex text items-center space-x-3">

                        <a  href="#"
                            target="_blank"
                            class="uppercase text-gray-900 dark:text-zinc-400 text-[18px] font-medium hover:underline hover:text-primary-600">
                            Name
                        </a>
                    </div>
                </td>
                <td class="w-auto">
                    CSC
                </td>
                <td class="w-auto">
                    DD-MM-YYYY
                </td>
                <td class="w-auton text-primary">
                    500
                </td>
                <td class="w-auto text-sm">

                    <x-tag />
                </td>
                <td class="w-auto">

                    <flux:button class="px-4 py-2 bg-gradient-to-r from-primary to-secondary !text-white !rounded-full ">
                        <x-icons.eye />
                        View Request
                    </flux:button>

                </td>
            </tr>

            </tbody>
        </table>

{{--          TODO: PAGINATION--}}

    </div>
</div>

</div>
