<div>
    <div class="container-dashboard">
        <section class="bonuses">
            <div class="dashboard-info">
                <h2 class="title">Get bonuses</h2>
                <p class="text">Increase your power with a couple of clicks</p>
            </div>
            <div class="bonuses__list">
                <div class="bonuses__wrapper">
                    <div class="bonuses__block">
                        <div class="bonuses__info">
                            <div class="bonuses__title">Random bonus</div>
                            <div class="bonuses__text">Get a random bonus from 1 to 5 GH/s</div>
                        </div>
                        @if($bonusLevel === 1)
                            @if($remainingTime)
                            <button class="bonuses__btn" onclick="Swal.fire({
                                    icon: 'error',
                                    iconHtml: '<div style=\'width: 80px; height: 80px; border-radius: 50%; background-color: #f27474; display: flex; align-items: center; justify-content: center; margin: 0 auto;\'><img style=\'width: 50px; height: 50px; object-fit: contain;\' src=\'https://cdn1.iconfinder.com/data/icons/financing-2/91/Finance_SME_Start_Up_Out_Line_53-1024.png\' alt=\'Timer icon\'></div>',
                                    html: 'Bonus already received, please come back later<br><span id=\'remaining-time\'>{{ $remainingTime }}</span>',
                                    background: '#111827E6',
                                    backdrop: '#000000CC',
                                    customClass: {
                                        popup: 'premium-modal',
                                        title: 'premium-title',
                                        content: 'premium-content'
                                    },
                                    showClass: {
                                        popup: 'animate__animated animate__fadeIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOut'
                                    },
                                    color: '#FFFFFF',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                })">Get Bonus <span id="remaining-time">{{ $remainingTime }}</span></button>
                            @else
                                <button class="bonuses__btn bonuses__btn-active" wire:poll.1000ms wire:click="openModal">Get Bonus</button>
                            @endif
                        @else
                            <button class="bonuses__btn">Unavailable</button>
                        @endif
                    </div>
                    <div class="bonuses__block">
                        <div class="bonuses__info">
                            <div class="bonuses__title">Random bonus for investors</div>
                            <div class="bonuses__text">Get a random bonus from 3 to 15 GH/s</div>
                        </div>
                        @if($bonusLevel === 2)
                            @if($remainingTime)
                            <button class="bonuses__btn" onclick="Swal.fire({
                                    icon: 'error',
                                    iconHtml: '<div style=\'width: 80px; height: 80px; border-radius: 50%; background-color: #f27474; display: flex; align-items: center; justify-content: center; margin: 0 auto;\'><span style=\'font-size: 50px;\'>⏳</span></div>',
                                    html: 'Bonus already received, please come back later<br><span id=\'remaining-time\'>{{ $remainingTime }}</span>',
                                    background: '#111827E6',
                                    backdrop: '#000000CC',
                                    customClass: {
                                        popup: 'premium-modal',
                                        title: 'premium-title',
                                        content: 'premium-content'
                                    },
                                    showClass: {
                                        popup: 'animate__animated animate__fadeIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOut'
                                    },
                                    color: '#FFFFFF',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                })">Get Bonus <span id="remaining-time">{{ $remainingTime }}</span></button>
                            @else
                                <button class="bonuses__btn bonuses__btn-active" wire:poll.1000ms wire:click="openModal">Get Bonus</button>
                            @endif
                        @else
                        <button class="bonuses__btn" onclick="Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'to receive the bonus, your deposit amount must be greater than $25.',
                                background: '#111827E6',
                                backdrop: '#000000CC',
                                customClass: {
                                    popup: 'premium-modal',
                                    title: 'premium-title',
                                    content: 'premium-content'
                                },
                                showClass: {
                                    popup: 'animate__animated animate__fadeIn'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOut'
                                },
                                color: '#FFFFFF',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            })">Unavailable</button>
                        @endif
                    </div>
                    <div class="bonuses__block">
                        <div class="bonuses__info">
                            <div class="bonuses__title">Random bonus for partners</div>
                            <div class="bonuses__text">Get a random bonus from 5 to 30 GH/s</div>
                        </div>
                        @if($bonusLevel === 3)
                            @if($remainingTime)
                                <button class="bonuses__btn" onclick="Swal.fire({
                                    icon: 'error',
                                    iconHtml: '<div style=\'width: 80px; height: 80px; border-radius: 50%; background-color: #f27474; display: flex; align-items: center; justify-content: center; margin: 0 auto;\'><span style=\'font-size: 50px;\'>⏳</span></div>',
                                    html: 'Bonus already received, please come back later<br><span id=\'remaining-time\'>{{ $remainingTime }}</span>',
                                    background: '#111827E6',
                                    backdrop: '#000000CC',
                                    customClass: {
                                        popup: 'premium-modal',
                                        title: 'premium-title',
                                        content: 'premium-content'
                                    },
                                    showClass: {
                                        popup: 'animate__animated animate__fadeIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOut'
                                    },
                                    color: '#FFFFFF',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                })">Get Bonus <span id="remaining-time">{{ $remainingTime }}</span></button>
                            @else
                                <button class="bonuses__btn bonuses__btn-active" wire:poll.1000ms wire:click="openModal">Get Bonus</button>
                            @endif
                        @else
                        <button class="bonuses__btn" onclick="Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'to receive the bonus, your 10 referrals must each make a deposit of more than $25.',
                                background: '#111827E6',
                                backdrop: '#000000CC',
                                customClass: {
                                    popup: 'premium-modal',
                                    title: 'premium-title',
                                    content: 'premium-content'
                                },
                                showClass: {
                                    popup: 'animate__animated animate__fadeIn'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOut'
                                },
                                color: '#FFFFFF',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            })">Unavailable</button>
                        @endif
                    </div>
                </div>
                <div class="bonuses__block">
                    <div class="bonuses__info">
                        <div class="bonuses__title">YouTube review campaign</div>
                        <div class="bonuses__text">
                            You must have at least 100 subscribers.<br><br>
                            Somewhere in the title, use the word cloudex.site<br><br>
                            Your review must be original. it is forbidden to copy content, text, visual effects, etc.
                            from other reviews in any format.<br><br>
                            We may reject your review for various reasons: poor video/audio quality, plagiarism, fake
                            audience activity, etc.<br><br>
                            We will take into account such key points as the duration, the number of views, likes and
                            comments, as well as the quality of video and sound to pay the reward.<br><br>
                            The video must contain a HUMAN voice. Videos without your voice will not be accepted.<br><br>
                            Repeat the process as many times as you want to earn referral commission.<br><br>
                            ONLY 1 SUBMISSION ALLOWED FOR THIS TASK PER MONTH.<br><br>
                            Maximum of 1 account on Cloudex for each user.
                        </div>
                    </div>
                    <a href="https://t.me/cloudex_official">
                        <div class="bonuses__link hover-effect">
                            <img src="{{ asset('images/send.svg') }}" alt="send">
                            <div>@cloudex_official</div>
                        </div>
                    </a>
                </div>
            </div>
            <style>
                .hover-effect {
                    transition: all 0.3s ease;
                }
                .hover-effect:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                }
            </style>
        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">All Bonuses</h2>
                <p class="text">History of all your received bonuses</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Power</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($userBonuses))
                        @foreach($userBonuses as $bonus)
                            <tr>
                                <td>{{ $bonus->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>Random bonus</td>
                                <td>{{ $bonus->value }} GH/s</td>
                                <td>Random bonus</td>
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
        <div class="modal show animate__animated animate__fadeInUp" style="display: block; z-index: 1050; animation-duration: 1.5s;">
            <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn" style="animation-duration: 1.2s; animation-delay: 0.3s;">
                <div class="modal-content animate__animated animate__fadeIn" style="animation-duration: 1.5s; animation-delay: 0.5s;">
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title animate__animated animate__fadeInDown" style="animation-duration: 1s; animation-delay: 0.7s;">
                                <img src="{{ asset('images/play.svg') }}" alt="user">
                                <h1 class="text-left" id="bonus-text">You received {{ $amount }} GH/s</h1>
                                <button type="button" class="btn-close btn-close-white"
                                        wire:click="closeModal"></button>
                            </div>
                            <form class="animate__animated animate__fadeInUp" style="animation-duration: 1s; animation-delay: 0.9s;">
                                <div class="modal-info-alert"
                                     style="font-size: 24px; opacity: 0.6; padding: 32px 0 42px; max-width: 580px;">Your
                                    bonus has already been credited to the power balance. Come back in 6 hours
                                </div>
                                <button type="button" class="btn btn-light modal-btn" wire:click="closeModal">Thank
                                    you
                                </button>
                            </form>
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
