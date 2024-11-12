<header>
    <div class="navigation-container">
        <div class="navigation-logos">
            <div style="display: flex; gap: 20px">
                <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
                <a href="https://wa.me/+96181545263" target="_blank" class="navigation-whats-icon">
                    <i class="fa fa-whatsapp whatsapp-icon"></i>
                </a>
                <a href="https://www.instagram.com/buytfinder/profilecard/?igsh=MTJlNnJzcmd6Zndrcg==" target="_blank"
                    class="navigation-insta-icon">
                    <i class="fa fa-instagram instagram-icon"></i>
                </a>
            </div>
        </div>
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="120px">
        </div>
    </div>
</header>

<!-- Sidebar Menu -->
<div id="sidebar" class="sidebar">
    <button class="close-btn" onclick="toggleSidebar()">×</button>
    <ul class="sidebar-menu">
        <li>
            <i class="fa fa-info-circle"></i>
            <a href="{{ route('us') }}">من نحن</a>
        </li>
    </ul>
</div>

<style>
    /* Sidebar styling */
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.3s;
        padding-top: 60px;
        z-index: 999999;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu li {
        padding: 15px;
        margin-left: 20px;
        text-align: left;
    }

    .sidebar-menu li i {
        color: gray;
        text-decoration: none;
        font-size: 22px;
    }

    .sidebar-menu li a {
        color: gray;
        text-decoration: none;
        font-size: 18px;
    }

    /* Sidebar toggle button styling */
    .sidebar-toggle {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #333;
        position: relative;
    }

    /* Close button styling inside sidebar */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 30px;
        background: none;
        border: none;
        color: gray;
        cursor: pointer;
    }

    /* Open sidebar */
    .sidebar.active {
        width: 200px;
    }
</style>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>
