if($('.dateInput').length>0){
    $('.dateInput').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        orientation: 'bottom', // Muestra el datepicker hacia abajo
        language: 'es'
    });
}