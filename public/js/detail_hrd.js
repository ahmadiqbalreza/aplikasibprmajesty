
// Javascript Untuk Detail User pada Menu HRD
var btn_edit_profil = document.getElementsByClassName('btn_edit_profile')[0];
var btn_edit_simpan = document.getElementById("btn_edit_simpan");
var id_karyawan = document.getElementById("detail_id_karyawan");
var fullname = document.getElementById("detail_fullname");
var username = document.getElementById("detail_username");
var department = document.getElementById("detail_department");
var role = document.getElementById("detail_role");
var status_karyawan = document.getElementById("detail_status_karyawan");
var email = document.getElementById("detail_email");
var jenis_kelamin = document.getElementById("detail_jenis_kelamin");
var tgl_lahir = document.getElementById("detail_tgl_lahir");
var phone = document.getElementById("detail_phone");

id_karyawan.disabled = true;
fullname.disabled = true;
username.disabled = true;
department.disabled = true;
role.disabled = true;
status_karyawan.disabled = true;
email.disabled = true;
jenis_kelamin.disabled = true;
tgl_lahir.disabled = true;
phone.disabled = true;
btn_edit_simpan.style.visibility = 'hidden';

btn_edit_profil.addEventListener('click', function(event) {
    id_karyawan.disabled = !id_karyawan.disabled;
    fullname.disabled = !fullname.disabled;
    username.disabled = !username.disabled;
    department.disabled = !department.disabled;
    role.disabled = !role.disabled;
    status_karyawan.disabled = !status_karyawan.disabled;
    email.disabled = !email.disabled;
    jenis_kelamin.disabled = !jenis_kelamin.disabled;
    tgl_lahir.disabled = !tgl_lahir.disabled;
    phone.disabled = !phone.disabled;
    if (btn_edit_simpan.style.visibility == 'hidden') {
        btn_edit_simpan.style.visibility = 'visible';
      } else {
        btn_edit_simpan.style.visibility = 'hidden';
      }
});
// =====================================================

