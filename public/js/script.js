// // Fitur Live search kategori (admin)
// // inputPencarian = document.getElementById('table-search');

// // inputPencarian.addEventListener('keyup', function (event) {
// //     var filter;
// //     var status;
// //     var tbody;
// //     var tr;
// //     var td;

// //     filter = this.value.toUpperCase();
// //     tbody = document.getElementsByTagName('tbody')[0];
// //     tr = tbody.getElementsByTagName('tr');
// //     for (ib = 0; ib < tr.length; ib++) {
// //         td = tr[ib].getElementsByTagName('td');
// //         for (jb = 0; jb < td.length; jb++) {
// //             if (td[jb].innerHTML.toUpperCase().indexOf(filter) > -1) {
// //                 status = true;
// //             }
// //         }
// //         if (status) {
// //             tr[ib].style.display = '';
// //             status = false;
// //         } else {
// //             tr[ib].style.display = 'none';
// //         }
// //     }
// // });

// // set icon visible/invicible password text
// var check = document.querySelector('#password-check'); //get toggle on/off password
// var icon = document.querySelector('#eye-icon'); //get icon on/off password
// var form = document.querySelector('#password'); //get form input password

// //set event saat toggle on/off diklik
// check.addEventListener('click', function () {
//     //cek kondisi toggle
//     if (check.checked == true) {
//         //set perilaku elemen jika toggle on
//         icon.setAttribute('name', 'eye-off'); //mengubah nama icon menjadi off
//         form.setAttribute('type', 'text'); //mengubah type input menjadi text
//     } else {
//         //set perilaku elemen jika toggle on
//         icon.setAttribute('name', 'eye'); //mengubah nama icon menjadi on
//         form.setAttribute('type', 'password'); //mengubah type input menjadi password
//     }
// });

// //
