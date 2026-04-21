
<flux:modal name="student-contact"  class="min-w-2xl rounded-2xl !p-0">

    <div class="w-full  rounded-t-2xl p-6 flex bg-gradient-to-r from-[#2D2855] to-secondary">
        <div class="flex gap-3 items-center" >
            <div class="flex w-12 h-12 items-center justify-center rounded-full border-2 border-white/30 bg-white/20">
                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.00011 4L8.89011 9.26C9.21877 9.47928 9.60501 9.5963 10.0001 9.5963C10.3952 9.5963 10.7814 9.47928 11.1101 9.26L19.0001 4M3.00011 15H17.0001C17.5305 15 18.0392 14.7893 18.4143 14.4142C18.7894 14.0391 19.0001 13.5304 19.0001 13V3C19.0001 2.46957 18.7894 1.96086 18.4143 1.58579C18.0392 1.21071 17.5305 1 17.0001 1H3.00011C2.46967 1 1.96097 1.21071 1.58589 1.58579C1.21082 1.96086 1.00011 2.46957 1.00011 3V13C1.00011 13.5304 1.21082 14.0391 1.58589 14.4142C1.96097 14.7893 2.46967 15 3.00011 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold text-[20px] text-white">Contact Information</h1>
                <p class="text-[14px] text-white/70">John Doe</p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 gap-4 flex w-full">
        <div class="w-full flex flex-col gap-4">

            <div class="w-full">
                <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 mb-1">
                    <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.666737 2.66675L5.92674 6.17342C6.14584 6.3196 6.40334 6.39761 6.66674 6.39761C6.93013 6.39761 7.18763 6.3196 7.40674 6.17342L12.6667 2.66675M2.00007 10.0001H11.3334C11.687 10.0001 12.0262 9.85961 12.2762 9.60956C12.5263 9.35951 12.6667 9.02037 12.6667 8.66675V2.00008C12.6667 1.64646 12.5263 1.30732 12.2762 1.05727C12.0262 0.807224 11.687 0.666748 11.3334 0.666748H2.00007C1.64645 0.666748 1.30731 0.807224 1.05726 1.05727C0.807212 1.30732 0.666737 1.64646 0.666737 2.00008V8.66675C0.666737 9.02037 0.807212 9.35951 1.05726 9.60956C1.30731 9.85961 1.64645 10.0001 2.00007 10.0001Z" stroke="#4B3BE4" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Email Address
                </label>

                <div class="relative">
                    <flux:input
                        class="w-full"
                        placeholder="adebayo.oluwaseun@university.edu"
                    />
                </div>
            </div>

            <div class="w-full">
                <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 mb-1">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 3.33333C2 2.97971 2.14048 2.64057 2.39052 2.39052C2.64057 2.14048 2.97971 2 3.33333 2H5.52C5.65986 2.00011 5.79615 2.0442 5.90957 2.12603C6.02299 2.20787 6.1078 2.3233 6.152 2.456L7.15067 5.45133C7.20127 5.60356 7.19528 5.76893 7.13381 5.9171C7.07234 6.06527 6.9595 6.1863 6.816 6.258L5.31133 7.01133C6.04888 8.64369 7.35631 9.95112 8.98867 10.6887L9.742 9.184C9.8137 9.0405 9.93473 8.92766 10.0829 8.86619C10.2311 8.80472 10.3964 8.79873 10.5487 8.84933L13.544 9.848C13.6768 9.89223 13.7923 9.97714 13.8742 10.0907C13.956 10.2043 14 10.3407 14 10.4807V12.6667C14 13.0203 13.8595 13.3594 13.6095 13.6095C13.3594 13.8595 13.0203 14 12.6667 14H12C6.47733 14 2 9.52267 2 4V3.33333Z" stroke="#4B3BE4" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    Phone Number
                </label>

                <div class="relative">
                    <flux:input
                        class="w-full"
                        placeholder="+234 803 456 7890"
                    />
                </div>
            </div>

            <div class="w-full">
                <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 mb-1">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.7713 11.1047L8.94267 13.9334C8.81896 14.0572 8.67206 14.1554 8.51037 14.2225C8.34868 14.2895 8.17537 14.324 8.00033 14.324C7.8253 14.324 7.65199 14.2895 7.49029 14.2225C7.3286 14.1554 7.1817 14.0572 7.058 13.9334L4.22867 11.1047C3.48281 10.3588 2.97489 9.40852 2.76912 8.37396C2.56336 7.3394 2.66899 6.26706 3.07267 5.29254C3.47634 4.31801 4.15993 3.48508 5.03699 2.89905C5.91404 2.31303 6.94518 2.00024 8 2.00024C9.05482 2.00024 10.086 2.31303 10.963 2.89905C11.8401 3.48508 12.5237 4.31801 12.9273 5.29254C13.331 6.26706 13.4366 7.3394 13.2309 8.37396C13.0251 9.40852 12.5172 10.3588 11.7713 11.1047Z" stroke="#4B3BE4" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 7.33325C10 7.86369 9.78929 8.37239 9.41421 8.74747C9.03914 9.12254 8.53043 9.33325 8 9.33325C7.46957 9.33325 6.96086 9.12254 6.58579 8.74747C6.21071 8.37239 6 7.86369 6 7.33325C6 6.80282 6.21071 6.29411 6.58579 5.91904C6.96086 5.54397 7.46957 5.33325 8 5.33325C8.53043 5.33325 9.03914 5.54397 9.41421 5.91904C9.78929 6.29411 10 6.80282 10 7.33325Z" stroke="#4B3BE4" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    Contact Address
                </label>

                <div class="relative">
                    <flux:input
                        class="w-full"
                        placeholder="adebayo.oluwaseun@university.edu"
                    />
                </div>
            </div>


        </div>
    </div>

</flux:modal>
