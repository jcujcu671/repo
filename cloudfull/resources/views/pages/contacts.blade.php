@extends('layouts.default')

@section('content')

    <div class="container">
        <section class="intro-pages">
            <div class="info-pages">
                <h2 class="title">Our Contacts</h2>
                <p class="text">We will help in any situation</p>
            </div>
            <div class="contacts">
                <div class="block block-contact">
                    <img src="{{asset('images/mail.svg')}}" alt="mail">
                    <div class="list-contact">
                        <h3 class="page-top contact-title">support@cryptostation.cc</h3>
                        <p class="page-bottom contact-text">Our Email contact</p>
                    </div>
                </div>
                <div class="block block-contact">
                    <img src="{{asset('images/telegram.svg')}}" alt="telegram">
                    <div class="list-contact">
                        <h3 class="page-top contact-title">@cryptostation_support</h3>
                        <p class="page-bottom contact-text">Our Telegram contact</p>
                    </div>
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
