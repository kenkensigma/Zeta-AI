<!-- ================= SETTINGS MODAL ================= -->
<style>
    /* ===== SETTINGS POPUP ===== */
    .popup-settings {
        width: 900px;
        max-width: 95%;
    }

    /* BODY */
    .settings-body {
        display: flex;
        margin-top: 18px;
        height: 420px;
    }

    /* LEFT MENU */
    .settings-menu {
        width: 240px;
        border-right: 1px solid #222;
        padding-right: 12px;
    }

    .settings-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .settings-menu li {
        padding: 12px 14px;
        margin-bottom: 6px;
        cursor: pointer;
        border-radius: 8px;
        color: #aaa;
        font-weight: 500;
        transition: 0.25s;
    }

    .settings-menu li:hover {
        background: #1c1c1c;
        color: #fff;
    }

    .settings-menu li.active {
        background: #000;
        color: #fff;
    }

    /* RIGHT CONTENT */
    .settings-content {
        flex: 1;
        padding: 10px 20px;
    }

    .settings-content h3 {
        margin-bottom: 10px;
    }

    .settings-content p {
        color: #bfbfbf;
        line-height: 1.6;
    }

    /* TABS */
    .settings-tab {
        display: none;
    }

    .settings-tab.active {
        display: block;
    }
</style>

<div id="popupSettings" class="popup popup-settings">

    <!-- HEADER -->
    <div id="popup-header">
        <h2 class="title-header">Settings</h2>
        <button class="close-btn" id="closeSettings">x</button>
    </div>

    <!-- BODY -->
    <div class="settings-body">

        <!-- LEFT MENU -->
        <div class="settings-menu">
            <ul>
                <li class="active" data-tab="settings-general">General</li>
                <li data-tab="settings-account">Account</li>
                <li data-tab="settings-personalization">Personalization</li>
                <li data-tab="settings-notification">Notification</li>
                <li data-tab="settings-theme">Theme</li>
            </ul>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="settings-content">

            <div class="settings-tab active" id="settings-general">
                <h3>General</h3>
                <p>Language, system preferences, and application behavior.</p>
            </div>

            <div class="settings-tab" id="settings-account">
                <h3>Account</h3>
                <p>Email, password, and security configuration.</p>
            </div>

            <div class="settings-tab" id="settings-personalization">
                <h3>Personalization</h3>
                <p>Profile customization and layout preferences.</p>
            </div>

            <div class="settings-tab" id="settings-notification">
                <h3>Notification</h3>
                <p>Manage notification alerts and sound preferences.</p>
            </div>

            <div class="settings-tab" id="settings-theme">
                <h3>Theme</h3>
                <p>Switch between Light and Dark mode.</p>
            </div>

        </div>
    </div>
</div>

<script>
    /* ================= SETTINGS MODAL LOGIC ================= */

    (() => {
        const popup = document.getElementById('popupSettings');
        const closeBtn = document.getElementById('closeSettings');
        const menuItems = popup.querySelectorAll('.settings-menu li');
        const tabs = popup.querySelectorAll('.settings-tab');

        /* OPEN SETTINGS */
        window.openSettingsModal = function() {
            if (typeof closeAll === 'function') closeAll();
            popup.classList.add('active');
            document.getElementById('overlay')?.classList.add('active');
        };

        /* CLOSE SETTINGS */
        closeBtn.onclick = () => {
            popup.classList.remove('active');
            document.getElementById('overlay')?.classList.remove('active');
        };

        /* TAB SWITCH */
        menuItems.forEach(item => {
            item.addEventListener('click', () => {

                menuItems.forEach(i => i.classList.remove('active'));
                tabs.forEach(t => t.classList.remove('active'));

                item.classList.add('active');

                const target = popup.querySelector('#' + item.dataset.tab);
                if (target) target.classList.add('active');
            });
        });
    })();
</script>
