{{-- <div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="fas fa-briefcase"></i> <span>CareerConnect</span></h2>
    </div>
    <div class="sidebar-menu">
        <a href="{{ route('admin') }}" class="menu-item active">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('adminUsersPage') }}" class="menu-item">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <a href="{{ route('admin.allCompanies') }}" class="menu-item">
            <i class="fas fa-building"></i>
            <span>Companies</span>
        </a>
        <a href="{{ route('adminProfile') }}" class="menu-item">
            <i class="fas fa-briefcase"></i>
            <span>Profile</span>
        </a> --}}
        {{-- <a href="{{ route('adminProfile') }}" class="menu-item has-submenu">
            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>
        </a>
        <div class="submenu">
            <a href="#">User Analytics</a>
            <a href="#">Company Analytics</a>
            <a href="#">Job Postings</a>
            <a href="#">Revenue</a>
        </div> --}}
        {{-- <a href="{{ route('admin.setting')}}" class="menu-item">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
        <p class="has-submenu">Website Management</p>
    </div>
</div> --}}

<style>
    nav {
        overflow-x: auto;

    }

    li {
        padding-left: 10px;
    }

    .group .submenu {
        list-style: none;
        padding-left: 30px;
    }
</style>
<nav class="sidebar ">
    <div class="sidebar-header">
        <h2><i class="fas fa-briefcase"></i> <span>CareerConnect</span></h2>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-title">CareerConnect</li>
        <li>
            <a href="{{ route('admin') }}" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('adminUsersPage') }}" class="menu-item">
                <i class="fas fa-users"></i>
                <span>User Management</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.allCompanies') }}" class="menu-item">
                <i class="fas fa-building"></i>
                <span>Companies</span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-item">
                <i class="fas fa-briefcase"></i>
                <span>Job Listings</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.website-analysis') }}" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span>Website Analytics</span>
            </a>
        </li>
        {{-- <li>
            <a href="admin-faq.html" class="menu-item">
                <i class="fas fa-question-circle"></i>
                <span>FAQ</span>
            </a>
        </li> --}}
        <li>
            <a href="{{ route('admin.ads') }}" class="menu-item">
                <i class="fas fa-ad"></i>
                <span>Ads Management</span>
            </a>
        </li>
        <li class="sidebar-title">Support</li>
        <li>
            <a href="{{ route('admin.contact_developer') }}" class="menu-item">
                <i class="fas fa-headset"></i>
                <span>Contact Developers</span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-item">
                <i class="fas fa-ticket-alt"></i>
                <span>Support Tickets</span>
            </a>
        </li>
        <li>Setting</li>
        <li>
            <a href="{{ route('adminProfile') }}" class="menu-item">
                <i class="fas fa-briefcase"></i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.setting')}}" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
        <ul id="menu">
            <li class="group">
                <a href="#" class="menu-item" onclick="toggleSubMenu(event)">
                    <i class="fas fa-cog"></i>
                    <span>Group</span>
                </a>
                <ul class="submenu" style="display: none;">
                    <li><a href="#" class="menu-item">Link 1</a></li>
                    <li><a href="#" class="menu-item">Link 2</a></li>
                    <li><a href="#" class="menu-item">Link 3</a></li>
                </ul>
            </li>
        </ul>

        <script>
            function toggleSubMenu(event) {
                event.preventDefault();
                const submenu = event.currentTarget.nextElementSibling;
                submenu.style.display = (submenu.style.display === "none") ? "block" : "none";
            }
        </script>

    </ul>
</nav>