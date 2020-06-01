// main.js

$("#top-stars").click(function () {
    $(".stars-wrapper").toggle(400);
    $("#expand-stars").toggleClass('active');

});

$("#top-price").click(function () {
    $(".price-wrapper").toggle(400);
    $("#expand-price").toggleClass('active');

});

$("#top-discount").click(function () {
    $(".discount-wrapper").toggle(400);
    $("#expand-discount").toggleClass('active');

});


$(".sidebar-dropdown > a").click(function () {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
            .parent()
            .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});

$("#close-sidebar").click(function () {
    $(".sidebar-wrapper-big").removeClass("toggled");
});
$("#show-sidebar").click(function () {
    $(".sidebar-wrapper-big").addClass("toggled");
});




$(document).ready(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});


$('.card').on('click', function (e) {
    e.preventDefault();
    $('.card').removeClass('active');
    $(this).addClass('active');
    $('.form').stop().slideUp();
    $('.form').delay(300).slideDown();
});


$('.open-payment-modal').click(function() {
    $('.modal-page-wrapper').show();
    $('.container-payment-modal').fadeIn(300);
});

$('.modal-page-wrapper').click(function () {
    $('.modal-page-wrapper').hide();
    $('.container-payment-modal').fadeOut(300);
});

// $('.invoice-modal-btn').click(function () {
//     $('.modal-page-wrapper').show();
//     $('.invoice-box').fadeIn(300);
// });

$('.modal-page-wrapper').click(function () {
    $('.modal-page-wrapper').hide();
    $('.invoice-box').fadeOut(300);
});




