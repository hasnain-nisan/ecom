<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{route('admin.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Orders
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.order.manage') }}">Manage orders</a>
                    <a class="nav-link" href="{{ route('admin.product.create') }}">Add product</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Products
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.product.manage') }}">Manage products</a>
                    <a class="nav-link" href="{{ route('admin.product.create') }}">Add product</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Categories
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('admin.category.manage')}}">Manage Categories</a>
                    <a class="nav-link" href="{{route('admin.category.create')}}">Create categories</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebrands" aria-expanded="false" aria-controls="pagesCollapseError">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Brands
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsebrands" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('admin.brand.manage')}}">Manage Brand</a>
                    <a class="nav-link" href="{{route('admin.brand.create')}}">Create Brand</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDd" aria-expanded="false" aria-controls="pagesCollapseError">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Division & District
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseDd" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="{{route('admin.division.create')}}">Manage Divisions</a>
                  <a class="nav-link" href="{{route('admin.district.create')}}">Manage Districts</a>

                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlider" aria-expanded="false" aria-controls="pagesCollapseError">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Slider
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseSlider" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="{{route('admin.sliders')}}">Manage Sliders</a>
                  </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>

                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer mb-3">
        <div class="small">Logged in as:</div>
        {{Auth::user()->name}}
    </div>
</nav>
