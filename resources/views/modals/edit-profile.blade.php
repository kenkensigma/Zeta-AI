<style>
    /* ================= THEME VARIABLES ================= */
    :root {
        --bg-main: #050505;
        --bg-panel: #1e1e21;
        --bg-input: #2a2a2a;
        --bg-hover: #333335;

        --text-main: #ffffff;
        --text-muted: #aaa;

        --border-color: #444;
        --danger: #e53935;
        --danger-hover: #c62c2a;
    }

    /* LIGHT MODE */
    html[data-theme="light"] {
        --bg-main: #ffffff;
        --bg-panel: #f3f3f3;
        --bg-input: #e9e9e9;
        --bg-hover: #dddddd;

        --text-main: #000;
        --text-muted: #666;

        --border-color: #ccc;
    }

    /* ================= RESET ================= */
    * {
        font-family: "Manrope", sans-serif;
        box-sizing: border-box;
    }

    /* ================= OVERLAY ================= */
    .overlay-profile {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .overlay-profile.show {
        display: flex;
    }

    /* ================= MODAL ================= */
    .modal {
        background: var(--bg-panel);
        width: 420px;
        padding: 24px;
        border-radius: 20px;
        color: var(--text-main);
        text-align: center;
    }

    .modal h2 {
        margin-bottom: 20px;
    }

    /* ================= AVATAR ================= */
    .avatar-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 30px;
    }

    .avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        filter: brightness(0.85);
    }

    /* CAMERA BUTTON */
    .camera-btn {
        position: absolute;
        bottom: -10px;
        right: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        color: var(--text-main);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .camera-btn:hover {
        background: var(--bg-hover);
        transform: scale(1.1);
    }

    /* DELETE AVATAR */
    .delete-btn {
        position: absolute;
        bottom: -10px;
        left: 10%;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        color: var(--danger);
        cursor: pointer;
        transition: 0.3s;
    }

    .delete-btn:hover {
        background: var(--danger);
        color: #fff;
        transform: scale(1.1);
    }

    /* ================= FORM ================= */
    .form-group {
        text-align: left;
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .form-group input {
        width: 100%;
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        background: var(--bg-input);
        color: var(--text-main);
        font-size: 15px;
        outline: none;
    }

    .form-group input:focus {
        border-color: var(--text-main);
    }

    /* ================= ACTION BUTTONS ================= */
    .actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 24px;
        border-radius: 20px;
        width: 110px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 700;
    }

    /* CANCEL */
    .btn.cancel {
        background: var(--bg-hover);
        color: var(--text-main);
    }

    .btn.cancel:hover {
        opacity: 0.85;
    }

    /* SAVE */
    .btn.save {
        background: var(--text-main);
        color: var(--bg-main);
    }

    .btn.save:hover {
        background: var(--bg-main);
        color: var(--text-main);
        border: 1px solid var(--border-color);
    }

    /* ================= DELETE CONFIRM POPUP ================= */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1100;
    }

    .popup-box {
        background: var(--bg-panel);
        padding: 20px;
        border-radius: 14px;
        width: 320px;
        color: var(--text-main);
    }

    .popup-box p {
        margin-bottom: 20px;
        font-size: 15px;
    }

    /* POPUP ACTIONS */
    .popup-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* NO BUTTON */
    .btn-no {
        background: transparent;
        color: var(--text-muted);
        padding: 8px 14px;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-no:hover {
        background: var(--bg-hover);
        color: var(--text-main);
    }

    /* DELETE BUTTON */
    .btn-delete {
        background: var(--danger);
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-delete:hover {
        background: var(--danger-hover);
    }
</style>


<body>


    <div class="overlay-profile" id="editProfileModal">
        <div class="modal">
            <h2>Edit Profile</h2>


            <div class="avatar-wrapper">
                <img src="{{ Asset('images/zeta.png') }}" alt="Profile" class="avatar">
                <button class="camera-btn"> <i class="fa-regular fa-camera"></i></button>
                <button class="delete-btn" onclick="openPopup()"> <i class="fa-regular fa-trash-can"></i> </button>
            </div>


            <div class="form-group">
                <label>Display Name</label>
                <input type="text" placeholder="Enter Display Name" value="sok asik li ubah profile">
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" placeholder="Enter Username" value="mentang mentang gak bisa masukin foto">
            </div>


            <div class="actions">
                <button class="btn cancel" onclick="closeModal()">Cancel</button>
                <button class="btn save">Save</button>
            </div>
        </div>
    </div>

    <div class="popup-overlay" id="popup-delete">
        <div class="popup-box">
            <p>Are you sure you want to delete your profile photo?</p>
            <div class="popup-actions">
                <button class="btn-no" onclick="closePopup()">Cancel</button>
                <button class="btn-delete" onclick="deletePhoto()">Delete</button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("editProfileModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("editProfileModal").classList.remove("show");
        }

        function openPopup() {
            document.getElementById("popup-delete").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popup-delete").style.display = "none";
        }

        function deletePhoto() {
            alert("profile photo successfully deleted");
            closePopup();


        }
    </script>
