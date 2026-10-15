<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        @wirekitStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <x-wirekit::container>
            {{-- Sidebar --}}
            <x-wirekit::sidebar style="width: 16rem;">
                <x-wirekit::sidebar.item href="#" :active="true">Home</x-wirekit::sidebar.item>
                <x-wirekit::sidebar.collapsible :active="true" label="Perencanaan Kinerja dan Anggaran" :open="true">
                    <x-slot:icon>
                        <x-wirekit::icon name="building" />
                    </x-slot:icon>
                    <x-wirekit::sidebar.collapsible label="PERENCANAAN KINERJA " :open="true">
                        <x-wirekit::sidebar.item href="#">Renstra</x-wirekit::sidebar.item>
                        <x-wirekit::sidebar.item href="#">RKT</x-wirekit::sidebar.item>
                        <x-wirekit::sidebar.item href="#">PK-RAPK</x-wirekit::sidebar.item>
                        <x-wirekit::sidebar.item href="#">IKU</x-wirekit::sidebar.item>
                    </x-wirekit::sidebar.collapsible>
                    <x-wirekit::sidebar.item href="#">Kinerja Individu (SKP) </x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">DIPA</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">RKA-KL</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Plan Of Action (POA)</x-wirekit::sidebar.item>
                </x-wirekit::sidebar.collapsible>
                <x-wirekit::sidebar.collapsible label="Monev & Pelaporan Tim Kerja">
                    <x-slot:icon>
                        <x-wirekit::icon name="chart-bar" />
                    </x-slot:icon>
                    <x-wirekit::sidebar.item href="#">General</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Security</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Billing</x-wirekit::sidebar.item>
                </x-wirekit::sidebar.collapsible>
                <x-wirekit::sidebar.collapsible label="Keuangan">
                    <x-slot:icon>
                        <x-wirekit::icon name="percent" />
                    </x-slot:icon>
                    <x-wirekit::sidebar.item href="#">General</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Security</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Billing</x-wirekit::sidebar.item>
                </x-wirekit::sidebar.collapsible>
                <x-wirekit::sidebar.collapsible label="BMN & Persediaan">
                    <x-slot:icon>
                        <x-wirekit::icon name="package" />
                    </x-slot:icon>
                    <x-wirekit::sidebar.item href="#">General</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Security</x-wirekit::sidebar.item>
                    <x-wirekit::sidebar.item href="#">Billing</x-wirekit::sidebar.item>
                </x-wirekit::sidebar.collapsible>
                <x-wirekit::sidebar.item href="#">Inovasi Pendukung Pencapaian IKU</x-wirekit::sidebar.item>
                <x-wirekit::sidebar.item href="#">Kompetensi SDM</x-wirekit::sidebar.item>
                <x-wirekit::sidebar.item href="#">JEPA Awards</x-wirekit::sidebar.item>
                <x-wirekit::sidebar.item href="#">Arsip Lainnya</x-wirekit::sidebar.item>
                <x-wirekit::sidebar.item href="#">FAQ</x-wirekit::sidebar.item>
            </x-wirekit::sidebar>
            {{-- End Sidebar --}}
        </x-wirekit::container>

        {{-- <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platform')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                    {{ __('Documentation') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar> --}}

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
        @wirekitScripts
    </body>
</html>
