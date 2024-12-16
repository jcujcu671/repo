@extends('layouts.default')

@section('content')
    <livewire:dashboard.referral-component />
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>

    <script defer>
        var btns = document.querySelectorAll('button');
        var clipboard = new ClipboardJS(btns);

        clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
        });

        clipboard.on('error', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
        });
    </script>
@endpush
