<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<x-navbar :logo="'assets/images/oauLogo.svg'" :user="$user"/>

<main class="min-h-screen bg-background dark:bg-zinc-800 px-4 sm:px-8 lg:px-20 ">
    {{ $slot }}
</main>

@fluxScripts
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



<script>

    document.addEventListener('livewire:init', () => {
        Livewire.on('notification', (data) => {
            const eventData = Array.isArray(data) ? data[0] : data;

            if (!eventData) return;

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

            const selectedIcon = icons[eventData.type] ?? icons.info;
            const message = eventData?.message ?? 'Something happened';

            const display = `
            <div style="display: flex; align-items: center; gap: 10px; line-height: 1.4;">
                <div style="flex-shrink: 0;">${selectedIcon}</div>
                <div style="flex: 1;">${message}</div>
            </div>
        `;



            Toastify({
                text: display,
                duration: 4000,
                escapeMarkup: false,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    borderRadius: "8px",
                    fontSize: "14px",
                    fontWeight: "500",
                    background:'#4B3BE4',
                    padding: "12px 16px",
                },
            }).showToast();

        })
    })


</script>

</body>
</html>
