<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.posts.index')}}"><i class="fas fa-tachometer-alt"></i><span>Posts</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.post-categories.index')}}"><i class="fas fa-user"></i><span>Post Categories</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.tags.index')}}"><i class="fas fa-user"></i><span>Post Tags</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.authors.index')}}"><i class="fas fa-user"></i><span>Post Authors</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>
