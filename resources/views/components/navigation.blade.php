<div class="col-sm-3">
    <!-- navigation -->
    <nav class="d-flex flex-column px-3 py-4">
        <a href="{{ route('dashboard') }}" class="nav-list d-flex align-items-center">
            <img src="{{ asset('asset/img/home-icon.png') }}" alt="Dashboard">
            <span class="active"> Dashboard </span>
        </a>
        <div class="divider"></div>
        <a href="{{ route('menu.index') }}" class="nav-list d-flex align-items-center">
            <img src="{{ asset('asset/img/menu-icon.png') }}" alt="menu">
            <span> Menu's </span>
        </a>
        <a href="{{ route('menu.create') }}" class="nav-list d-flex align-items-center pt-3">
            <img src="{{ asset('asset/img/add-menu-icon.png') }}" alt="add menu">
            <span> Add Menu </span>
        </a>
        <div class="divider"></div>
        <a href="{{ route('transaction.index') }}" class="nav-list d-flex align-items-center">
            <img src="{{ asset('asset/img/transaction-icon.png') }}" alt="transaction list">
            <span> Transaction </span>
        </a>
    </nav>
    <!-- end navigation -->

    <!-- profile -->
    <div class="row px-3 py-4 mt-4">
        <div class="col-sm d-flex flex-column align-items-center px-4 profile">
            <img src="{{ asset('asset/img/nilo.png') }}" alt="nilo">
            <h2 class="font-weight-bold"> Kelana Manis </h2>
            <p class="text-center"> in the place to make a drink that is fresh and has a delicious
                taste suitable for anyone
            </p>
        </div>
    </div>
    <!-- end profile -->
</div>