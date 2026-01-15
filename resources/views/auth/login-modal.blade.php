<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="overlay" class="overlay"></div>

<!-- ========== EMAIL LOGIN ========== -->
<div id="popupLogin" class="popup">
    <div id="popup-header">
        <h2 class="title-header">Zeta-AI</h2>
        <button id="closeLogin" class="close-btn">x</button>
    </div>

    <h1 class="text-title">Access Your Console</h1>
    <h2 class="subtitle">Securely authenticate to continue your mission.</h2>

    <button class="btn-google">
        <i class="fa-brands fa-google"></i><span class="login-text"> Continue with Google</span>
    </button>

    <button class="btn-phone" data-mode="phone">
        <i class="fa-solid fa-phone"></i> <span class="login-text"> Continue with Number</span>
    </button>

    <div class="divider">OR</div>

    <input type="email" class="input emailInput" placeholder="Authorized Email">
    <button class="btn-enter enterConsole">Enter Console</button>

    <p class="small">
        No clearance?
        <span id="toRegister" class="regis-text">Request access</span>
    </p>
</div>

<!-- ========== EMAIL REGISTER ========== -->
<div id="popupRegister" class="popup">
    <div id="popup-header">
        <h2 class="title-header">Zeta-AI</h2>
        <button id="closeRegister" class="close-btn">x</button>
    </div>

    <h1 class="text-title">Agent Enrollment</h1>
    <h2 class="subtitle">Register your credentials to gain access to Zeta.AI systems.</h2>

    <button class="btn-google">
        <i class="fa-brands fa-google"></i> <span class="login-text">Continue with Google</span>
    </button>

    <button class="btn-phone" data-mode="phone">
        <i class="fa-solid fa-phone"></i> <span class="login-text"> Continue with Number</span>
    </button>

    <div class="divider">OR</div>

    <input type="email" class="input emailInput" placeholder="Authorized Email">
    <button class="btn-enter enterConsole">Enter Console</button>

    <p class="small">
        Already have Console?
        <span id="toLogin" class="regis-text">Access Console</span>
    </p>
</div>

<!-- ========== PHONE LOGIN ========== -->
<div id="popupPhoneLogin" class="popup">
    <div id="popup-header">
        <h2 class="title-header">Zeta-AI</h2>
        <button id="closePhoneLogin" class="close-btn">x</button>
    </div>

    <h1 class="text-title">Access Your Console</h1>
    <h2 class="subtitle">Securely authenticate to continue your mission.</h2>

    <button class="btn-google">
        <i class="fa-brands fa-google"></i> <span class="login-text"> Continue with Google</span>
    </button>

    <button class="btn-phone" data-mode="email">
        <i class="fa-solid fa-envelope"></i> <span class="login-text"> Continue with Email</span>
    </button>

    <div class="divider">OR</div>

    <input type="tel" class="input phoneInput" placeholder="Authorized Phone Number">
    <button class="btn-enter phoneEnter">Enter Console</button>

    <p class="small">
        No clearance?
        <span id="toPhoneRegister" class="regis-text">Request access</span>
    </p>
</div>

<!-- ========== PHONE REGISTER ========== -->
<div id="popupPhoneRegister" class="popup">
    <div id="popup-header">
        <h2 class="title-header">Zeta-AI</h2>
        <button id="closePhoneRegister" class="close-btn">x</button>
    </div>

    <h1 class="text-title">Agent Enrollment</h1>
    <h2 class="subtitle">Register your credentials to gain access to Zeta.AI systems.</h2>

    <button class="btn-google">
        <i class="fa-brands fa-google"></i> <span class="login-text"> Continue with Google</span>
    </button>

    <button class="btn-phone" data-mode="email">
        <i class="fa-solid fa-envelope"></i> <span class="login-text"> Continue with Email</span>
    </button>

    <div class="divider">OR</div>

    <input type="tel" class="input phoneInput" placeholder="Authorized Phone Number">
    <button class="btn-enter phoneEnter">Enter Console</button>

    <p class="small">
        Already have Console?
        <span id="toPhoneLogin" class="regis-text">Access Console</span>
    </p>
</div>

<!-- ========== OTP ========== -->
<div id="popupOtp" class="popup">
    <div id="popup-header">
        <h2 class="title-header">Zeta-AI</h2>
        <button id="closeOtp" class="close-btn">x</button>
    </div>

    <h1 class="text-title">OTP Verification</h1>
    <h2 class="subtitle">Enter the verification code sent to your email.</h2>

    <input type="text" class="input" placeholder="Enter OTP Code">
    <button class="btn-enter">Verify Code</button>
</div>

<div id="toastOtp" class="toast">
    <i class="fa-solid fa-circle-check"></i>
    <span>OTP has been sent</span>
</div>

<div id="toastError" class="toast error">
    <i class="fa-solid fa-circle-xmark"></i>
    <span>Please enter a valid email address</span>
</div>

<!-- ========== Edit Profile ========== -->
<div class="overlay-profile" id="SetupProfileModal">
    <div class="modal-setupProfile">
        <h2>Setup Profile</h2>

        <div class="avatar-wrapper">
            <img id="setupProfileAvatar" class="avatar">
            <button class="camera-btn">
                <i class="fa-regular fa-camera"></i>
            </button>
            <button class="delete-btn" onclick="openSetupDeletePopup()">
                <i class="fa-regular fa-trash-can"></i>
            </button>
        </div>

        <div class="form-group">
            <label>Display Name</label>
            <input id="setupDisplayNameInput" type="text" placeholder="Enter Display Name">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input id="setupUsernameInput" type="text" placeholder="Enter Username">
        </div>

        <div class="actions">
            <button class="btn cancel" id="skipSetupProfile">Skip</button>
            <button class="btn save" id="saveSetupProfile">Save</button>
        </div>
    </div>
</div>

<div class="popup-overlay" id="setup-popup-delete">
    <div class="popup-box">
        <p>Are you sure you want to delete your profile photo?</p>
        <div class="popup-actions">
            <button class="btn-no" onclick="closeSetupDeletePopup()">Cancel</button>
            <button class="btn-delete" onclick="deleteSetupPhoto()">Delete</button>
        </div>
    </div>
</div>



<script>
    let authMode = 'login';
    let activeEmail = null;
    let activePhone = null;


    function csrf() {
        return document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');
    }

    async function post(url, data = {}) {
        const res = await fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf(),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },

            body: JSON.stringify(data),
        });

        const json = await res.json();

        if (!res.ok) throw json;

        return json;
    }




    /* ================= ELEMENTS ================= */
    const overlayLogin = document.getElementById("overlay");
    const openBtn = document.getElementById("openLogin");


    const popupLogin = document.getElementById("popupLogin");
    const popupRegister = document.getElementById("popupRegister");
    const popupPhoneLogin = document.getElementById("popupPhoneLogin");
    const popupPhoneRegister = document.getElementById("popupPhoneRegister");
    const popupOtp = document.getElementById("popupOtp");

    const phoneBtns = document.querySelectorAll(".btn-phone");
    const enterButtons = document.querySelectorAll(".enterConsole");
    const phoneEnterBtns = document.querySelectorAll(".phoneEnter");

    const toastOtp = document.getElementById("toastOtp");
    const toastError = document.getElementById("toastError");
    const emailInputs = document.querySelectorAll(".emailInput");

    /* ================= HELPERS ================= */
    function closeAll() {
        document.querySelectorAll(".popup").forEach(p => p.classList.remove("active"));
        overlay.classList.remove("active");
        phoneBtns.forEach(setBtnToPhone);
    }

    function showOtpToast() {
        toastOtp.classList.add("show");
        setTimeout(() => toastOtp.classList.remove("show"), 3000);
    }

    function showErrorToast() {
        toastError.classList.add("show");
        setTimeout(() => toastError.classList.remove("show"), 3000);
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    async function loadProfileForSetup() {
        try {
            const res = await fetch('/auth/profile/status', {
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });

            const json = await res.json();

            if (!json.profile) return;

            document.getElementById('setupDisplayNameInput').value =
                json.profile.display_name ?? '';

            document.getElementById('setupUsernameInput').value =
                json.profile.username ?? '';

            if (json.profile.avatar) {
                document.getElementById('setupProfileAvatar').src =
                    '/' + json.profile.avatar;
            }

        } catch (e) {
            console.error('Failed load profile', e);
        }
    }


    /* ================= BUTTON MODE ================= */
    function setBtnToPhone(btn) {
        btn.dataset.mode = "phone";
        btn.innerHTML = `<i class="fa-solid fa-phone"></i> Continue with Number`;
    }

    function setBtnToEmail(btn) {
        btn.dataset.mode = "email";
        btn.innerHTML = `<i class="fa-solid fa-envelope"></i> Continue with Email`;
    }

    /* ================= OPEN LOGIN ================= */
    openBtn.onclick = () => {
        popupLogin.classList.add("active");
        overlay.classList.add("active");
    };

    /* ================= CLOSE ================= */
    overlay.onclick = closeAll;
    document.querySelectorAll(".close-btn").forEach(btn => btn.onclick = closeAll);

    /* ================= SWITCH EMAIL ↔ PHONE ================= */
    phoneBtns.forEach(btn => {
        btn.onclick = () => {
            const mode = btn.dataset.mode;
            closeAll();

            if (mode === "phone") {
                popupPhoneLogin.classList.add("active");
                phoneBtns.forEach(setBtnToEmail);
            }

            if (mode === "email") {
                popupLogin.classList.add("active");
                phoneBtns.forEach(setBtnToPhone);
            }

            overlay.classList.add("active");
        };
    });

    /* ================= EMAIL LOGIN / REGISTER ================= */
    document.getElementById("toRegister").onclick = () => {
        authMode = 'register';
        popupLogin.classList.remove("active");
        popupRegister.classList.add("active");
    };

    document.getElementById("toLogin").onclick = () => {
        authMode = 'login';
        popupRegister.classList.remove("active");
        popupLogin.classList.add("active");
    };


    /* ================= PHONE LOGIN / REGISTER ================= */
    document.getElementById("toPhoneRegister").onclick = () => {
        authMode = 'register';
        popupPhoneLogin.classList.remove("active");
        popupPhoneRegister.classList.add("active");
    };

    document.getElementById("toPhoneLogin").onclick = () => {
        authMode = 'login';
        popupPhoneRegister.classList.remove("active");
        popupPhoneLogin.classList.add("active");
    };


    document.addEventListener('click', async (e) => {

        /* ================= EMAIL LOGIN / REGISTER ================= */
        if (e.target.closest('.enterConsole')) {
            e.preventDefault();

            activeEmail = null;

            emailInputs.forEach(input => {
                if (input.closest('.popup')?.classList.contains('active')) {
                    activeEmail = input.value.trim();
                }
            });

            if (!activeEmail || !isValidEmail(activeEmail)) {
                showErrorToast();
                return;
            }

            try {
                const url = authMode === 'register' ?
                    '/auth/register/email/request-otp' :
                    '/auth/login/email/request-otp';


                await post(url, {
                    email: activeEmail
                });



                document.querySelectorAll(".popup").forEach(p => p.classList.remove("active"));
                popupOtp.classList.add('active');
                overlay.classList.add('active');

                overlay.classList.add('active');
                showOtpToast();

            } catch (err) {
                alert(err.message || 'Failed to send OTP');
            }
        }

        /* ================= PHONE LOGIN / REGISTER ================= */
        if (e.target.closest('.phoneEnter')) {
            e.preventDefault();

            activeEmail = null;
            activePhone = null;

            document.querySelectorAll('.phoneInput').forEach(input => {
                if (input.closest('.popup')?.classList.contains('active')) {
                    activePhone = input.value.trim();
                }
            });

            if (!activePhone) {
                showErrorToast();
                return;
            }

            try {
                const url = authMode === 'register' ?
                    '/auth/register/phone/request-otp' :
                    '/auth/login/phone/request-otp';


                await post(url, {
                    phone: activePhone
                });



                document.querySelectorAll(".popup").forEach(p => p.classList.remove("active"));
                popupOtp.classList.add('active');
                overlay.classList.add('active');

                overlay.classList.add('active');
                showOtpToast();

            } catch (err) {
                alert(err.message || 'Failed send OTP');
            }
        }

    });

    /* ================= OTP SUBMIT ================= */
    const otpInput = popupOtp.querySelector('input');
    const verifyBtn = popupOtp.querySelector('.btn-enter');

    verifyBtn.onclick = async () => {
        const otp = otpInput.value.trim();

        if (!otp || otp.length < 4) {
            alert('Invalid OTP');
            return;
        }

        try {
            let url = null;
            let payload = {
                otp
            };

            if (activeEmail) {
                payload.email = activeEmail;
                url = authMode === 'register' ?
                    '/auth/register/email/verify-otp' :
                    '/auth/login/email/verify-otp';
            }

            if (activePhone) {
                payload.phone = activePhone;
                url = authMode === 'register' ?
                    '/auth/register/phone/verify-otp' :
                    '/auth/login/phone/verify-otp';
            }

            if (!url) {
                alert('AUTH STATE LOST (no email / phone)');
                return;
            }

            await post(url, payload);

            closeAll();
            window.location.reload();

        } catch (err) {
            alert(err.message || 'OTP verification failed');
        }
    };



    document.querySelectorAll('.btn-google').forEach(btn => {
        btn.onclick = () => {
            const w = 500;
            const h = 600;
            const y = window.top.outerHeight / 2 + window.top.screenY - (h / 2);
            const x = window.top.outerWidth / 2 + window.top.screenX - (w / 2);

            const url = authMode === 'register' ?
                '/auth/register/google' :
                '/auth/login/google';

            window.open(
                url,
                'googleLogin',
                `width=${w},height=${h},top=${y},left=${x}`
            );
        };
    });

    window.addEventListener('message', (e) => {
        if (e.data.type !== 'google-auth') return;

        if (e.data.status === 'not_registered') {
            alert('Account not registered. Please register first.');
            // buka popup REGISTER
            popupLogin.classList.remove('active');
            popupRegister.classList.add('active');
            overlay.classList.add('active');
            return;
        }

        // SUCCESS
        closeAll();
        window.location.reload();
    });

    /* ================= SETUP PROFILE MODAL ================= */

    function openSetupProfileModal() {
        loadProfileForSetup();
        document.getElementById('SetupProfileModal')?.classList.add('show');
        document.getElementById('overlay')?.classList.add('active');
    }


    function closeSetupProfileModal() {
        document.getElementById('SetupProfileModal')?.classList.remove('show');
        document.getElementById('overlay')?.classList.remove('active');
    }

    // skip setup profile
    document.getElementById('skipSetupProfile')?.addEventListener('click', () => {
        closeSetupProfileModal();
        window.location.reload();
    });

    // save setup profile
    document.getElementById('saveSetupProfile')?.addEventListener('click', async () => {
        const displayName = document.getElementById('setupDisplayNameInput').value.trim();
        const username = document.getElementById('setupUsernameInput').value.trim();

        try {
            await post('/auth/profile/complete', {
                display_name: displayName,
                username: username
            });
            window.location.reload();




        } catch (err) {
            alert(err.message || 'Failed to setup profile');
        }
    });

    /* ================= DELETE AVATAR ================= */

    function openSetupDeletePopup() {
        document.getElementById('setup-popup-delete')?.classList.add('show');
    }

    function closeSetupDeletePopup() {
        document.getElementById('setup-popup-delete')?.classList.remove('show');
    }

    function deleteSetupPhoto() {
        document.getElementById('setupProfileAvatar').src = '{{ asset('images/zeta.png') }}';
        closeSetupDeletePopup();
    }

    /* ================= AUTH SUCCESS HANDLER ================= */

    // OTP success
    const originalVerify = verifyBtn.onclick;
    verifyBtn.onclick = async () => {
        try {
            const otp = otpInput.value.trim();
            if (!otp) return alert('Invalid OTP');

            let payload = {
                otp
            };
            let url = null;

            if (activeEmail) {
                payload.email = activeEmail;
                url = authMode === 'register' ?
                    '/auth/register/email/verify-otp' :
                    '/auth/login/email/verify-otp';
            }

            if (activePhone) {
                payload.phone = activePhone;
                url = authMode === 'register' ?
                    '/auth/register/phone/verify-otp' :
                    '/auth/login/phone/verify-otp';
            }

            const res = await post(url, payload);

            closeAll();

            if (res.profile_completed === false) {
                openSetupProfileModal();
            } else {
                window.location.reload();
            }

        } catch (err) {
            alert(err.message || 'OTP verification failed');
        }
    };

    // Google success
    window.addEventListener('message', (e) => {
        if (e.data.type !== 'google-auth') return;

        closeAll();

        if (e.data.profile_completed === false) {
            openSetupProfileModal();
        } else {
            window.location.reload();
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
    integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
