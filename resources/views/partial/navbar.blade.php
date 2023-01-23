<style>
    .navbar{
    background-color:#321E39;
}
.btn{
    outline-color: green;
}
.judul{
    font-family: serif;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" style=" font-family :serif">{{(auth()->user()->isAdmin==1) && (request()->is('admin')) ? 'Admin':'PacarKita.com'}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="/dashboard"><i class="bi bi-house-fill"></i> Beranda</a>
              </li>
            @if((auth()->user()->isAdmin==1) && (request()->is('admin')))
            </ul>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('wishlist')) ? 'active' : '' }}" href="wishlist"><i class="bi bi-bag-heart-fill"></i> WishList</a>
                </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            @endif
            <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/dashboard/profile"><i class="bi bi-person"></i> Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @if(auth()->user()->isAdmin==1)
                    <li><a class="dropdown-item" href="/admin"><i class="bi bi-gear"></i> Admin</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @endif
                    <li><a class="dropdown-item" href="/aboutUs" class="nav-link"><i class="bi bi-people"></i> About Us</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> login</a>
                </li>
            @endauth
            </ul>
          </div>
        </div>
</nav>
