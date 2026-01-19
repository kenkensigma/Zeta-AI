    <style>
        :root {
            --accent: #4f46e5;
            --bg: #050505;
            --text: #ffffff;
            --radius: 16px;
        }

        #theme-root {
            font-family: Inter, sans-serif;
            background: var(--bg);
            color: var(--text);
            padding: 28px;
            border-radius: var(--radius);
            max-width: 720px;
            transition: 0.3s;
        }

        #theme-root h2 {
            margin-bottom: 6px;
        }

        #theme-root p {
            color: #aaa;
            margin-bottom: 24px;
        }

        .theme-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }

        .theme-group label {
            font-size: 13px;
            color: #bbb;
        }

        .theme-group input,
        .theme-group select {
            padding: 10px 12px;
            border-radius: 10px;
            background: #111;
            color: #fff;
            border: 1px solid #222;
        }

        .theme-preview {
            margin-top: 24px;
            padding: 20px;
            border-radius: var(--radius);
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
        }

        .theme-btn {
            margin-top: 16px;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: var(--accent);
            color: #fff;
            cursor: pointer;
            font-weight: 600;
        }
    </style>

    <div class="theme-settings">

        <h3>Theme</h3>
        <p>Customize the appearance of your console.</p>

        <!-- COLOR MODE -->
        <div class="theme-section">
            <label class="theme-label">Color Mode</label>

            <div class="theme-options">
                <button class="theme-btn" data-theme="dark">
                    🌙 Dark
                </button>

                <button class="theme-btn" data-theme="light">
                    ☀️ Light
                </button>

                <button class="theme-btn" data-theme="system">
                    💻 System
                </button>
            </div>
        </div>

        <!-- ACCENT COLOR -->
        <div class="theme-section">
            <label class="theme-label">Accent Color</label>

            <div class="accent-options">
                <span class="accent-color" data-color="#6C5CE7"></span>
                <span class="accent-color" data-color="#00B894"></span>
                <span class="accent-color" data-color="#0984E3"></span>
                <span class="accent-color" data-color="#E84393"></span>
                <span class="accent-color" data-color="#FDCB6E"></span>
            </div>
        </div>

        <!-- UI SCALE -->
        <div class="theme-section">
            <label class="theme-label">Interface Scale</label>

            <input type="range" min="90" max="110" value="100" class="scale-slider" id="uiScaleRange" />
            <span id="uiScaleValue">100%</span>
        </div>

    </div>

    <script>
        /* ================= THEME MODE ================= */
        document.querySelectorAll('.theme-btn').forEach(btn => {
            btn.onclick = () => {
                const mode = btn.dataset.theme;

                document.documentElement.setAttribute('data-theme', mode);
                localStorage.setItem('theme-mode', mode);

                document.querySelectorAll('.theme-btn')
                    .forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            };
        });

        /* ================= ACCENT COLOR ================= */
        document.querySelectorAll('.accent-color').forEach(color => {
            color.onclick = () => {
                const value = color.dataset.color;

                document.documentElement.style
                    .setProperty('--accent-color', value);

                localStorage.setItem('accent-color', value);

                document.querySelectorAll('.accent-color')
                    .forEach(c => c.classList.remove('active'));
                color.classList.add('active');
            };
        });

        /* ================= UI SCALE ================= */
        const scaleInput = document.getElementById('uiScaleRange');
        const scaleValue = document.getElementById('uiScaleValue');

        scaleInput.oninput = () => {
            document.documentElement.style
                .setProperty('--ui-scale', scaleInput.value + '%');

            scaleValue.innerText = scaleInput.value + '%';
            localStorage.setItem('ui-scale', scaleInput.value);
        };

        /* ================= LOAD SAVED ================= */
        (() => {
            const savedTheme = localStorage.getItem('theme-mode');
            const savedAccent = localStorage.getItem('accent-color');
            const savedScale = localStorage.getItem('ui-scale');

            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                document.querySelector(`[data-theme="${savedTheme}"]`)
                    ?.classList.add('active');
            }

            if (savedAccent) {
                document.documentElement.style
                    .setProperty('--accent-color', savedAccent);
                document.querySelector(`[data-color="${savedAccent}"]`)
                    ?.classList.add('active');
            }

            if (savedScale) {
                document.documentElement.style
                    .setProperty('--ui-scale', savedScale + '%');
                scaleInput.value = savedScale;
                scaleValue.innerText = savedScale + '%';
            }
        })();
    </script>
