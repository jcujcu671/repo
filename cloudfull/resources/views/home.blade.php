@extends('layouts.default')

@section('content')
    <div class="container">
        <section class="intro">
            <div class="intro-promo">Get more than 5% yield per day</div>
            <h1 class="intro-title">Cloud mining platform for BTC, ETH, BNB, LTC, TRX, DOGE</h1>
            <p class="intro-sub">Invest in the latest mining technology</p>
            <a href="#" onclick="openModal('login')" class="start-btn">Start Mining Now</a>
        </section>
        <section class="best">
            <div class="block best-block">
                <img class="best-img" src="{{ asset('images/graph.svg') }}" alt="graph">
                <h3 class="best-title">High Income</h3>
                <p class="best-text">Get daily income of up to 5% and withdraw or reinvest</p>
            </div>
            <div class="block best-block">
                <img class="best-img" src="{{ asset('images/blocks.svg') }}" alt="blocks">
                <h3 class="best-title">3-level Affilate</h3>
                <p class="best-text">Get to 12% + 2 GH/s for referral and earn even more</p>
            </div>
            <div class="block best-block">
                <img class="best-img" src="{{ asset('images/rocket.svg') }}" alt="rocket">
                <h3 class="best-title">Random Bonuses</h3>
                <p class="best-text">Get nice bonuses every 6 hours to upgrade your farm</p>
            </div>
            <style>
                .best-block {
                    transition: transform 0.3s ease-in-out;
                }
                .best-block:hover {
                    transform: translateY(-10px);
                }
            </style>
        </section>
        <section class="plans" id="plans">
            <div class="info">
                <h2 class="title">Flexible system of investment plans</h2>
                <p class="text">Profitability also depends on the size of the deposit</p>
            </div>
            <div class="plans-bonus">
                <div class="plans-bonus-block">
                    <div class="price">FREE</div>
                    <div class="price-qulity">2.0</div>
                    <div class="day">% PER DAY</div>
                </div>
                <div class="plans-bonus-block">
                    <div class="price">$1+</div>
                    <div class="price-qulity">3.0</div>
                    <div class="day">% PER DAY</div>
                </div>
                <div class="plans-bonus-block">
                    <div class="price">$25+</div>
                    <div class="price-qulity">3.5</div>
                    <div class="day">% PER DAY</div>
                </div>
                <div class="plans-bonus-block">
                    <div class="price">$250+</div>
                    <div class="price-qulity">4.0</div>
                    <div class="day">% PER DAY</div>
                </div>
                <div class="plans-bonus-block">
                    <div class="price">$750+</div>
                    <div class="price-qulity">4.5</div>
                    <div class="day">% PER DAY</div>
                </div>
                <div class="plans-bonus-block">
                    <div class="price">$3000+</div>
                    <div class="price-qulity">5.0</div>
                    <div class="day">% PER DAY</div>
                </div>
            </div>
        </section>
        <section class="calculate-main">
            <div class="info">
                <h2 class="title">Calculate your profit</h2>
                <p class="text">Choose the plan that's right for you</p>
            </div>
            <ul class="crypto-list nav-pills" role="tablist">
                <li class="crypto-change" role="presentation">
                    <a class="nav-link active" data-bs-toggle="pill" href="#pills-btc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/btc.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">BTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-eth" role="tab" aria-selected="false">
                        <div class="crypto-item">
                            <img src="{{ asset('images/eth.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">ETH</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-bnb" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/bnb.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">BNB</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-ltc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/ltc.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">LTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-trx" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/trx.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">TRX</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-doge" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/doge.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">DOGE</div>
                        </div>
                    </a>
                </li>
            </ul>
            <style>
                .crypto-change {
                    transition: transform 0.3s ease-out;
                }
                .crypto-change:hover {
                    transform: translateY(-10px);
                }
            </style>
            @php
                $currencyRates = cache()->get('currency_rates');
            @endphp
            <div class="tab-content">
                <div class="tab-pane fade active show" id="pills-btc" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="btcRate" value="{{ getCurrencyRate('btc_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter BTC amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="btcInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="btcDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/btc.svg') }}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="btcPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="btcProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="btcPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{asset('images/btc.svg')}}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="btcGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-eth" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="ethRate" value="{{ getCurrencyRate('eth_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter ETH amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="ethInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="ethDollar">0.00</div>
                                        </div>
                                        <img src="{{asset('images/eth.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="ethPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="ethProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="ethPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{asset('images/eth.svg')}}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="ethGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-bnb" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="bnbRate" value="{{ getCurrencyRate('bnb_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter BNB amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="bnbInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="bnbDollar">0.00</div>
                                        </div>
                                        <img src="{{asset('images/bnb.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="bnbPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="bnbProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="bnbPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{asset('images/bnb.svg')}}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="bnbGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-ltc" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="ltcRate" value="{{ getCurrencyRate('ltc_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter LTC amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="ltcInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="ltcDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/ltc.svg') }}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="ltcPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="ltcProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="ltcPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/ltc.svg') }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="ltcGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-trx" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="trxRate" value="{{ getCurrencyRate('trx_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter TRX amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="trxInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="trxDollar">0.00</div>
                                        </div>
                                        <img src="{{asset('images/trx.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="trxPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="trxProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="trxPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{asset('images/trx.svg')}}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="trxGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-doge" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="dogeRate" value="{{ getCurrencyRate('doge_usd') }}">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter DOGE amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="dogeInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="dogeDollar">0.00</div>
                                        </div>
                                        <img src="{{asset('images/doge.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="dogePeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="dogeProfit"
                                               placeholder="0.00" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="dogePlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{asset('images/doge.svg')}}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="dogeGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{asset('images/lightning.svg')}}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <section class="statistics" id="statistics">
        <div class="statistics__inner">
            <div class="statistics-block">
                <div class="status-qlt">120</div>
                <div class="status-text">DAYS IN WORK</div>
            </div>
            <div class="statistics-block">
                <div class="status-qlt">85K</div>
                <div class="status-text">OUR USERS</div>
            </div>
            <div class="statistics-block">
                <div class="status-qlt">$51M</div>
                <div class="status-text">MONEY INVESTED</div>
            </div>
            <div class="statistics-block">
                <div class="status-qlt">$67M</div>
                <div class="status-text">MONEY PAID OUT</div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="transactions">
            <div class="info">
                <h2 class="title">Check our paid outs and deposits</h2>
                <p class="text">We do not hide the conclusions of our service from customers</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Hash</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="padding-left: unset;">Explorer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($payments))
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ strtolower($payment->currency) }}</td>
                                <td>{{ $payment->created_at->format('Y.m.d H:i:s') }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ !empty($payment->payment_details->txid) ? substr($payment->payment_details->txid, 0, 24) . '...' : 'No data'}}</td>
                                <td>{{ $payment->payment_type }}</td>
                                <td class="explorer"><a href="#">Explorer</a></td>
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

    @if(!auth()->check())
        <livewire:auth.login-modal-component />
        <livewire:auth.register-modal-component />
        <livewire:auth.forgot-password-modal-component />
        <livewire:auth.password-reset-modal-component />
    @endif
@endsection

@push('scripts')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/calculator.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('loggedIn', () => {
                location.reload();
            });
        });
    </script>
@endpush
