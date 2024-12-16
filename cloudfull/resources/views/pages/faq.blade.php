@extends('layouts.default')

@section('content')

    <div class="container">
        <section class="intro-pages">
            <div class="info-pages">
                <h2 class="title">Frequently asked questions</h2>
                <p class="text">Answer to your all questions
                </p>
            </div>


            <div class="accordion-main">
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item1">
                        <h3>How to register?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item1">
                        <p>
                            Open the registration form and complete the required fields. Enter your email address and create a password.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item2">
                        <h3>How can I get a registration bonus?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item2">
                        <p>
                            To receive a bonus, please complete the registration process and we will automatically credit the bonus to your account.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item3">
                        <h3>How much can I earn using Cloudex?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item3">
                        <p>
                            Every day, you can earn between 2% and 5% of your deposit amount, plus referral bonuses.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item4">
                        <h3>Which cryptocurrency do you support?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item4">
                        <p>
                            We accept Binance Coin, Tron, Dogecoin, Litecoin, Ethereum and Bitcoin.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item5">
                        <h3>How to choose a coin?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item5">
                        <p>
                            You don't need to choose between any options. You can start mining all available coins immediately after registering.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item6">
                        <h3>How to activate mining to make it profitable?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item6">
                        <p>
                            You need to log in to your account and select the amount of power you want to use for mining one or more cryptocurrencies that are available on our platform.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item7">
                        <h3>How to make a deposit and buy power?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item7">
                        <p>
                            To purchase mining power, please navigate to the "Deposit" section of your personal account. Select the desired currency and enter the amount you wish to deposit. The profit calculator will assist you in calculating the earnings from your deposit over a specified period and also display the number of GH/s that will be added to your account upon successful deposit. After selecting the "Deposit" option, transfer the required amount of cryptocurrency to the designated crypto wallet. Then, click the "I Transferred Funds" button and allow up to 15 minutes for the deposit to credit your account. If the deposit fails to credit within the first 15 minutes after transferring the funds to the correct wallet address, please contact our support team in the bottom right corner of the interface.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item8">
                        <h3>What is the minimum deposit amount?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item8">
                        <p>
                            The minimum deposit amount is 10 GH/s or $0.25
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item9">
                        <h3>How does reinvestment work?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item9">
                        <p>
                            You can always reinvest your cryptocurrency earnings on our website to make a significant profit in the future. To do so, please click on the "Reinvest" button in your personal account under the "Dashboard" tab and enter the amount you wish to reinvest.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item10">
                        <h3>What is the minimum amount that can be reinvested?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item10">
                        <p>
                            The minimum amount for reinvestment is 1 GH/s or $0.025
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item11">
                        <h3>How much power will I get from the invited people?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item11">
                        <p>
                            Our project has a three-tiered referral program that rewards you with up to 12% commission on the deposits of users you refer. In addition, for each new user who signs up using your referral link, you'll earn 2 GH/s in rewards.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item12">
                        <h3>How can I become a member of the affiliate program?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item12">
                        <p>
                            In your personal account, you will find your referral link. Please distribute it in all the ways available to you and invite others. New users who sign up using your link will automatically become your referrals. From any account deposits they make, you will earn a commission.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item13">
                        <h3>What is a random bonus?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item13">
                        <p>
                            In our project, we offer several random bonuses every day for our valued customers. These bonuses can be found in your personal account under the "Bonuses" section. The first bonus is available to all users of our project and ranges from 1 GH/s to 5 GH/s every 6 hours. This bonus is intended to reward users for their loyalty and continued use of our platform. If your deposit amount is greater than $25, you may qualify for the second bonus, which ranges from 3 GH/s to 15 GH/s every 24 hours. This additional bonus is designed to encourage users to make larger deposits and continue using our services. Finally, if you have referred 10 or more users with deposits of $25 or more, you may be eligible for the third bonus. This bonus ranges from 5 GH/s to 30 GH/s and is awarded every 24 hours to recognize your efforts in helping others join us on our platform.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item14">
                        <h3>How can I withdraw funds?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item14">
                        <p>
                            To withdraw funds, please click on the "Withdrawal" button located in the "Dashboard" section of your personal account. After that, please enter the number of coins you wish to withdraw and the address of your cryptocurrency wallet. The transaction will be processed immediately and the funds will be transferred to your wallet.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item15">
                        <h3>What is the minimum withdrawal amount?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item15">
                        <p>
                            The minimum withdrawal amount for each cryptocurrency is $6.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item16">
                        <h3>Is there any fee for depositing funds into or withdrawing profits from the account?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item16">
                        <p>
                            No, we do not charge any fees for depositing funds or withdrawing profits. Our project operates on a commission-free basis.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item17">
                        <h3>What should I do if I forget my password?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item17">
                        <p>
                            Open the password recovery form and enter your current email address. You will then receive an email containing a link to help you reset your password.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item18">
                        <h3>Can I have confidence in the security of my data?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item18">
                        <p>
                            Yes, the company ensures the protection and safety of personal data for our investors. We do not share personal information with third parties! Our website is protected against various types of cyberattacks, and all data transmitted is encrypted.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item19">
                        <h3>Can I create multiple accounts?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item19">
                        <p>
                            No, accounts created by the same user will be automatically identified and blocked without further explanation.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item20">
                        <h3>In what situations might my account be blocked?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item20">
                        <p>
                            Cloudex takes a serious approach to protecting the personal data of its users and the security of its platform. Any attempts to gather personal information from users, hacking the site's code, unfair use of the affiliate program, accessing user accounts through hacking, or using third-party services to artificially inflate the number of partners may result in suspension of a user's account. Additionally, any insults directed towards the administration of the site or its users are not tolerated.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item21">
                        <h3>How soon can I withdraw my funds without investing?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item21">
                        <p>
                            If you don't deposit the bill, it will take you about 60 days to accumulate the minimum amount necessary to withdraw funds.
                        </p>
                    </div>
                </div>
                <div class="accordion-block">
                    <div class="accordion-title" data-tab="item22">
                        <h3>If your question is not listed, what should you do?<i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <div class="accordion-content" id="item22">
                        <p>
                            If your question is not listed, you can contact our 24/7 technical support team in the lower right corner of the screen.
                        </p>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" charset="utf-8"></script>

    <script src="{{asset('js/hideinput.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".accordion-title").click(function (e) {
                var accordionitem = $(this).attr("data-tab");
                $("#" + accordionitem).slideToggle();

                $(this).toggleClass("active-title");
                $("i.fa-chevron-down", this).toggleClass("chevron-top");
            });
        });
    </script>



@endpush
