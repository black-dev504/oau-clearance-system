@props([
    'title' => 'System Maintenance Scheduled',
    'description' => 'The clearance system will undergo maintenance on May 25th from 11 PM to 2 AM.',
    'postedDate' => 'May 10, 2026',
    'eventDate' => 'May 18, 2026',
    'priority' => '',
])

<div class=" w-auto flex justify-between">
    <div class="flex gap-6">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 14C0 6.26801 6.26801 0 14 0H30C37.732 0 44 6.26801 44 14V30C44 37.732 37.732 44 30 44H14C6.26801 44 0 37.732 0 30V14Z" fill="#FFE2E2"/>
            <path d="M20.5566 29.5C20.7029 29.7533 20.9133 29.9637 21.1667 30.11C21.42 30.2563 21.7074 30.3333 22 30.3333C22.2925 30.3333 22.5799 30.2563 22.8333 30.11C23.0866 29.9637 23.297 29.7533 23.4433 29.5" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.7182 24.7717C14.6093 24.891 14.5375 25.0394 14.5114 25.1988C14.4853 25.3582 14.5061 25.5217 14.5713 25.6695C14.6365 25.8173 14.7432 25.943 14.8784 26.0312C15.0137 26.1195 15.1717 26.1665 15.3332 26.1667H28.6665C28.828 26.1667 28.9861 26.1198 29.1214 26.0317C29.2568 25.9436 29.3636 25.8181 29.429 25.6704C29.4943 25.5227 29.5153 25.3592 29.4894 25.1998C29.4635 25.0404 29.3919 24.8919 29.2832 24.7725C28.1749 23.63 26.9999 22.4158 26.9999 18.6667C26.9999 17.3406 26.4731 16.0688 25.5354 15.1311C24.5977 14.1934 23.326 13.6667 21.9999 13.6667C20.6738 13.6667 19.402 14.1934 18.4643 15.1311C17.5267 16.0688 16.9999 17.3406 16.9999 18.6667C16.9999 22.4158 15.824 23.63 14.7182 24.7717Z" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <div class="flex flex-col">
            <h3 class="text-lg font-medium text-gray-900 dark:text-zinc-100">{{$title}} <span> {{$priority}}</span></h3>
            <p class="text-sm text-gray-500 dark:text-zinc-400 mt-2">{{$description}}</p>
            <div class="flex gap-4 mt-2">
                                    <span class="text-sm inline-flex items-center gap-2 text-gray-500 dark:text-zinc-400 mt-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.3335 2.66666H2.66683C1.93045 2.66666 1.3335 3.26361 1.3335 3.99999V12C1.3335 12.7364 1.93045 13.3333 2.66683 13.3333H13.3335C14.0699 13.3333 14.6668 12.7364 14.6668 12V3.99999C14.6668 3.26361 14.0699 2.66666 13.3335 2.66666Z" stroke="#6A7282" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.6668 4.66666L8.68683 8.46666C8.48101 8.59561 8.24304 8.664 8.00016 8.664C7.75729 8.664 7.51932 8.59561 7.3135 8.46666L1.3335 4.66666" stroke="#6A7282" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg> Posted on: {{$postedDate}}</span>
                <span class="text-sm text-gray-500 inline-flex items-center gap-2 dark:text-zinc-400 mt-2"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.00016 14.6667C11.6821 14.6667 14.6668 11.6819 14.6668 8.00001C14.6668 4.31811 11.6821 1.33334 8.00016 1.33334C4.31826 1.33334 1.3335 4.31811 1.3335 8.00001C1.3335 11.6819 4.31826 14.6667 8.00016 14.6667Z" stroke="#6A7282" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 4V8L10.6667 9.33333" stroke="#6A7282" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                           Due: {{$eventDate}}</span>
            </div>
        </div>

    </div>

    <div class="flex gap-4">
        <button ><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="#4A5565" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </button>
        <button ><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 4H14" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.6668 4V13.3333C12.6668 14 12.0002 14.6667 11.3335 14.6667H4.66683C4.00016 14.6667 3.3335 14 3.3335 13.3333V4" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.3335 4.00001V2.66668C5.3335 2.00001 6.00016 1.33334 6.66683 1.33334H9.3335C10.0002 1.33334 10.6668 2.00001 10.6668 2.66668V4.00001" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.6665 7.33334V11.3333" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.3335 7.33334V11.3333" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

    </div>


</div>
