<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
<div class="position-sticky pt-3 sidebar-sticky">
<ul class="nav flex-column">
    <li class="nav-item">
    <a class="nav-link <?=current_file()=='admin'?'active':''?>" aria-current="page" href="/admin">
        <span data-feather="home" class="align-text-bottom"></span>
        Dashboard
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?=(current_file()=='orders.php')?'active':''?>" href="/admin/orders.php">
        <span data-feather="file" class="align-text-bottom"></span>
        Orders
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?=(current_file()=='books.php'||current_file()=='addbook.php')?'active':''?>" href="/admin/books.php">
        <span data-feather="book" class="align-text-bottom"></span>
        Books
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?=current_file()=='users.php'?'active':''?>" href="/admin/users.php">
        <span data-feather="users" class="align-text-bottom"></span>
        Users
    </a>
    </li>
</ul>

<!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
    <span>Saved reports</span>
    <a class="link-secondary" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle" class="align-text-bottom"></span>
    </a>
</h6> -->
</div>
</nav>
