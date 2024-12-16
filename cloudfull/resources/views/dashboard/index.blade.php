@extends('layouts.default')

@section('content')
    <livewire:dashboard.dashboard-component />
@endsection

@push('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setInterval(() => {
                Livewire.dispatch('refreshBalances');
            }, 1000);
        });

        function openWithdrawalModal(currency) {
            Livewire.dispatch(`open-withdrawal-modal`, [currency]);
        }

        function openReinvestModal(currency) {
            Livewire.dispatch(`open-reinvest-modal`, [currency]);
        }
    </script>

@endpush
