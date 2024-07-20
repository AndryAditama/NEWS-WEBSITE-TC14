// Fitur Live search kategori (admin)
inputPencarian = document.getElementById('table-search');

inputPencarian.addEventListener('keyup', function (event) {
    var filter;
    var status;
    var tbody;
    var tr;
    var td;

    filter = this.value.toUpperCase();
    tbody = document.getElementsByTagName('tbody')[0];
    tr = tbody.getElementsByTagName('tr');
    for (ib = 0; ib < tr.length; ib++) {
        td = tr[ib].getElementsByTagName('td');
        for (jb = 0; jb < td.length; jb++) {
            if (td[jb].innerHTML.toUpperCase().indexOf(filter) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[ib].style.display = '';
            status = false;
        } else {
            tr[ib].style.display = 'none';
        }
    }
});

setInterval(function () {
    $('#alert').fadeOut();
}, 300);

// // target element that will be dismissed
// const $targetEl = document.getElementById('alert');

// // optional trigger element
// const $triggerEl = document.getElementById('btn');

// // options object
// const options = {
//     transition: 'transition-opacity',
//     duration: 1000,
//     timing: 'ease-out',

//     // callback functions
//     onHide: (context, targetEl) => {
//         console.log('element has been dismissed');
//         console.log(targetEl);
//     },
// };

// // instance options object
// const instanceOptions = {
//     id: 'targetElement',
//     override: true,
// };
