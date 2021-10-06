<header class="container-fluid">
    <div class="row row-header">
        <div class="col-sm-3 logo">
            <img src="asset/img/logo.png" alt="kelana manis" />
        </div>
        <div class="col-sm-5 align-self-center pt-4 pb-3 text-center greetings">
            <h1>Good <span class="font-weight-bold">Morning</span>, Everyone</h1>
        </div>
        <div class="col-sm-3 d-flex align-self-center justify-content-end align-items-center">
            <img class="rounded-circle photo-admin" src="asset/img/pp.png" alt="admin">
            <div class="dropdown ml-3">
                <button class="btn dropdown-admin dropdown-toggle" type="button" data-toggle="dropdown"> Admin
                </button>
                <div class="dropdown-menu dropdown-list">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>