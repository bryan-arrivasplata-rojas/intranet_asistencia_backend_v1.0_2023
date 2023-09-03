setTimeout(function () {
    // Closing the alert
    if (!$('.alert').hasClass('alerta')) {
        $('.alert').alert('close');
    }
    $('.alert_hide').alert('close');
}, 5000);