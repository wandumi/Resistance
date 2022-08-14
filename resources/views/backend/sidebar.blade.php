<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-text mx-3">Resilient</div>
        {{--            <div class="sidebar-brand-icon">--}}
        {{--                <img src="{{ asset("admin/img/logo/logo2.png") }}">--}}
        {{--            </div>--}}

    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePresentation" 
           aria-controls="collapsePresentation">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Presentations</span>
        </a>
        <div id="collapsePresentation" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{ url('presentations/presentation') }}">All Presentations</a>
                <a class="collapse-item" href="{{ url('presentations/presentation_sections') }}">Sections</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinancials" 
           aria-controls="collapseFinancials">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Financials</span>
        </a>
        <div id="collapseFinancials" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{ url('financials/financial') }}">All Financials</a>
                <a class="collapse-item" href="{{ url('financials/financial_section') }}">Sections</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDmtns" 
            aria-controls="collapseDmtns">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Dmtns</span>
        </a>
        <div id="collapseDmtns" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Categories</h6>
                <a class="collapse-item" href="{{ url('dmtns/program_documents') }}">Programe Documents</a>
                <a class="collapse-item" href="{{ url('dmtns/policies') }}">Policies</a>
                <a class="collapse-item" href="{{ url('dmtns/price_supplements') }}">Price Supplements</a>
                <a class="collapse-item" href="{{ url('dmtns/credit_ratings') }}">Credit Ratings</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortfolio" 
           aria-controls="collapsePortfolio">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Portifolios</span>
        </a>
        <div id="collapsePortfolio" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{ url('portifolios/portifolio') }}">All Portifolios</a>
                <a class="collapse-item" href="{{ url('portifolios/portifolio_lists') }}">Sections</a>
            </div>
        </div>
    </li>



    <li class="nav-item active">
        <a class="nav-link" href="{{ url('shareholders') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Shareholders</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('pronvices') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Pronvices</span>
        </a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('properties') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Properties</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('bbbees') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>B-BBEEs</span>
        </a>
    </li>
    



    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Settings
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" 
           aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Users</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management</h6>
                <a class="collapse-item" href="{{ url('admin/users') }}">All Users</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
