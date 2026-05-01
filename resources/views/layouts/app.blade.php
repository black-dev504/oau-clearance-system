<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
<x-layouts.sidebar >
    <flux:main>

        {{ $slot }}
    </flux:main>
</x-layouts.sidebar>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

@fluxScripts
</body>



</html>

<script>

    document.addEventListener('show-toast', (e) => {
        console.log('show toast');
    })

    document.addEventListener('livewire:initialized', () => {
        Livewire.on('show-toast', (data)=>{
            const eventData = Array.isArray(data) ? data[0] ?? null : data;

            console.log(data);

            const icons = {
                success: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00b09b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22,4 12,14.01 9,11.01"></polyline>
            </svg>`,

                error: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff5f6d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>`,

                warning: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f093fb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>`,

                info: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>`
            };


            Toastify({
                text: "This is a toast",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },

            }).showToast();

        })
    })



</script>
