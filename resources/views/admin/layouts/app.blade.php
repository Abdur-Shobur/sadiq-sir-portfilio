<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .main-content {
            background: #f8f9fa;
            min-height: 100vh;
        }
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Toast Styles */
        .toast {
            min-width: 300px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .toast-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .toast-body {
            padding: 12px 16px;
            font-size: 14px;
        }

        .toast.show {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar p-3">
                    <div class="text-center mb-4">
                        <h4>Admin Panel</h4>
                    </div>

                    <nav class="nav flex-column">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>

                                <!-- Content Management -->
        <div class="mt-3 mb-2">
            <small class="text-muted text-uppercase">Content Management</small>
        </div>

        <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
            <i class="fas fa-images"></i> Banners
        </a>

        <a class="nav-link {{ request()->routeIs('admin.abouts.*') ? 'active' : '' }}" href="{{ route('admin.abouts.index') }}">
            <i class="fas fa-user"></i> About
        </a>

        <a class="nav-link {{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}" href="{{ route('admin.profiles.index') }}">
            <i class="fas fa-id-card"></i> Profile
        </a>

        <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
            <i class="fas fa-blog"></i> Blogs
        </a>
                        <a class="nav-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}" style="padding-left: 2.5rem;">
                            <i class="fas fa-tags"></i> Blog Categories
                        </a>

                        <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                            <i class="fas fa-calendar"></i> Events
                        </a>

                                <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
            <i class="fas fa-images"></i> Gallery
        </a>
        <a class="nav-link {{ request()->routeIs('admin.gallery-categories.*') ? 'active' : '' }}" href="{{ route('admin.gallery-categories.index') }}" style="padding-left: 2.5rem;">
            <i class="fas fa-tags"></i> Gallery Categories
        </a>

        <a class="nav-link {{ request()->routeIs('admin.researches.*') ? 'active' : '' }}" href="{{ route('admin.researches.index') }}">
            <i class="fas fa-microscope"></i> Research
        </a>

        <a class="nav-link {{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}" href="{{ route('admin.achievements.index') }}">
            <i class="fas fa-trophy"></i> Achievements
        </a>

                        <!-- Communication -->
                        <div class="mt-3 mb-2">
                            <small class="text-muted text-uppercase">Communication</small>
                        </div>

                        <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                            <i class="fas fa-envelope"></i> Messages
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-0">
                <div class="main-content">
                    <!-- Top Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <span class="navbar-brand">@yield('title', 'Dashboard')</span>
                            <div class="navbar-nav ms-auto">
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Page Content -->
                    <div class="p-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        @if(session('success'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="7000">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="6000">
                <div class="toast-header bg-warning text-dark">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong class="me-auto">Warning</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('warning') }}
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header bg-info text-white">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong class="me-auto">Info</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('info') }}
                </div>
            </div>
        @endif
    </div>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize toasts
        document.addEventListener('DOMContentLoaded', function() {
            var toastElements = document.querySelectorAll('.toast');
            toastElements.forEach(function(toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
