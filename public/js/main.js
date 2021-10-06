// for calendar
$(function () {
    const months = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];

    $(".month").html(months[new Date().getMonth()]);
    $(".date").html(String(new Date().getDate()).padStart(2, '0'));
    $(".year").html(String(new Date().getFullYear()));
});

// for input img in addmenu
$(function () {
    $("#photo").on('change', function () {
        const nameFile = document.querySelector(".name-file");
        // rubah text content yang ada pd nameFile dengan nama files yg ada pada inputPhoto
        nameFile.textContent = this.files[0].name
    });
});

// view image payment
function showImage(element,i){
    // Get the modal
    let modal = document.getElementById('modal-payment-img');

    // Get the image and insert it inside the modal
    let imagePayment = document.getElementById('image-payment' +i);
    let modalImage = document.getElementById('show-image-payment');
        modal.style.display = "block";
        modalImage.src = element.src;
}

// button close image payment
$(".close").on('click', () => {
    $('#modal-payment-img').hide();
});

// modal detail
$(document).ready(function($) {
    $(".modal-detail").on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let modal = $(this);

        modal.find('.table-detail').load(button.data("remote"));
        modal.find('.modal-title').html(button.data("title"));
    })
});

// show hide button set status

