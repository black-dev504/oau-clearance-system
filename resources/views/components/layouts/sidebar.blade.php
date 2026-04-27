@php
    $unit = request()->segment(1);
@endphp



<body class="min-h-screen bg-background flex dark:bg-zinc-800 antialiased">
<flux:sidebar sticky collapsible="mobile" class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <flux:sidebar.brand
            href="#"
            logo="assets/images/oauLogo.svg"
            logo:dark="assets/images/oauLogo.svg"
            class="text-lg font-bold text-gray-800 dark:text-gray-200"
            :name="config('units.' . $unit . '.short')"
        />

        <flux:sidebar.collapse class="lg:hidden" />
    </flux:sidebar.header>


    <flux:sidebar.nav>
        <flux:sidebar.item class="mt-2 data-current:!bg-linear-to-r from-primary to-secondary data-current:!border-transparent data-current:text-white" :current="request()->routeIs($unit . '.dashboard')" icon="home" :href="route($unit . '.dashboard')">Dashboard</flux:sidebar.item>
        <flux:sidebar.item  class="mt-2 data-current:!bg-linear-to-r from-primary to-secondary data-current:!border-transparent data-current:text-white" :current="request()->routeIs($unit . '.pending')"  icon="calendar" badge="12" :href="route($unit .'.pending')">Pending Requests</flux:sidebar.item>
        <flux:sidebar.item  class="mt-2 data-current:!bg-linear-to-r from-primary to-secondary data-current:!border-transparent data-current:text-white" :current="request()->routeIs($unit . '.announcements')" icon="document-text" :href="route($unit .'.announcements')">Announcements</flux:sidebar.item>
        <flux:sidebar.item class="mt-2 data-current:!bg-linear-to-r from-primary to-secondary data-current:!border-transparent data-current:text-white" :current="request()->routeIs($unit . '.emails')"  icon="inbox" :href="route($unit .'.emails')">Emails</flux:sidebar.item>
    </flux:sidebar.nav>

    <flux:sidebar.spacer />

    <flux:sidebar.nav>
        <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
        <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
    </flux:sidebar.nav>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:sidebar.profile avatar="https://fluxui.dev/img/demo/user.png" name="{{strtoupper( user()->full_name)}}" />

        <flux:menu>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <flux:menu.item class="w-full inline-flex" as="button" type="submit" icon="arrow-right-start-on-rectangle"> Log out</flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>

<div class="w-full">
<flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:navbar class="lg:hidden w-full">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="start">
            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:navbar>

    <flux:navbar >
       <h1 class="text-2xl ">{{ config('units.' . $unit . '.heading') }}</h1>

    </flux:navbar>
</flux:header>

{{ $slot }}

</div>


@fluxScripts
</body>
