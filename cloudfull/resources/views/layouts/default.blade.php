<!DOCTYPE html>
<html lang="en">
<head>
    @if(auth()->check())
        @include('includes.head_dashboard')
    @else
        @include('includes.head_home')
    @endif
        <title>CloudEx - Cloud mining platform</title>
</head>
<body>

@if(auth()->check())
    @include('includes.sidebar')
@else
    @include('includes.header')
@endif

<main class="main page-wrapper" id="main">
    @yield('content')
</main>

@if(!auth()->check())
    @include('includes.footer')
@endif

@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

<script src="{{ asset('js/dashboard.js') }}"></script>

<script>

    function openModal(modal) {
        Livewire.dispatch(`auth.${modal}-modal-open`, ['openModal']);
    }

    function closeModal(modal) {
        Livewire.dispatch(`auth.${modal}-modal-close`, ['closeModal']);
    }

    function logout() {
        Livewire.dispatch('logout');
    }

</script>

@stack('scripts')

</body>
</html>
