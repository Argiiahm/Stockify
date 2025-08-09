// Staff STock
function ConfirmMasukStock() {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Terima Barang ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("form-masuk-stock").submit();
        }
    });
}
function ConfirmTolakStock() {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Tolak Barang ini?!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("form-tolak-stock").submit();
        }
    });
}

//End Staff Stock


// function ConfirmHapus() {
//     event.preventDefault();
//     Swal.fire({
//         title: "Are you sure?",
//         text: "Delete?!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, confirm",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.getElementById("form-delete").submit();
//         }
//     });
// }
function ConfirmHapusAtt() {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Delete?!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("form-delete-Att").submit();
        }
    });
}
function ConfirmHapusProduct() {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Delete?!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("form-delete-product").submit();
        }
    });
}