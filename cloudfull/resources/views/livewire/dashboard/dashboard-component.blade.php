<div>
    <div class="container-dashboard">
        <section class="mining-crypto">
            <div class="dashboard-info">
                <h2 class="title">Manage your mining processes</h2>
                <p class="text">Distribute power between cryptocurrencies, invest and withdraw money</p>
            </div>
            <div class="mining">
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/btc.svg') }}" alt="btc">
                        <div class="mining-text">BTC</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='fa mining-icon'></i>
                        <input class="number-mining-btn" type="text" wire:model="usedPowers.btc" wire:change="allocatePowers($event.target.value, 'btc')">
                        <button class="mining-btn" wire:click="incrementPower('btc')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('btc')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('btc')">ALL</button>
                    </div>
                </div>
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/eth.svg') }}" alt="eth">
                        <div class="mining-text">ETH</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='mining-icon'></i>
                        <input class="number-mining-btn" type="text" wire:model="usedPowers.eth" wire:change="allocatePowers($event.target.value, 'eth')">
                        <button class="mining-btn" wire:click="incrementPower('eth')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('eth')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('eth')">ALL</button>
                    </div>
                </div>
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/bnb.svg') }}" alt="bnb">
                        <div class="mining-text">BNB</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='mining-icon'></i>
                        <input class="number-mining-btn" type="text" wire:model="usedPowers.bnb" wire:change="allocatePowers($event.target.value, 'bnb')">
                        <button class="mining-btn" wire:click="incrementPower('bnb')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('bnb')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('bnb')">ALL</button>
                    </div>
                </div>
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/ltc.svg') }}" alt="ltc">
                        <div class="mining-text">LTC</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='mining-icon'></i>
                        <input class="number-mining-btn" type="text" wire:model="usedPowers.ltc" wire:change="allocatePowers($event.target.value, 'ltc')">
                        <button class="mining-btn" wire:click="incrementPower('ltc')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('ltc')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('ltc')">ALL</button>
                    </div>
                </div>
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/trx.svg') }}" alt="trx">
                        <div class="mining-text">TRX</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='mining-icon'></i><input class="number-mining-btn" type="text" wire:model="usedPowers.trx" wire:change="allocatePowers($event.target.value, 'trx')">
                        <button class="mining-btn" wire:click="incrementPower('trx')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('trx')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('trx')">ALL</button>
                    </div>
                </div>
                <div class="mining-card">
                    <div class="mining-title">
                        <img src="{{ asset('images/doge.svg') }}" alt="doge">
                        <div class="mining-text">DOGE</div>
                    </div>
                    <div class="mining-buttons">
                        <i class='mining-icon'></i><input class="number-mining-btn" type="text" wire:model="usedPowers.doge" wire:change="allocatePowers($event.target.value, 'doge')">
                        <button class="mining-btn" wire:click="incrementPower('doge')"><i class='bx bx-chevron-up'></i></button>
                        <button class="mining-btn" wire:click="decrementPower('doge')"><i class='bx bx-chevron-down'></i></button>
                        <button class="mining-btn" wire:click="allocateAllPowers('doge')">ALL</button>
                    </div>
                </div>
            </div>
            <div class="power">
                <div class="power__list">
                    <div class="power__item">
                        <div class="power__label">Total Power</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ $totalPowersCount }} GH/s" readonly>
                            <img src="{{ asset('images/lightning.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Unused Power</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ $unusedPowersCount }} GH/s" readonly>
                            <img src="{{ asset('images/lightning.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Active Plan</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{ auth()->user()->getActivePlan() }}%"
                                   readonly>
                            <img src="{{ asset('images/plan.svg') }}" alt="plan">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="balance">
            <div class="dashboard-info">
                <h2 class="title">Your balances</h2>
                <p class="text">Reinvest or withdraw funds</p>
            </div>

            <livewire:components.balance-component/>

        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Your payments</h2>
                <p class="text">History of all your transactions</p>
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

    <livewire:components.withdrawal-modal-component/>
    <livewire:components.reinvest-modal-component/>
</div>
