@extends('layouts.default')

@section('content')
    <livewire:dashboard.deposit-component />
@endsection

@push('scripts')

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/calculator.js') }}"></script>

    <script>

        function setCurrency(currency) {
            let currencyInput = document.querySelector('input[name="currency"]');

            currencyInput.value = currency;
        }

        function setAmount(sum) {
            let sumInput = document.querySelector('input[name="sum"]');

            sumInput.value = sum;
        }

        function openDepositModal() {
            let amount = document.querySelector('input[name=\'sum\']').value;
            let currency = document.querySelector('input[name=\'currency\']').value;


            Livewire.dispatch('openDepositModal', [amount, currency]);
        }

    </script>

@endpush
