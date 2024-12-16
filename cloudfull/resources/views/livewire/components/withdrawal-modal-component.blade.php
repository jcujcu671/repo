<div>
    @if($isOpen)
        <div class="modal-backdrop animate__animated animate__fadeIn" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 1040; animation-duration: 0.5s;"></div>
        <div class="modal show animate__animated animate__fadeInUp" style="display: block; z-index: 1050; animation-duration: 0.5s;" wire:click="closeModal" x-data @click.away="closeModal">
            <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn" style="animation-duration: 0.4s; animation-delay: 0.1s;" @click.stop>
                <div class="modal-content animate__animated animate__fadeIn" style="animation-duration: 0.5s; animation-delay: 0.2s;" @click.stop>
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title animate__animated animate__fadeInDown" style="animation-duration: 0.4s; animation-delay: 0.3s;">
                                <img src="{{ asset('images/upload.svg') }}" alt="user">
                                <h1 class="text-left">Withdrawal</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close" wire:click="closeModal"></button>
                            </div>
                            <form class="animate__animated animate__fadeInUp" style="animation-duration: 0.4s; animation-delay: 0.3s;">
                                <div class="modal-block-one">
                                    <label class="modal-label">Available balance</label>
                                    <input type="number" class="form-input modal-input active-modal-input" value="{{ number_format((float) $balance, 16) }}" readonly>
                                </div>
                                <div class="modal-block-two" style="padding-bottom: 40px;">
                                    <label class="modal-label">Enter sum to withdrawal</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="number" wire:model="amount" class="form-hide-icon border-end-0 modal-input">
                                        <button type="button" wire:click="withdrawalAll" class="input-group-text bg-transparent btn-all-modal">ALL</button>
                                    </div>
                                    @error('amount')
                                    <div class="mt-3" role="alert">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="modal-block-three">
                                    <label class="modal-label">Enter your {{ strtoupper($currency) }} Address</label>
                                    <input type="text" wire:model="address" class="form-input modal-input">
                                    @error('address')
                                    <div class="mt-3" role="alert">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-light modal-btn" wire:click="withdraw('{{ $currency }}')">Withdrawal</button>
                            </form>
                            <div class="modal-info animate__animated animate__fadeIn" style="animation-duration: 0.4s; animation-delay: 0.4s;">When withdrawing from your remaining balance will be deducted 0.0002 {{ strtoupper($currency) }}
                                as a transaction processing fee. The minimum withdrawal amount is 0.015 {{ strtoupper($currency) }}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
   <style>
@keyframes fadeIn {
    from { 
        opacity: 0;
    }
    to { 
        opacity: 1;
    }
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
        transform: scale3d(0.5, 0.5, 0.5);
    }
    to {
        opacity: 1;
        transform: scale3d(1, 1, 1);
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
    animation-timing-function: ease-out;
}

.animate__fadeIn {
    animation-name: fadeIn;
}

.animate__fadeInUp {
    animation-name: fadeInUp; 
}

.animate__fadeInDown {
    animation-name: fadeInDown;
}

.animate__zoomIn {
    animation-name: zoomIn;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Remove random animations for smoother, more consistent experience
    document.querySelectorAll('.animate__animated').forEach(element => {
        if (!element.classList.contains('animate__fadeIn') && 
            !element.classList.contains('animate__fadeInUp') &&
            !element.classList.contains('animate__fadeInDown') &&
            !element.classList.contains('animate__zoomIn')) {
            element.classList.add('animate__fadeIn');
        }
    });
});
</script>

    @endif
</div>
