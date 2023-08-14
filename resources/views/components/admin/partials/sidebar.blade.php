<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Boutique</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.index')}}"> Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Clients</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.categorie.index')}}">Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Order</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Entreprise</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.testimonial.index')}}">Temoignages</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">A propos</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Header</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.carousel.index')}}">Carousel</a></li>
               
              </ul>
            </div>
          </li>
         
        </ul>
      </nav>