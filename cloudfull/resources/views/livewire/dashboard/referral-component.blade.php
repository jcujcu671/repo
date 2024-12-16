<div>
    <div class="container-dashboard">
        <section class="referal">
            <div class="dashboard-info">
                <h2 class="title">Referral program</h2>
                <p class="text">Get rewarded for your referrals</p>
            </div>
            <div class="power">
                <div class="power__list referal__list">
                    <div class="power__item">
                        <div class="power__label">Level 1 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ auth()->user()->referrals()->where('level', 1)->count() }} People" readonly>
                            <img src="{{ asset('images/userfill.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Level 2 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ auth()->user()->referrals()->where('level', 2)->count() }} People" readonly>
                            <img src="{{ asset('images/userfill.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Level 3 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ auth()->user()->referrals()->where('level', 3)->count() }} People" readonly>
                            <img src="{{ asset('images/userfill.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="link-referral">
                <div class="link-referral__block">
                    <div class="link-referral__title">Your unique affiliate link</div>
                    <div class="lite-info">Use this link to invite new members and earn cryptocurrency.</div>
                </div>
                <div class="input-group" id="show_hide_password">
                    <input id="foo" type="text" value="{{ route('index', ['ref' => auth()->id()]) }}" class="form-hide-icon border-end-0 modal-input" readonly>
                    <button data-clipboard-target="#foo" class="input-group-text bg-transparent btn-all-modal"><i class='bx bx-copy'></i></button>
                </div>
            </div>

        </section>
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
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Affiilate Deposits</h2>
                <p class="text">History of all your referrals deposit transactions</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Deposit</th>
                        <th scope="col">Commission</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($affiliateDeposits))
                        @foreach($affiliateDeposits as $deposit)
                            <tr>
                                <td>{{ $deposit['system'] }}</td>
                                <td>{{ date('Y-m-d H:i:s', strtotime($deposit['created_at'])) }}</td>
                                <td>{{ $deposit['deposit'] }}</td>
                                <td>{{ $deposit['commission'] }}%</td>
                                <td>{{ $deposit['bonus'] }}</td>
                                <td>{{ $deposit['comment'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No data available</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
