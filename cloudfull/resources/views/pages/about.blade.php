@extends('layouts.default')

@section('content')

    <div class="container">
        <section class="intro-pages">
            <div class="info-pages">
                <h2 class="title">About Us</h2>
                <p class="text">History of our project</p>
            </div>
            <div class="about-list">
                <div class="block about-block">
                    <img src="{{asset('images/settings.svg')}}" alt="settings">
                    <h3 class="page-top">Technology</h3>
                    <p class="page-bottom">We provide users with access to the most modern blockchain
                        technologies and algorithms for mining cryptocurrencies in the shortest possible time.</p>
                </div>
                <div class="block about-block">
                    <img src="{{asset('images/scan.svg')}}" alt="scan">
                    <h3 class="page-top">Opening</h3>
                    <p class="page-bottom">Our company was founded by a team of 7 enthusiasts on August 3, 2023, from
                        that moment we began to expand and work to achieve a result of 5% profit per day.</p>
                </div>
                <div class="block about-block">
                    <img src="{{asset('images/document.svg')}}" alt="document">
                    <h3 class="page-top">Our work</h3>
                    <p class="page-bottom">Together with our skilled and experienced team, strategic customers and
                        partnerships we are driving a new standard for the mining ecosystem and data service.</p>
                </div>
                <div class="block about-block">
                    <img src="{{asset('images/mail.svg')}}" alt="mail">
                    <h3 class="page-top">Feedback</h3>
                    <p class="page-bottom">If you still have any questions, you can contact us using the online chat,
                        mail or telegram account. For more information, see the contacts section.</p>
                </div>
                <div class="block about-block">
                    <img src="{{asset('images/star.svg')}}" alt="star">
                    <h3 class="page-top">Quality</h3>
                    <p class="page-bottom">Cloudex aims to provide the private consumer with the world's most
                        advanced mining equipment and service 24/7, with the highest level of service in the field.</p>
                </div>
                <div class="block about-block">
                    <img src="{{asset('images/graph.svg')}}" alt="graph">
                    <h3 class="page-top">Direction</h3>
                    <p class="page-bottom">Cloudex is a high-tech company specializing in the most efficient
                        cryptocurrency mining and investment attraction.</p>
                </div>
            </div>
            <style>
                .about-block {
                    transition: transform 0.3s ease-out;
                }
                .about-block:hover {
                    transform: translateY(-10px);
                }
            </style>
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
