
<flux:sidebar sticky collapsible="mobile" class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <div class="w-full items-center flex flex-col justify-center">
            <img src="{{asset('assets/images/oauLogo.svg')}}"/>
        <h1 class="font-bold">SUPER ADMIN</h1>
        </div>

        <flux:sidebar.collapse class="lg:hidden" />
    </flux:sidebar.header>

    <flux:sidebar.nav>
        <flux:sidebar.item class="mt-2 data-current:!bg-[#F5F3FF]  data-current:!border-transparent data-current:text-[#7F22FE]" :current="request()->routeIs('admin.dashboard')" icon="home" :href="route('admin.dashboard')">Dashboard</flux:sidebar.item>
        <flux:sidebar.item  class="mt-2  data-current:!bg-[#F5F3FF]  data-current:!border-transparent data-current:text-[#7F22FE]" :current="request()->routeIs('admin.clearance-requests')" :href="route('admin.clearance-requests')"  icon="calendar" badge="12" > Requests</flux:sidebar.item>
        <flux:sidebar.item class="mt-2  data-current:!bg-[#F5F3FF]  data-current:!border-transparent data-current:text-[#7F22FE]" :current="request()->routeIs('admin.officers')"  icon="inbox" :href="route('admin.officers')">Officers</flux:sidebar.item>
        <flux:sidebar.item  class="mt-2  data-current:!bg-[#F5F3FF]  data-current:!border-transparent data-current:text-[#7F22FE]" :current="request()->routeIs('admin.announcements')" :href="route('admin.announcements')" icon="document-text" >Announcements</flux:sidebar.item>
    </flux:sidebar.nav>

    <flux:sidebar.spacer />

    <flux:sidebar.nav>
    </flux:sidebar.nav>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:sidebar.profile avatar="https://fluxui.dev/img/demo/user.png" name="{{strtoupper( user()->full_name)}}" />

        <flux:menu>
            <flux:menu.item icon="cog-6-tooth" href="#">Settings</flux:menu.item>

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
            <h1 class="text-2xl dark:text-zinc-400 ">Super Admin Portal</h1>

        </flux:navbar>
    </flux:header>
    <flux:main>
        {{ $slot }}
    </flux:main>


</div>


