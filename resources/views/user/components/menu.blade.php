 <!-- Center Alignment starts -->
 <div class="app-content content ">
     <div class="content-overlay"></div>
     <div class="header-navbar-shadow"></div>
     <div class="content-wrapper container-xxl p-0">
         {{-- <div class="content-header row">
             <div class="content-header-left col-md-9 col-12 mb-2">
                 <div class="row">
                     <div class="col-12">
                         <h2 class="content-header-title float-start mb-0">Layout without menu</h2>
                         <div class="breadcrumb-wrapper">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Home</a>
                                 </li>
                                 <li class="breadcrumb-item"><a href="#">Layouts</a>
                                 </li>
                                 <li class="breadcrumb-item active">Layout without menu
                                 </li>
                             </ol>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                 <div class="mb-1 breadcrumb-right">
                     <div class="dropdown">
                         <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                 data-feather="grid"></i></button>
                         <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                     class="me-1" data-feather="check-square"></i><span
                                     class="align-middle">Todo</span></a><a class="dropdown-item"
                                 href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span
                                     class="align-middle">Chat</span></a><a class="dropdown-item"
                                 href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                     class="align-middle">Email</span></a><a class="dropdown-item"
                                 href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                     class="align-middle">Calendar</span></a></div>
                     </div>
                 </div>
             </div>
         </div> --}}
         <div class="text-center">
             <img src="{{ asset('app-assets/images/uni.png') }}" alt="logo" style="width: 120px; height:120px">
             <h2 class="brand-text text-primary ms-1">MNS UET MULTAN</h2>
         </div>
         <ul class="nav justify-content-center with-space-between mb-2">
             <li class="nav-item">
                 <a class="nav-link btn btn-outline-success {{ Route::CurrentRouteNamed('user.personal_information.create') ? 'btn-success' : null }}"
                     href="{{ route('user.personal_information.create') }}">Personal
                     Information</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link btn btn-outline-success {{ Route::CurrentRouteNamed('user.academic.index') ? 'btn-success' : null }}"
                     href="{{ route('user.academic.index') }}">Academic Information</a>
             </li>
             <li class="nav-item">
                 <a class=" nav-link btn btn-success btn-outline-success" href="#">Choose Programme to Apply</a>
             </li>
             <li class="nav-item">
                 <a class=" nav-link btn btn-success btn-outline-success" href="#" tabindex="-1"
                     aria-disabled="true">Documents to be Attached</a>
             </li>
             <li class="nav-item">
                 <a class=" nav-link btn btn-success btn-outline-success" href="#" tabindex="-1"
                     aria-disabled="true">Verify & Submit</a>
             </li>
         </ul>
         <!-- Center Alignment ends -->
