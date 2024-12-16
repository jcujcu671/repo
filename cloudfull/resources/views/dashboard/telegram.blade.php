<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head_dashboard')
    <title>CloudEx - Cloud mining platform</title>
</head>
<body>
    @include('includes.sidebar')

    <main class="main page-wrapper" id="main">
        <div class="container-dashboard">
            <section class="telegram">
                <div class="dashboard-info">
                    <h2 class="title">Coming soon</h2>
                    <p class="text">Here will be our Telegram Bot :)</p>
                </div>
            </section>
        </div>
    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
</body>
</html>
