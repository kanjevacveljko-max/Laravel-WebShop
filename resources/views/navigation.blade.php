<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">YourShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>

                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>

                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ADMIN
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route("product.add")}}">Add Product</a></li>
                        <li><a class="dropdown-item" href="{{route("product.all")}}">All Products</a></li>
                        <li><a class="dropdown-item" href="{{route("contact.all")}}">All Contacts</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

            </ul>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>

        </div>
    </div>
</nav>
