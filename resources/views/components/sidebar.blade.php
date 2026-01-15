<style>
    @import url('https://fonts.googleapis.com/icon?family=Material+Icons');
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        box-sizing: border-box;
        font-family: "Manrope", sans-serif;
    }

    .sidebar {
        width: 280px;
        height: 100vh;
        background: radial-gradient(circle at top, #1c1c1c, #050505);
        color: #fff;
        display: flex;
        flex-direction: column;
        padding: 16px;
    }

    /* Header */
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 16px;
        border-bottom: 1px solid #222;
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
    }

    /* Toggle */
    .switch {
        position: relative;
        width: 40px;
        height: 22px;
    }

    .switch input {
        display: none;
    }

    .slider {
        background: #333;
        border-radius: 20px;
        position: absolute;
        inset: 0;
    }

    .slider::before {
        content: "";
        width: 18px;
        height: 18px;
        background: #fff;
        border-radius: 50%;
        position: absolute;
        top: 2px;
        left: 2px;
        transition: 0.3s;
    }

    .switch input:checked+.slider::before {
        transform: translateX(18px);
    }

    /* Search */
    .search-box {
        margin: 16px 0;
        background: #121212;
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
        color: #fff;
        width: 100%;
    }

    /* Menu */
    .menu {
        flex: 1;
    }

    .menu-title {
        font-size: 12px;
        color: #888;
        margin-bottom: 8px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border-radius: 10px;
        color: #ccc;
        text-decoration: none;
        margin-bottom: 6px;
    }

    .menu-item.active,
    .menu-item:hover {
        background: #2a2a2a;
        color: #fff;
    }

    .menu-item .arrow {
        margin-left: auto;
    }

    /* Upgrade */
    .upgrade-card {
        background: #1a1a1a;
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
        background: #eaeaea;
        font-weight: 600;
        cursor: pointer;
    }

    /* User */
    .user {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #1a1a1a;
        padding: 12px;
        border-radius: 14px;
    }

    .user-main {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #1a1a1a;
        padding: 12px;
        border-radius: 14px;
    }

    .user-main:hover {
        background-color: rgba(60, 60, 60, 0.564);
    }

    .user-main img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }


    .user img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .user-info small {
        color: #aaa;
    }

    .arrow {
        background: transparent;
        border: none;
        color: #fff;
        cursor: pointer;

        transition: transform 0.3s ease;
    }

    .arrow.rotate {
        transform: rotate(180deg);
    }


    .user-dropdown {
        background: #1a1a1a;
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

        transition:
            max-height 0.35s ease,
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
        color: #ddd;
        font-size: 14px;
    }

    .user-dropdown a:hover {
        background: #2a2a2a;
        color: #fff;
    }

    .user-dropdown .divider {
        height: 1px;
        background: #2a2a2a;
        margin: 6px 0;
    }

    .user-dropdown .logout {
        color: #ff6b6b;
    }

    .user .arrow {
        transition: transform 0.3s ease;
    }

    .user.active .arrow {
        transform: rotate(180deg);
    }

    /* Avatar styling improvements */
.user img, 
.user-dropdown img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid transparent;
    background: linear-gradient(45deg, #667eea, #764ba2);
    padding: 2px;
}

.user-main img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid transparent;
    background: linear-gradient(45deg, #667eea, #764ba2);
    padding: 2px;
}

/* Guest avatar styling */
.user:not(:has(.auth)) img,
.user-dropdown:not(:has(.auth)) img {
    opacity: 0.7;
    filter: grayscale(30%);
}

/* User info improvements */
.user-info {
    flex: 1;
    min-width: 0; /* Prevent overflow */
}

.user-info strong {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 120px;
}

.user-info small {
    display: block;
    font-size: 12px;
    color: #aaa;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 120px;
}

/* Auth status indicators */
.user.authenticated {
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
}

.user.guest {
    background: rgba(255, 255, 255, 0.05);
    cursor: pointer;
}

.user.guest:hover {
    background: rgba(255, 255, 255, 0.1);
}

.user.guest .user-info strong {
    color: #ccc;
}

.user.guest .user-info small {
    color: #888;
}

/* Dropdown links improvements */
.user-dropdown a .material-icons {
    font-size: 18px;
    width: 24px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.user-dropdown a.logout {
    color: #ff6b6b;
    background: rgba(255, 107, 107, 0.1);
}

.user-dropdown a.logout:hover {
    background: rgba(255, 107, 107, 0.2);
}

/* Login link in dropdown for guests */
.user-dropdown a.login-link {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

.user-dropdown a.login-link:hover {
    background: rgba(102, 126, 234, 0.2);
}

/* Avatar loading state */
.user img,
.user-main img {
    position: relative;
}

.user img::before,
.user-main img::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, #2a2a2a 25%, #333 50%, #2a2a2a 75%);
    background-size: 200% 100%;
    border-radius: 50%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.user img.loaded::before,
.user-main img.loaded::before {
    display: none;
}

/* Responsive design */
@media (max-width: 768px) {
    .user-info strong,
    .user-info small {
        max-width: 100px;
    }
    
    .user-dropdown {
        position: fixed;
        bottom: 80px;
        right: 16px;
        left: 16px;
        max-width: 300px;
        margin: 0 auto;
        z-index: 1000;
    }
    
    .user {
        padding: 8px;
    }
    
    .user img,
    .user-main img {
        width: 36px;
        height: 36px;
    }
}

@media (max-width: 480px) {
    .user-info strong,
    .user-info small {
        max-width: 80px;
        font-size: 12px;
    }
    
    .user-info small {
        font-size: 10px;
    }
    
    .user-dropdown {
        min-width: auto;
        width: calc(100% - 32px);
    }
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
        <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
