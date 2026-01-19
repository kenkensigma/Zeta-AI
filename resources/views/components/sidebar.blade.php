<style>
    @import url('https://fonts.googleapis.com/icon?family=Material+Icons');
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

    /* ================= THEME VARIABLES ================= */
    :root {
        --bg-main: #050505;
        --bg-panel: #1a1a1a;
        --bg-panel-soft: #121212;
        --bg-hover: #2a2a2a;

        --text-main: #ffffff;
        --text-muted: #aaa;
        --text-dim: #888;

        --border-color: #222;

        --accent-color: #667eea;
        --accent-gradient: linear-gradient(45deg, #667eea, #764ba2);
    }

    /* LIGHT MODE */
    html[data-theme="light"] {
        --bg-main: #ffffff;
        --bg-panel: #f5f5f5;
        --bg-panel-soft: #eeeeee;
        --bg-hover: #dddddd;

        --text-main: #000000;
        --text-muted: #555;
        --text-dim: #777;

        --border-color: #dddddd;
    }

    /* SYSTEM MODE */
    @media (prefers-color-scheme: light) {
        html[data-theme="system"] {
            --bg-main: #ffffff;
            --bg-panel: #f5f5f5;
            --bg-panel-soft: #eeeeee;
            --bg-hover: #dddddd;

            --text-main: #000000;
            --text-muted: #555;
            --text-dim: #777;

            --border-color: #dddddd;
        }
    }

    /* ================= RESET ================= */
    * {
        box-sizing: border-box;
        font-family: "Manrope", sans-serif;
    }

    /* ================= SIDEBAR ================= */
    .sidebar {
        width: 280px;
        height: 100vh;
        background: var(--bg-main);
        color: var(--text-main);
        display: flex;
        flex-direction: column;
        padding: 16px;
    }

    /* ================= HEADER ================= */
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border-color);
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo {
        width: 4vh;
    }

    .title {
        font-size: 18px;
        color: var(--text-main);
    }

    /* ================= TOGGLE ================= */
    .switch {
        position: relative;
        width: 40px;
        height: 22px;
    }

    .switch input {
        display: none;
    }

    .slider {
        background: var(--bg-hover);
        border-radius: 20px;
        position: absolute;
        inset: 0;
    }

    .slider::before {
        content: "";
        width: 18px;
        height: 18px;
        background: var(--text-main);
        border-radius: 50%;
        position: absolute;
        top: 2px;
        left: 2px;
        transition: 0.3s;
    }

    .switch input:checked+.slider::before {
        transform: translateX(18px);
    }

    /* ================= SEARCH ================= */
    .search-box {
        margin: 16px 0;
        background: var(--bg-panel-soft);
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 10px;
        gap: 8px;
    }

    .search-box input {
        background: transparent;
        border: none;
        outline: none;
        color: var(--text-main);
        width: 100%;
    }

    /* ================= MENU ================= */
    .menu {
        flex: 1;
    }

    .menu-title {
        font-size: 12px;
        color: var(--text-dim);
        margin-bottom: 8px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border-radius: 10px;
        color: var(--text-muted);
        text-decoration: none;
        margin-bottom: 6px;
    }

    .menu-item.active,
    .menu-item:hover {
        background: var(--bg-hover);
        color: var(--text-main);
    }

    .menu-item .arrow {
        margin-left: auto;
    }

    /* ================= UPGRADE ================= */
    .upgrade-card {
        background: var(--bg-panel);
        border-radius: 14px;
        padding: 16px;
        margin-bottom: 16px;
    }

    .upgrade-card h4 {
        margin-bottom: 10px;
    }

    .upgrade-card button {
        width: 100%;
        border: none;
        padding: 10px;
        border-radius: 20px;
        background: var(--text-main);
        color: var(--bg-main);
        font-weight: 600;
        cursor: pointer;
    }

    /* ================= USER ================= */
    .user,
    .user-main {
        display: flex;
        align-items: center;
        gap: 10px;
        background: var(--bg-panel);
        padding: 12px;
        border-radius: 14px;
    }

    .user-main:hover {
        background: var(--bg-hover);
    }

    .user img,
    .user-main img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        background: var(--accent-gradient);
        padding: 2px;
    }

    .user-info {
        flex: 1;
        min-width: 0;
    }

    .user-info strong {
        font-size: 14px;
        color: var(--text-main);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-info small {
        font-size: 12px;
        color: var(--text-muted);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ================= DROPDOWN ================= */
    .arrow {
        background: none;
        border: none;
        color: var(--text-main);
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .arrow.rotate {
        transform: rotate(180deg);
    }

    .user-dropdown {
        background: var(--bg-panel);
        border-radius: 14px;
        padding: 0 8px;
        margin-bottom: 12px;

        display: flex;
        flex-direction: column;
        gap: 6px;
        max-height: 0;
        opacity: 0;
        transform: translateY(10px);
        overflow: hidden;

        transition: max-height 0.35s ease,
            opacity 0.25s ease,
            transform 0.25s ease;
    }

    .user-dropdown.show {
        max-height: 280px;
        opacity: 1;
        transform: translateY(0);
    }

    .user-dropdown a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 10px;
        text-decoration: none;
        color: var(--text-muted);
        font-size: 14px;
    }

    .user-dropdown a:hover {
        background: var(--bg-hover);
        color: var(--text-main);
    }

    .user-dropdown .divider {
        height: 1px;
        background: var(--bg-hover);
        margin: 6px 0;
    }

    .user-dropdown a.logout {
        color: #ff6b6b;
        background: rgba(255, 107, 107, 0.1);
    }

    .user-dropdown a.logout:hover {
        background: rgba(255, 107, 107, 0.2);
    }
</style>


<aside class="sidebar">
    <!-- Header -->
    <div class="sidebar-header">
        <div class="brand">
            <img src="{{ asset('images/logo.svg') }}" alt="Z Logo" class="logo">
            <span class="title">Zeta-Ai</span>
        </div>
    </div>

    <!-- Search -->
    <div class="search-box">
        <span class="material-icons">search</span>
        <input type="text" placeholder="Search">
    </div>

    <!-- Menu -->
    <div class="menu">
        <p class="menu-title">History</p>

        <a href="#" class="menu-item active">
            <span class="material-icons">chat</span>
            <span>Chat</span>
        </a>

        <a href="#" class="menu-item">
            <span class="material-icons">history</span>
            <span>History</span>
            <span class="material-icons arrow">expand_more</span>
        </a>
    </div>

    <!-- Upgrade Card -->
    <div class="upgrade-card">
        <h4>Upgrade to Z-Ai Premium</h4>
        <button>Learn more</button>
    </div>

    <!-- USER DROPDOWN -->
    <div class="user-dropdown" id="userDropdown">
        @auth
            <div class="user-main" id="openProfileModal" style="cursor: pointer">
                <img src="{{ auth()->user()->avatar_url }}" alt="User">
                <div class="user-info">
                    <strong>{{ auth()->user()->display_name }}</strong>
                    <small>{{ auth()->user()->username }}</small>
                </div>
            </div>

            <div class="divider"></div>
            <a href="#" onclick="openSettingsModal()">
                <span class="material-icons">settings</span>
                Settings
            </a>
            <a href="#">
                <span class="material-icons">help_outline</span>
                Help
            </a>
            <div class="divider"></div>
            <a href="#" class="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="material-icons">logout</span>
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <!-- Tampilan untuk guest di dropdown -->
            <div class="user-main">
                <img src="{{ asset('/images/avatars/agent-default.png') }}" alt="User">
                <div class="user-info">
                    <strong>Guest Agent</strong>
                    <small>Please login</small>
                </div>
            </div>
            <div class="divider"></div>
            <a href="#" onclick="document.getElementById('openLogin').click();">
                <span class="material-icons">login</span>
                Login / Register
            </a>
        @endauth
    </div>

    <!-- User -->
    <div class="user {{ auth()->check() ? 'authenticated' : 'guest' }}" id="userHeader">
        @auth
            <img src="{{ auth()->user()->avatar_url }}" alt="User" loading="lazy">
            <div class="user-info">
                <strong>{{ auth()->user()->display_name }}</strong>
                <small>{{ auth()->user()->username }}</small>
            </div>
            <button class="material-icons arrow" id="userToggle">expand_more</button>
        @else
            <!-- Tampilan sebelum login -->
            <img src="{{ asset('/images/avatars/agent-default.png') }}" alt="Guest" loading="lazy">
            <div class="user-info">
                <strong>Guest Agent</strong>
                <small>Click to login</small>
            </div>
            <button class="material-icons arrow" id="userToggle">expand_more</button>
            <!-- Hidden login trigger -->
            <button id="openLogin" style="display: none;">Login</button>
        @endauth
    </div>


    @include('modals.edit-profile')
    @include('modals.settings')

</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const trigger = document.getElementById("openProfileModal");
        const modal = document.getElementById("editProfileModal");

        trigger.addEventListener("click", function() {
            modal.classList.add("show");
        });
    });

    function closeModal() {
        document.getElementById("editProfileModal").classList.remove("show");
    }
</script>

<script>
    const toggle = document.getElementById('userToggle');
    const dropdown = document.getElementById('userDropdown');
    const toggleButton = document.getElementById('userToggle');

    toggle.addEventListener('click', () => {
        dropdown.classList.toggle('show');
        toggle.classList.toggle('active');
        toggleButton.classList.toggle('rotate');
    });
</script>

<script>
    // User Dropdown Toggle
    const toggle = document.getElementById('userToggle');
    const dropdown = document.getElementById('userDropdown');
    const toggleButton = document.getElementById('userToggle');

    if (toggle && dropdown) {
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('show');
            toggle.classList.toggle('active');
            toggleButton.classList.toggle('rotate');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
                dropdown.classList.remove('show');
                toggle.classList.remove('active');
                toggleButton.classList.remove('rotate');
            }
        });

        // Prevent dropdown from closing when clicking inside
        dropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }

    // Profile Modal
    document.addEventListener("DOMContentLoaded", function() {
        const trigger = document.getElementById("openProfileModal");
        const modal = document.getElementById("editProfileModal");

        if (trigger && modal) {
            trigger.addEventListener("click", function(e) {
                e.stopPropagation();
                modal.classList.add("show");
            });
        }
    });

    function closeModal() {
        const modal = document.getElementById("editProfileModal");
        if (modal) {
            modal.classList.remove("show");
        }
    }

    // Close modal when clicking outside
    document.addEventListener('click', (e) => {
        const modal = document.getElementById("editProfileModal");
        if (modal && modal.classList.contains('show') && !modal.contains(e.target)) {
            modal.classList.remove("show");
        }
    });

    // Open login modal when clicking guest user
    document.addEventListener('DOMContentLoaded', function() {
        const userHeader = document.querySelector('.user');
        const openLoginBtn = document.getElementById('openLogin');

        if (userHeader && openLoginBtn && !{{ auth()->check() ? 'true' : 'false' }}) {
            userHeader.style.cursor = 'pointer';
            userHeader.addEventListener('click', function(e) {
                if (!dropdown?.contains(e.target) && !toggle?.contains(e.target)) {
                    openLoginBtn.click();
                }
            });
        }
    });

    // Auth status indicator
    function updateAuthIndicator() {
        const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        const userElement = document.querySelector('.user');

        if (userElement) {
            if (isAuthenticated) {
                userElement.classList.add('authenticated');
                userElement.classList.remove('guest');
            } else {
                userElement.classList.add('guest');
                userElement.classList.remove('authenticated');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', updateAuthIndicator);

    // Handle image loading
    document.addEventListener('DOMContentLoaded', function() {
        const userImages = document.querySelectorAll('.user img, .user-dropdown img');

        userImages.forEach(img => {
            // Add loading class
            img.classList.remove('loaded');

            // Check if image is already loaded
            if (img.complete) {
                img.classList.add('loaded');
            } else {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });

                img.addEventListener('error', function() {
                    // Fallback to default avatar
                    this.src = '{{ asset('/images/avatars/agent-default.png') }}';
                    this.classList.add('loaded');
                });
            }
        });
    });
</script>
