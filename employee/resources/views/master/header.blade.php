<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="list-user">Người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list-department">Phòng ban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list-employee">Nhân viên</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="navbar-text mr-1">Xin chào {{Auth::user()->username}}| </span>
                <a class="btn btn-primary btn-sm" href="logout" role="button">Đăng xuất</a>
            </form>
        </div>
    </nav>
</header>