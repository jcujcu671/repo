<div>
    <input type="hidden" name="currency" value="btc">
    <input type="hidden" name="sum">
    <div class="container-dashboard">
        <section class="calculate-main calculate-dashboard">
            <div class="dashboard-info">
                <h2 class="title">Calculate your profit and deposit</h2>
                <p class="text">Choose the plan that's right for you</p>
            </div>
            <ul class="crypto-list nav-pills" role="tablist">
                <li class="crypto-change" role="presentation" onclick="setCurrency('btc')">
                    <a class="nav-link active" data-bs-toggle="pill" href="#pills-btc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/btc.svg')  }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">BTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation" onclick="setCurrency('eth')">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-eth" role="tab" aria-selected="false">
                        <div class="crypto-item">
                            <img src="{{ asset('images/eth.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">ETH</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation" onclick="setCurrency('bnb')">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-bnb" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/bnb.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">BNB</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation" onclick="setCurrency('ltc')">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-ltc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/ltc.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">LTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation" onclick="setCurrency('trx')">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-trx" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="{{ asset('images/trx.svg') }}" class="crypto-img" alt="product img">
                            <div class="crypto-name">TRX</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation" onclick="setCurrency('doge')">
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
                .crypto-item {
                    transition: box-shadow 0.3s ease-out;
                }
                .crypto-change:hover .crypto-item {
                    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
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
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="btcPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/btc.svg') }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="btcGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{ asset('images/lightning.svg') }}" alt="crypto">
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="ethDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/eth.svg')  }}" alt="crypto">
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
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="ethPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/eth.svg')  }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="ethGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{ asset('images/lightning.svg') }}" alt="crypto">
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="bnbDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/bnb.svg') }}" alt="crypto">
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
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="bnbPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/bnb.svg') }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="bnbGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{ asset('images/lightning.svg') }}" alt="crypto">
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
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
                                               placeholder="0.0$" readonly="">
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
                                        <img src="{{ asset('images/lightning.svg') }}" alt="crypto">
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="trxDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/trx.svg') }}" alt="crypto">
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
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="trxPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/trx.svg') }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="trxGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{ asset('images/lightning.svg')}}" alt="crypto">
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
                                               placeholder="Enter sum" oninput="setAmount(this.value)">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="dogeDollar">0.00</div>
                                        </div>
                                        <img src="{{ asset('images/doge.svg') }}" alt="crypto">
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
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="dogePlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="{{ asset('images/doge.svg') }}" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="dogeGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="{{ asset('images/lightning.svg') }}" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <button type="button" class="white-btn" onclick="openDepositModal()">Deposit</button>
        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Deposit Payments</h2>
                <p class="text">History of all your deposit transactions</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Hash</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="padding-left: unset;">Explorer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty(auth()->user()->payments))
                        @foreach(auth()->user()->payments as $payment)
                            <tr>
                                <td>{{ strtoupper($payment->currency) }}</td>
                                <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->status }}</td>
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

    @if($isOpen)
        <div class="modal-backdrop animate__animated animate__fadeIn" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 1040; animation-duration: 1.5s;"></div>
        <div class="modal show animate__animated animate__fadeInUp" style="display: block; z-index: 1050; animation-duration: 1.5s;" wire:click="closeModal" x-data @click.away="closeModal">
            <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn" style="animation-duration: 1.2s; animation-delay: 0.3s;" @click.stop>
                <div class="modal-content animate__animated animate__fadeIn" style="animation-duration: 1.5s; animation-delay: 0.5s;" @click.stop>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title animate__animated animate__fadeInDown" style="animation-duration: 1s; animation-delay: 0.7s;">
                                <img src="{{ asset('images/download.svg') }}" alt="user">
                                <h1 class="text-left">Deposit</h1>
                                <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                            </div>
                            <form class="animate__animated animate__fadeInUp" style="animation-duration: 1s; animation-delay: 0.9s;">
                                <div class="modal-block-one">
                                    <label class="modal-label">The exact amount of the transfer</label>
                                    <input type="number" class="form-input modal-input active-modal-input" value="{{ $amount }}" readonly>
                                </div>
                                <div class="modal-block-two" style="padding-bottom: 40px;">
                                    <label class="modal-label">{{ strtoupper($currency) }} Pick up address</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input value="{{ $wallet }}" type="text" class="form-hide-icon active-modal-input border-end-0 modal-input" readonly>
                                        <button class="input-group-text bg-transparent btn-all-modal "><i class='bx bx-copy'></i></button>
                                    </div>
                                </div>
                                <button type="button" wire:click="closeModal" class="btn btn-light modal-btn">I transferred money</button>
                            </form>
                            <div class="modal-info animate__animated animate__fadeIn" style="animation-duration: 1s; animation-delay: 1.1s;">Your balance will be replenished after the first confirmation in the blockchain</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translate3d(0, 30px, 0);
                }
                to {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes zoomIn {
                from {
                    opacity: 0;
                    transform: scale3d(0.3, 0.3, 0.3);
                }
                50% {
                    opacity: 1;
                }
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translate3d(0, -30px, 0);
                }
                to {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            }

            .animate__animated {
                animation-fill-mode: both;
            }

            .animate__fadeIn {
                animation-name: fadeIn;
            }

            .animate__fadeInUp {
                animation-name: fadeInUp;
            }

            .animate__zoomIn {
                animation-name: zoomIn;
            }

            .animate__fadeInDown {
                animation-name: fadeInDown;
            }
        </style>
    @endif

</div>
