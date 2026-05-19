

<div class="space-y-6" x-data="{'libraryRegistration': true}">
    <div>
        <h3 class="text-2xl dark:text-zinc-100 text-gray-900 mb-2">Library Information</h3>
        <p class="text-gray-600 dark:text-zinc-400 ">Provide your library registration and borrowing status</p>
    </div>

    <div class=" border border-gray-200 dark:border-white/10 dark:bg-zinc-600/20 bg-purple-50 rounded-xl p-6 space-y-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-white dark:bg-zinc-800 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-2xl">📚</span>
            </div>
            <div class="flex-1 flex-col gap-4">

                <div>
                    <h4 class="text-lg font-medium dark:text-zinc-100 text-gray-900 mb-2">Registration Status</h4>
                    <p class="text-sm text-gray-600 dark:text-zinc-400 mb-4">
                        Have you ever registered with the university library?
                    </p>
                </div>

                <flux:field variant="">
                    <flux:switch @click="libraryRegistration = !libraryRegistration" checked="libraryRegistration"  label="Registered" align="left"/>
                    <flux:error name="status"/>
                </flux:field>

                <div x-show="libraryRegistration">
                    <div class="my-4">
{{--                        <label class="block text-sm font-medium text-gray-700  dark:text-zinc-100 mb-2">--}}
{{--                            Library Registration Number--}}
{{--                        </label>--}}
                        <flux:input label=" Library Registration Number" wire:model="info.library_reg_number" placeholder="LIB/121/V3" type="text"  />
                    </div>

                    <x-upload name="Library card" label="Library Identification Card"  :preview="$this->libraryCardPreview" model="info.library_card"/>
                </div>

                <div x-show="!libraryRegistration" class="mt-4">

                    <x-upload name="Payment Receipt" label="Registration Fee Receipt" :preview="$this->libraryReceiptPreview" model="info.library_receipt"/>
                </div>

            </div>
        </div>
        </div>
    </div>
