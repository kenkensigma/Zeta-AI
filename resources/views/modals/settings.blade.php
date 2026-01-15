<style>
    /* ================= OVERLAY ================= */
    .settings-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    /* ================= MODAL ================= */
    .settings-modal {
        width: 900px;
        height: 520px;
        background: #050505;
        border-radius: 16px;
        display: flex;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    }

    /* ================= LEFT SIDEBAR ================= */
    .settings-menu {
        width: 260px;
        background: radial-gradient(circle at top, #1c1c1c, #050505);
        padding: 20px;
        border-right: 1px solid #e5e5e5;
    }

    .settings-menu h3 {
        margin-bottom: 16px;
        font-size: 18px;
    }

    .settings-menu ul {
        list-style: none;
        padding: 0;
    }

    .settings-menu li {
        padding: 12px 14px;
        margin-bottom: 6px;
        cursor: pointer;
        border-radius: 10px;
        font-weight: 500;
        transition: 0.2s;
    }

    .settings-menu li:hover {
        background: #eaeaea;
        color: #000;
    }

    .settings-menu li.active {
        background: #000;
        color: #fff;
    }

    /* ================= RIGHT CONTENT ================= */
    .settings-content {
        flex: 1;
        padding: 28px;
        position: relative;
    }

    .settings-content h2 {
        margin-bottom: 10px;
    }

    .settings-content p {
        color: #c9c9c9;
        line-height: 1.6;
    }

    /* ================= CLOSE ================= */
    .close-btn {
        position: absolute;
        top: 16px;
        right: 20px;
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
    }

    /* ================= TABS ================= */
    .tab {
        display: none;
    }

    .tab.active {
        display: block;
    }
</style>

<!-- ================= SETTINGS MODAL ================= -->
<div class="settings-overlay" id="settingsOverlay">
    <div class="settings-modal">

        <!-- LEFT -->
        <div class="settings-menu">
            <h3>Settings</h3>
            <ul>
                <li class="active" data-tab="general">General</li>
                <li data-tab="account">Account</li>
                <li data-tab="personalization">Personalization</li>
                <li data-tab="notification">Notification</li>
                <li data-tab="theme">Theme</li>
            </ul>
        </div>

        <!-- RIGHT -->
        <div class="settings-content">
            <button class="close-btn" id="closeSettings">&times;</button>

            <div class="tab active" id="general">
                <h2>General</h2>
                <p>Language, system preferences, and application behavior.</p>
            </div>

            <div class="tab" id="account">
                <h2>Account</h2>
                <p>Email, password, and security configuration.</p>
            </div>

            <div class="tab" id="personalization">
                <h2>Personalization</h2>
                <p>Profile customization and layout preferences.</p>
            </div>

            <div class="tab" id="notification">
                <h2>Notification</h2>
                <p>Manage notification alerts and sound preferences.</p>
            </div>

            <div class="tab" id="theme">
                <h2>Theme</h2>
                <p>Switch between Light and Dark mode.</p>
            </div>
        </div>

    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
    const overlay = document.getElementById("settingsOverlay");
    const closeBtn = document.getElementById("closeSettings");

    const menuItems = document.querySelectorAll(".settings-menu li");
    const tabs = document.querySelectorAll(".tab");

    /* === OPEN MODAL (DIPANGGIL DARI SIDEBAR) === */
    function openSettingsModal() {
        overlay.style.display = "flex";
    }

    /* === CLOSE MODAL === */
    closeBtn.onclick = () => overlay.style.display = "none";

    overlay.addEventListener("click", e => {
        if (e.target === overlay) overlay.style.display = "none";
    });

    /* === TAB SWITCH === */
    menuItems.forEach(item => {
        item.addEventListener("click", () => {
            menuItems.forEach(i => i.classList.remove("active"));
            tabs.forEach(t => t.classList.remove("active"));

            item.classList.add("active");
            document.getElementById(item.dataset.tab).classList.add("active");
        });
    });
</script>
