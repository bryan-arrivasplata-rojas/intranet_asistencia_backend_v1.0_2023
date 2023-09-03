$(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip();
    var todosSonPrimary = $('.btn-service').toArray().every(function(element) {
        return $(element).hasClass('btn-primary');
    });
    if($('#text-end-service').hasClass('text-hide')){
        $('.btn-service').show();
        if (todosSonPrimary) {
            $('.btn-service').each(function() {
                if ($(this).data('name') !== 'Gestión') {
                    $(this).hide();
                }
            });
        }
    }else{
        $('.btn-service').hide();
    }
    var idDepartmentUser = $("#idDepartmentUser").text();
    var url_api = $("#app_url_api").text();
    $('.btn-service').on('click',function(){
        var self = this;
        var isGestion = $(this).data('name') === 'Gestión';
        var count_warning = $('.btn-service.btn-warning').length;
        var value_type = 0;
        if (isGestion) {
            if ($(this).hasClass("btn-warning")) {
                if(count_warning < 2){
                    value_type = 2;
                }else{
                    Swal.fire(
                        '¿Terminará su día con una actividad en proceso?',
                        'Por favor terminar su ultima actividad antes de finalizar.',
                        'question'
                    )
                    return;
                }
            } else {
                value_type = 1;
            }
        } else {
            if (count_warning < 2 || $(this).hasClass("btn-warning")) {
                if ($(this).hasClass("btn-primary")) {
                    value_type = 1;
                } else if ($(this).hasClass("btn-warning")) {
                    value_type = 2;
                }
            }else{
                Swal.fire(
                    '¿2 actividades simultaneas?',
                    'Termine primero su ultima actividad',
                    'question'
                )
                return;
            }
            
        }
        assistance(idDepartmentUser,value_type,$(this).data('id'),url_api)
        .then(function (success) {
            if (success) {
                if (isGestion) {
                    if(value_type===1){
                        $('.btn-service').show();
                        $(self).removeClass("btn-primary").addClass("btn-warning");
                    }else{
                        $('.btn-service').hide();
                        $(self).removeClass("btn-warning").addClass("btn-primary");
                        $('#text-end-service').removeClass('text-hide');
                    }
                }else{
                    if(value_type===1){
                        $(self).removeClass("btn-primary").addClass("btn-warning");
                    }else{
                        $(self).removeClass("btn-warning").addClass("btn-primary");
                    }
                }
                Swal.fire(
                    '!Registro exitoso!',
                    'Sin problemas, muchas gracias.',
                    'success'
                );
            } else {
                Swal.fire(
                    '!Problemas!',
                    'Error en la solicitud, prueba nuevamente mas tarde.',
                    'error'
                );
            }
        })
        .catch(function (error) {
            // Manejar el caso de error en la promesa
            console.error(error);
        });
    });
});
function assistance(departmentUser,type,service,url_api){
    if(type!=0){
        return new Promise(function(resolve, reject) {
            var dataToSend = {
                idDepartmentUser: departmentUser, // Reemplaza con el valor correcto
                idType: type, // Reemplaza con el valor correcto
                idService: service // Reemplaza con el valor correcto
            };
        
            // Realizar la solicitud AJAX
            $.ajax({
                url: url_api+"api/assistance",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(dataToSend),
                success: function(data) {
                    resolve(true);
                },
                error: function(xhr, status, error) {
                    resolve(false);
                }
            });
        });
    }
}