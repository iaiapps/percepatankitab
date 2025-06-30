   <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
   <header class="pc-header">
       <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
           <div class="me-auto pc-mob-drp">
               <ul class="list-unstyled">
                   <!-- ======= Menu collapse Icon ===== -->
                   <li class="pc-h-item pc-sidebar-collapse">
                       <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                           <i class="bi bi-list"></i>
                       </a>
                   </li>
                   <li class="pc-h-item pc-sidebar-popup">
                       <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                           <i class="bi bi-list"></i>
                       </a>
                   </li>

               </ul>
           </div>
           <!-- [Mobile Media Block end] -->
           <div class="ms-auto">
               <ul class="list-unstyled">
                   <li class="pc-h-item">
                       <div class="float-end d-flex">
                           <a href="{{ route('profile') }}" class="d-block btn btn-outline-primary py-1 px-2"> <i
                                   class="bi bi-person"></i></a>
                           <form action="{{ route('logout') }}" method="post">
                               @csrf
                               <button type="submit" class="ms-2 btn btn-danger">logout</button>
                           </form>
                       </div>
                   </li>
               </ul>
           </div>
       </div>
   </header>
   <!-- [ Header ] end -->
