

<div class="space-y-6">
    <div>
        <h3 class="text-2xl dark:text-zinc-100 text-gray-900 mb-2">Library Information</h3>
        <p class="text-gray-600 dark:text-zinc-400 ">Provide your library registration and borrowing status</p>
    </div>

    <div class="bg-gradient-to-br dark:bg-zinc-800 from-blue-50 to-purple-50 rounded-xl p-6 space-y-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-white dark:bg-zinc-800 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-2xl">📚</span>
            </div>
            <div class="flex-1">
                <h4 class="text-lg font-medium dark:text-zinc-100 text-gray-900 mb-2">Registration Status</h4>
                <p class="text-sm text-gray-600 dark:text-zinc-400 mb-4">
                    Have you ever registered with the university library?
                </p>

                <div class="flex items-center gap-4">
                    <button class="relative w-14 h-8 rounded-full transition-colors bg-[#4b3be4]" >
                        <span class="absolute top-1 left-1 w-6 h-6 bg-white dark:bg-zinc-800 rounded-full shadow-md transition-transform" ></span>
                    </button>

                </div>


                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-zinc-100 mb-2">
                        Library Registration Number
                    </label>
                    <flux:input label="Library Registration Number*" placeholder="LIB/121/V3" type="text"  />
                </div>
            </div>
        </div>
        </div>
    </div>
