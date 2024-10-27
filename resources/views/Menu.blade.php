<style>
    /* Hide the cart notification in the navbar-toggler button on larger screens */
    @media only screen and (min-width: 992px) {
        #cart-notification-navbar {
            display: none;
        }
    }

    .badge-rounded-circle {
    width: 20px;
    height: 20px;
    padding: 0; /* Ensures the badge remains a circle */
    border-radius: 50%; /* Makes the badge circular */
    display: flex;
    margin-top:5px; 
    align-items: center;
    justify-content: center;
    font-size: 12px; /* Adjust font size to fit within the small circle */
}

    </style>
    
    <nav class="navbar navbar-expand-lg bg-* text-white ms-2">
        <div class="container-fluid">
            <!-- Brand/Home Link -->
            <a class="navbar-brand fw-bold" href="/" style="color: white;">Home</a>
    
            <!-- Navbar Toggler -->
            <button class="navbar-toggler position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span id="cart-notification-navbar" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success badge-rounded-circle">
                    {{ count(session('cart', [])) }}
                    <span class="visually-hidden">items in cart</span>
                </span>
            </button>
    
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Shop Link -->
                    <li class="nav-item">
                        <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Shop" style="color: rgb(192, 107, 107);">Shop</a>
                    </li>
                    <li class="nav-item">
                        <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                    </li>
                    <!-- Laptops Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="/Shop-Category/Black" style="color: rgb(153, 153, 153);">Black</a>
                    </li>
                    <!-- Gaming PCs Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="/Shop-Category/White" style="color: rgb(153, 153, 153);">White</a>
                    </li>
                    <!-- Conditional Admin Links -->
                    @if(Auth::user())
                        @if(Auth::user()->role === 'ADMIN')
                        <!-- Admin Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(153, 153, 153);">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="/admin/add">Add New Product</a></li>
                                <li><a class="dropdown-item" href="/AdminSpace">Modify Products</a></li>
                                <li><a class="dropdown-item" href="/email">Send Email</a></li>
                                <li><a class="dropdown-item" href="/orderstable">Orders</a></li>
                            </ul>
                        </li>
                        @endif
    
                        <!-- Conditional User Link -->
                        @if(Auth::user()->role === 'USER')
                        <li class="nav-item">
                            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ClientSpace" style="color: rgb(153, 153, 153);">Client</a>
                        </li>
                        @endif
                    @endif
                </ul>
    
                <!-- Right-aligned Links -->
                <ul class="navbar-nav ms-auto">
                    <!-- Conditional Auth Links -->
                    @if(Auth::user())
                        <!-- Logout Form -->
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn mx-auto" style="color: rgb(153, 153, 153);"><img src="{{ asset('svg/login.svg') }}" height="30px" width="30px" alt="Login Logo"></button>
                            </form>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="/cart" style="color: rgb(153, 153, 153);">
                                Cart
                                <!-- Notification number -->
                                <span id="cart-notification" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success badge-rounded-circle">
                                    {{ count(session('cart', [])) }}
                                    <span class="visually-hidden">items in cart</span>
                                </span>
                            </a>
                        </li>
                    @else
                        <!-- Login Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="/login" style="color: rgb(153, 153, 153);">Sign in</a></li>
                        <!-- Register Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="/register" style="color: rgb(153, 153, 153);">Register</a>
                        </li>
                        <li class="nav-item">
                            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="/cart" style="color: rgb(153, 153, 153);">
                                Cart
                                <!-- Notification number -->
                                <span id="cart-notification" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success badge-rounded-circle">
                                    {{ count(session('cart', [])) }}
                                    <span class="visually-hidden">items in cart</span>
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <script>
        // Update cart notification number
        function updateCartNotification() {
            var cartCount = {{ count(session('cart', [])) }};
            document.getElementById('cart-notification').innerText = cartCount;
            document.getElementById('cart-notification-navbar').innerText = cartCount;
        }
    
        // Call updateCartNotification initially
        updateCartNotification();
    
        // Add item to cart
        document.querySelectorAll(".add-to-cart").forEach(function(button) {
            button.addEventListener("click", function() {
                // Your existing add to cart logic
                // After adding, call updateCartNotification();
                updateCartNotification();
            });
        });
    
        // Remove item from cart
        document.querySelectorAll(".remove-from-cart").forEach(function(button) {
            button.addEventListener("click", function() {
                // Your existing remove from cart logic
                // After removing, call updateCartNotification();
                updateCartNotification();
            });
        });
    </script>
    