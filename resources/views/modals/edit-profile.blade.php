<style>
* {
  font-family: "Manrope", sans-serif; 
  box-sizing: border-box;
}

.overlay-profile{
    display: none;  
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);           
  align-items: center;
  justify-content: center;
}

.overlay-profile.show {
  display: flex;
}

.modal {
  background: #1E1E21;
  width: 420px;
  padding: 24px;
  border-radius: 20px;
  color: #fff;
  text-align: center;
}

.modal h2 {
  margin-bottom: 20px;
}



.avatar-wrapper {
  position: relative;
  width: 150px;
  height: 150px;
  margin: 0 auto 30px;
}

/* FOTO */
.avatar {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  display: block;
  filter: brightness(0.8);
}

.fa-camera{
    font-size: 22px;
    color: rgb(213, 212, 212);
}

.camera-btn {
  position: absolute;
  bottom: -10px;    
  right: 10px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #111;
  border: 1px solid #5a5a5a;
  color: white;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.3s;
}

.camera-btn:hover {
  border-color: transparent;
  background: #343434;
  transform: scale(1.1);
}

.delete-btn {
  position: absolute;
   bottom: -10px;    
  left: 10%;
  background: transparent;
  border: none;
  background: #111;
  color: #c92222;
  border: 1px solid #505050;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  cursor: pointer;
  transition: 0.3s;
}

.delete-btn:hover{
  border-color: transparent;
  color: #f3f3f3;
  background: #c90b0b;
  transform: scale(1.1);

}

.fa-trash-can{
    font-size: 18px;
}

.form-group {
  text-align: left;
  margin-bottom: 16px;
}

.form-group label {
    display: flex;
    margin-bottom: 10px;
  font-size: 14px;
  color: #aaa;
  font-weight: 500;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #444;
  background: #2a2a2a;
  color: #fff;
  display: flex;
  font-size: 15px;
}

.actions {
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-top: 20px;
}

.btn {
  padding: 10px 24px;
  border-radius: 20px;
  width: 100px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn:hover{
    background-color: #2e2e2e;
    color: #efefef;
}

.cancel {
  background: #3A3A3A;
  color: #e1dfdf;
  font-size: 15px;
  font-weight: 800;
}

.save {
  background: #efefef;
  color: #1E1E21;
  border: 1px solid rgb(182, 182, 182);
  font-size: 15px;
  font-weight: 700;
}

.save:hover{
    background: #1E1E21;
}

.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.popup-box {
  background: #1e1e21;
  padding: 20px;
  border-radius: 10px;
  width: 320px;
  text-align: left;
}

.popup-box p {
  margin-bottom: 20px;
  font-size: 16px;
    color: #f6f1f1;
}

.popup-actions {
  display: flex;
  justify-content: space-between;
}

.btn-no {
  all: unset;
  padding: 8px 14px;
  border-radius: 12px;
  color: #efefef;
  cursor: pointer;
  position: relative;
  left: 45%;
  transition: 0.3s ease;
}

.btn-no:hover {
  background-color: #333335;
}

.btn-delete {
  background: #e53935;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 11px;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-delete:hover{
  background-color: #c62c2a;
}
</style>

<body>


    <div class="overlay-profile" id="editProfileModal" >
  <div class="modal">   
    <h2>Edit Profile</h2>

    
    <div class="avatar-wrapper">
      <img src="{{ Asset('images/zeta.png') }}" alt="Profile" class="avatar">
      <button class="camera-btn"> <i class="fa-regular fa-camera"></i></button>
      <button class="delete-btn"  onclick="openPopup()"> <i class="fa-regular fa-trash-can"></i> </button>
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

