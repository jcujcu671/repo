@extends('layouts.default')

@section('content')

    <div class="container">
    <style>
       .affilate-block {
            transition: transform 0.3s ease-out;
        }
        .affilate-block:hover {
            transform: translateY(-10px);
        } 
    </style>
        <section class="intro-pages">
            <div class="info-pages" style="max-width: 1012px; margin: 0 auto">
                <h2 class="title">Affiliate Program</h2>
                <p class="text">The profit received from the purchase of power by your referral will be credited to the balance of the coin in which the purchase of power was made. You can always use the "Reinvest" button and exchange coins to GH/s power.
                </p>
            </div>
            <div class="affilate-list">
                <div class="block about-block affilate-block">
                    <h2 class="page-top level">SECOND LEVEL</h2>
                    <h3 class="procent">3%</h3>
                    <p class="page-bottom">of the referral's deposit amount</p>
                </div>
                <div class="block about-block affilate-block">
                    <h2 class="page-top level">FIRST LEVEL</h2>
                    <h3 class="procent">12%</h3>
                    <p class="page-bottom">of referral's deposit amount & +2 GH/s user registration</p>
                </div>
                <div class="block about-block affilate-block">
                    <h2 class="page-top level">THIRD LEVEL</h2>
                    <h3 class="procent">1%</h3>
                    <p class="page-bottom">of the referral's deposit amount</p>
                </div>
            </div>
        </section>
    </div>



    @if(!auth()->check())
        <livewire:auth.login-modal-component />
        <livewire:auth.register-modal-component />
    @endif
@endsection

@push('scripts')

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

@endpush
