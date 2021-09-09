// Javascript Untuk Detail User pada Menu Karyawan
var btn_edit_profil_kar = document.getElementsByClassName('btn_edit_profile_kar')[0];
var btn_edit_simpan_kar = document.getElementById("btn_edit_simpan_kar");
var fullname_kar = document.getElementById("detail_fullname_kar");
var email_kar = document.getElementById("detail_email_kar");
var jenis_kelamin_kar = document.getElementById("detail_jenis_kelamin_kar");
var tgl_lahir_kar = document.getElementById("detail_tgl_lahir_kar");
var phone_kar = document.getElementById("detail_phone_kar");
fullname_kar.disabled = true;
email_kar.disabled = true;
jenis_kelamin_kar.disabled = true;
tgl_lahir_kar.disabled = true;
phone_kar.disabled = true;
btn_edit_simpan_kar.style.visibility = 'hidden';

btn_edit_profil_kar.addEventListener('click', function(event) {
    fullname_kar.disabled = !fullname_kar.disabled;
    email_kar.disabled = !email_kar.disabled;
    jenis_kelamin_kar.disabled = !jenis_kelamin_kar.disabled;
    tgl_lahir_kar.disabled = !tgl_lahir_kar.disabled;
    phone_kar.disabled = !phone_kar.disabled;
    if (btn_edit_simpan_kar.style.visibility == 'hidden') {
        btn_edit_simpan_kar.style.visibility = 'visible';
      } else {
        btn_edit_simpan_kar.style.visibility = 'hidden';
      }
});
// =====================================================
