<div>
    @if($isOpen)
        <div class="modal-backdrop animate__animated animate__fadeIn" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 1040; animation-duration: 1s;"></div>
        <div class="modal show animate__animated animate__fadeInUp" style="display: block; z-index: 1050; animation-duration: 1s;" wire:click="closeModal" x-data @click.away="closeModal">
            <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn" style="animation-duration: 1.2s; animation-delay: 0.3s;" @click.stop>
                <div class="modal-content animate__animated animate__fadeIn" style="animation-duration: 1.5s; animation-delay: 0.5s;" @click.stop>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title animate__animated animate__fadeInDown" style="animation-duration: 1s; animation-delay: 0.7s;">
                                <img src="{{ asset('images/user.svg') }}" alt="user">
                                <h1 class="text-left">Log In</h1>
                                <button type="button" class="btn-close btn-close-white" aria-label="Close" wire:click="closeModal"></button>
                            </div>
                            <form wire:submit.prevent="login" class="animate__animated animate__fadeInUp" style="animation-duration: 1s; animation-delay: 0.9s;">
                                <div class="modal-block-one">
                                    <label class="modal-label">Email address</label>
                                    <input type="email" wire:model="email" class="form-input modal-input">
                                    @error('email')
                                        <div class="mt-3" role="alert">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="modal-block-two">
                                    <label class="modal-label">Enter Password</label>
                                    <div class="input-group" id="show_hide_password" x-data="{ showPassword: false }">
                                        <input wire:model="password" x-bind:type="showPassword ? 'text' : 'password'" class="form-hide-icon border-end-0 password modal-input">
                                        <a class="input-group-text bg-transparent" x-on:click="showPassword = !showPassword">
                                            <i x-bind:class="showPassword ? 'bx bx-hide eye-icon' : 'bx bx-show eye-icon'"></i>
                                        </a>
                                    </div>
                                    @error('password')
                                        <div class="mt-3" role="alert">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="linkreset">
                                    <a class="respass" href="#" wire:click="openForgotPasswordModal">Forgot Password?</a>
                                </div>
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-light modal-btn">Log In</button>
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

