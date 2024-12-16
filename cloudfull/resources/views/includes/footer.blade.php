<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <nav class="nav">
                <div class="logo">
                    <a class="logo-img" href="/">
                        <img src="{{asset('images/logo.svg')}}" alt="logo">
                    </a>
                </div>
                <div class="menu">
                    <ul class="menu-list list">
                        <li class="menu-item"><a class="menu-link" href="{{ route('index') }}">Home</a></li>
                        <li class="menu-item"><a class="menu-link" href="#">Statistics</a></li>
                        <li class="menu-item"><a class="menu-link cas" href="{{ route('index') }}#statistics">Affiliate System</a></li>
                        <li class="menu-item nav-item dropdown"><a class="menu-link dropdown-toggle" href="#"
                                                                   id="navbarDarkDropdownMenuLink" role="button"
                                                                   data-bs-toggle="dropdown"
                                                                   aria-expanded="false">Help</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                                <li><a class="dropdown-item" href="{{ route('about') }}">About Us</a></li>
                                <li><a class="dropdown-item" href="{{ route('terms') }}">Terms</a></li>
                                <li><a class="dropdown-item" href="{{ route('index') }}#plans">Plans</a></li>
                                <li><a class="dropdown-item" href="{{ route('contacts') }}">Contacts</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="header-btn menu">
                    <a href="#" class="btn-custom btn-lite" onclick="openModal('login')">Log
                        In</a>
                    <a href="#" class="btn-custom btn-bold" onclick="openModal('register')">Register</a>
                </div>
            </nav>
        </div>
    </div>
</footer>
