let dataTable = null; // Variable para almacenar la instancia de DataTables
document.addEventListener('livewire:init', function () {
    // Función para inicializar DataTables
    function initializeDataTable() {
        if (dataTable !== null) {
            dataTable.destroy();
        }
        if ($('.table-livewire tbody tr').length > 0) {
            dataTable = $('.table-livewire').DataTable({
                responsive: true,
                autoWidth: true,
                deferRender: true,
                order: [],
                "language": {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                columnDefs: [
                    {
                        targets: ':not(:first-child)', // Aplicar estilo a todas las columnas excepto la primera
                        className: 'text-center' // Aplicar estilo de centrado
                    }
                ],
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'custom-copy-button',
                        text: '<i class="bi bi-clipboard-heart-fill"></i> Copiar',
                        exportOptions: {
                            //columns: ':lt(4)' // Exporta solo las primeras 4 columnas
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'custom-excel-button',
                        text: '<i class="bi bi-file-earmark-pdf-fill"></i> Excel',
                        exportOptions: {
                            //columns: ':lt(4)' // Exporta solo las primeras 4 columnas
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'custom-pdf-button',
                        text: '<i class="bi bi-file-earmark-pdf-fill"></i> PDF',
                        exportOptions: {
                            //columns: ':lt(4)' // Exporta solo las primeras 4 columnas
                            columns: ':visible:not(:last-child)',
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'custom-csv-button',
                        text: '<i class="bi bi-file-earmark-excel-fill"></i> CSV',
                        exportOptions: {
                            //columns: ':lt(4)' // Exporta solo las primeras 4 columnas
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="bi bi-eye"></i> Visibilidad', // Agregar el ícono y el texto personalizado
                        className: 'custom-colvis-button' // Agregar clase personalizada
                    } // Agregar el botón de visibilidad de columnas
                ],
            });
        }
        
    }
    
    // Inicializar DataTables cuando Livewire termine de cargar la página
    initializeDataTable();
    
    // Escuchar eventos de Livewire para actualizar la tabla
    Livewire.on('tableUpdated', function () {
        setTimeout(function() {
            initializeDataTable();
            $('#table-report').removeClass('hide-table');
            $('#alert_time').show();
        }, 2000); // 1000 milisegundos = 1 segundo
        //Livewire.dispatch('fetchData');
    });
    if ($('#btn-mostrar-reporte')){
        var alert_hide = $('.alert_hide');
        var btnreporte = $('#btn-mostrar-reporte');
        var alert_error = $('#alert_error');
        var alert_time = $('#alert_time');
        btnreporte.hide();
        alert_error.hide();
        alert_hide.show();
        $('#idUser, #start_time, #end_time').on('input', function () {
            var idUser = $('#idUser').val();
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();
            options(idUser,start_time,end_time,btnreporte,alert_error,alert_time);
        });
        $('#btn-mostrar-reporte').on('click',function(){
            alert_error.hide();
            alert_hide.hide();
            //alert_time.show();
        });
    }
    function options(idUser,start_time,end_time,btnreporte,alert_error,alert_time){
        $('#table-report_wrapper').addClass('hide-table');
        alert_time.hide();
        if (idUser !== '' && start_time !== '' && end_time !== '') {
            if (end_time >= start_time) {
                btnreporte.show();
                alert_error.hide();
            }else{
                btnreporte.hide();
                alert_error.show();
            }
        }else{
            btnreporte.hide();
        }
    }
});
