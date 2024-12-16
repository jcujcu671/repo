@extends('layouts.default')

@section('content')

    <div class="container">
        <section class="intro-pages">
            <div class="info-pages">
                <h2 class="title">Terms of use</h2>
                <p class="text">Summary of our project rules</p>
            </div>
            <div class="terms-list">
                <div class="block terms-block">
                    <h2 class="page-top" style="margin-bottom: 28px;">Investments</h2>
                    <p class="page-bottom terms-text">
                        The deposit (Investment) is a private agreement between Cloudex and our Member. <br><br>
                        Users process all financial transactions solely at their discretion and at their own risk. The amount of the deposit is decided individually by each user. The deposit lasts for 180 days starting from the day it is opened.<br><br>
                        The income from the investment plan will be credited to the user's account every second.<br><br>
                        To make a deposit, Member can use any of the 6 payment systems accepted by Cloudex.<br><br>
                        Each Member can have only one registered account. Registration by one person, more than one account in the referral structure may result in blocking funds on all linked accounts.<br><br>
                    </p>
                </div>
                <div class="block terms-block">
                    <h2 class="page-top" style="margin-bottom: 28px;">Withdrawals</h2>
                    <p class="page-bottom terms-text">
                        Withdrawals are processed on all days of the year, including weekends and bank holidays.<br><br>
                        The withdrawal of earned funds and the referral commission will be processed immediately after the application has been submitted.<br><br>
                        Withdrawal requests are processed automatically, and the speed of this process depends on the current workload of the blockchain network.<br><br>
                        Cloudex is not responsible for the speed of the blockchain network for individual cryptocurrencies.<br><br>
                        Cloudex cannot reverse or cancel cryptocurrency transfers made to a wrong provided wallet address.<br><br>
                    </p>
                </div>
                <div class="block terms-block">
                    <h2 class="page-top" style="margin-bottom: 28px;">Security</h2>
                    <p class="page-bottom terms-text">
                        Each Member is responsible for the security of his Cloudex account.<br><br>
                        Member should use a strong password consisting of at least 6 characters, containing upper and lower case letters, numbers, or special characters.<br><br>
                        Cloudex ensures the protection and safety of personal data for our investors. We do not share personal information with third parties! Our website is protected against various types of cyberattacks, and all data transmitted is encrypted.<br><br>
                    </p>
                </div>
                <div class="block terms-block">
                    <h2 class="page-top" style="margin-bottom: 28px;">Anti-Spam</h2>
                    <p class="page-bottom terms-text">
                        Spam is commercial e-mail or unsolicited bulk e-mail, including
                        "spam/junk mail", which has not been requested by the recipient.<br><br>
                        It is intrusive and often irrelevant or offensive, and it wastes valuable resources.<br><br>
                        If any law enforcement agency, internet provider, web hosting provider, or other person or
                        entity provide us with notice that you may have engaged in the transmission of unsolicited
                        e-mails or may have engaged in otherwise unlawful conduct or conduct in violation of an internet
                        service provider's terms or any such policies regulations, we will reserve the right to
                        cooperate in any investigation relating to your activities including disclosure of your account
                        information.
                    </p>
                </div>
                <div class="block terms-block">
                    <h2 class="page-top" style="margin-bottom: 28px;">The procedure of amending the present rules</h2>
                    <p class="page-bottom terms-text">
                        Cloudex reserves the right to make changes to the current document.<br><br>
                        Cloudex will inform investors about changes by publishing them in News.<br><br>
                        Terms of Use changes come into force since the date of publishing information.<br><br>
                    </p>
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

<style>
    .terms-block {
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
    }

    .terms-block.animate {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    .terms-block:nth-child(1) { animation: fadeInUp 0.6s ease-out 0.2s forwards; }
    .terms-block:nth-child(2) { animation: fadeInUp 0.6s ease-out 0.4s forwards; }
    .terms-block:nth-child(3) { animation: fadeInUp 0.6s ease-out 0.6s forwards; }
    .terms-block:nth-child(4) { animation: fadeInUp 0.6s ease-out 0.8s forwards; }
    .terms-block:nth-child(5) { animation: fadeInUp 0.6s ease-out 1s forwards; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const blocks = document.querySelectorAll('.terms-block');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, { threshold: 0.1 });

        blocks.forEach(block => {
            observer.observe(block);
        });
    });
</script>
