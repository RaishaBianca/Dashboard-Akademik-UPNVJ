<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="main">
    <div>
        <div class="sidebar">
            <div class="sidebar-header">
                <h3 class='title'>Layanan Akademik</h3>
                <h4>UPN Veteran Jakarta</h4>
            </div>
            <div class='conf-opt'>
                <div class='user-opt' id="userIcon" onclick="toggleUserAction()">
                    <i class="fas fa-circle-user icon"></i>
                    <div id="userAction" class='user-action'>
                        <a href="">
                            <h4>User</h4>
                        </a>
                        <a href="">
                            <h4>Log Out</h4>
                        </a>
                    </div>
                </div>
                <i class="fas fa-gear icon"></i>
            </div>
            <div class='search'>
                <div class='search-container'>
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" placeholder="Search..." class='search-field' />
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="fas fa-chart-column menu-icon"></i>
                        <span>Stat Peminjaman</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/daftar-konfirmasi" class="sidebar-link">
                        <i class="fas fa-list-check menu-icon"></i>
                        <span>Daftar Konfirmasi</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/jadwal-pemakaian" class="sidebar-link">
                        <i class="fas fa-calendar-alt menu-icon"></i>
                        <span>Jadwal Pemakaian</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/pelaporan-kendala" class="sidebar-link">
                        <i class="fas fa-circle-exclamation menu-icon"></i>
                        <span>Pelaporan Kendala</span>
                    </a>
                </li>
            </ul>
        </div>
    
        <script>
            function toggleUserAction() {
                const userAction = document.getElementById('userAction');
                userAction.style.display = userAction.style.display === 'flex' ? 'none' : 'flex';
            }
    
            document.addEventListener('mousedown', function(event) {
                const userAction = document.getElementById('userAction');
                const userIcon = document.getElementById('userIcon');
                if (userAction && !userAction.contains(event.target) && !userIcon.contains(event.target)) {
                    userAction.style.display = 'none';
                }
            });
        </script>
        @yield('content')
    </div>
</body>
</html>