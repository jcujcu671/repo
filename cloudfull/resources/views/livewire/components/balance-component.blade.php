<div>
    <div class="balance__list ">
        @foreach (cache()->get('user_balances_' . auth()->id()) as $currency => $balance)
            <div class="balance__item slide-right">
                <div class="balance__info-list">
                    <img class="balance__img" src="{{ asset('images/' . $currency . '.svg') }}" alt="{{ $currency }}">
                    @php
                        $balanceString = (string) $balance->value;
                        $balanceFloat = (float) $balanceString;
                    @endphp
                    <div class="balance__info">
                        <div class="balance__crypto" id="balance-{{ $currency }}">{{ number_format($balanceFloat, 16) }} {{ strtoupper($currency) }}</div>
                        <div class="balance__ghs">{{ $usedPowers[$currency] }} GH/s</div>
                    </div>
                </div>
                <div class="balance__btn">
                    <button class="btn-custom btn-lite" onclick="openWithdrawalModal('{{ $currency }}')">Withdrawal</button>
                    <button class="btn-custom btn-bold" onclick="openReinvestModal('{{ $currency }}')">Reinvest</button>
                </div>
            </div>
            <style>
    .slide-right {
        transition: transform 0.3s ease;
    }
    .slide-right:hover {
        transform: translateX(10px);
    }
       </style>

        @endforeach
    </div>
</div>

