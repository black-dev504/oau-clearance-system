<div class="">
    <div class="grid grid-cols-2 ">

        <div class="w-full flex flex-col p-25 items-center  justify-center space-y-6 bg-white  shadow-md">
            <a href="#">
                <img src="{{ asset('assets/images/oauLogo.svg') }}" alt="logo"
                     class=" w-50 h-50 ">
            </a>

            <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

            <form wire:submit="login" class="flex w-full flex-col gap-6">
                <!-- Email Address -->
                <flux:input
                    wire:model="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <!-- Password -->
                <div class="relative">
                    <flux:input
                        wire:model="password"
                        :label="__('Password')"
                        type="password"
                        required
                        autocomplete="current-password"
                        :placeholder="__('Password')"
                        viewable
                    />

{{--                    @if (Route::has('password.request'))--}}
{{--                        <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </flux:link>--}}
{{--                    @endif--}}
                </div>

                <!-- Remember Me -->
                <flux:checkbox wire:model="remember" :label="__('Remember me')" />

                <a href="{{route('student.dashboard')}}"  class=" w-full bg-linear-to-r text-center from-[#4B3BE4] to-[#A70088] text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 ">
                    Login
                </a>

            </form>
        </div>

        <div class="w-full h-screen flex items-center justify-center">
                <img src="{{ asset('assets/images/student-login.png') }}" alt="Login Illustration"
                class="object-cover overflow-hidden w-full h-full ">
        </div>
    </div>
</div>
