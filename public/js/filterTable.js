document.addEventListener('livewire:init', function () {
    if (dataTable) {
        function applyDataTableFilterRol(filterValue,valor_filter) {
            if (dataTable !== null) {
                dataTable.column(valor_filter).search(filterValue).draw(); // 5 representa la columna del Rol en DataTables
            }
        }
        function applyDataTableFilterState(filterValue,valor_filter) {
            if (dataTable !== null) {
                dataTable.column(valor_filter).search(filterValue).draw(); // 5 representa la columna del Rol en DataTables
            }
        }
        if ($('#idRol').length > 0) {
            $('#idRol').on('change', function () {
                const selectedValue = $(this).val();
                applyDataTableFilterRol(selectedValue, 5); // 5 representa la columna del Rol en DataTables
            });
        }
    
        // Escuchar el evento de cambio en el select de Estado
        if ($('#idState').length > 0) {
            $('#idState').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idState').data('filter')=='profiles'){
                    valor_filter = 6;
                }else if($('#idState').data('filter')=='areas'){
                    valor_filter = 3;
                }else if($('#idState').data('filter')=='departments'){
                    valor_filter = 4;
                }else if($('#idState').data('filter')=='department_users'){
                    valor_filter = 4;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
        if ($('#idArea').length > 0) {
            $('#idArea').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idArea').data('filter')=='departments'){
                    valor_filter = 3;
                }else if($('#idArea').data('filter')=='assistances'){
                    valor_filter = 1;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
        if ($('#idUser').length > 0) {
            $('#idUser').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idUser').data('filter')=='department_users'){
                    valor_filter = 3;
                }else if($('#idUser').data('filter')=='assistances'){
                    valor_filter = 3;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
        if ($('#idTime').length > 0) {
            $('#idTime').on('change', function () {
                const selectedValue = $(this).val();
                applyDataTableFilterRol(selectedValue, 5); // 5 representa la columna del Rol en DataTables
            });
        }
        if ($('#idDepartment').length > 0) {
            $('#idDepartment').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idDepartment').data('filter')=='department_users'){
                    valor_filter = 1;
                }else if($('#idDepartment').data('filter')=='assistances'){
                    valor_filter = 2;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
        if ($('#idType').length > 0) {
            $('#idType').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idType').data('filter')=='assistances'){
                    valor_filter = 4;
                }else if($('#idType').data('filter')=='report_user'){
                    valor_filter = 3;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
        if ($('#idService').length > 0) {
            $('#idService').on('change', function () {
                const selectedValue = $(this).val();
                var valor_filter = 0;
                if($('#idService').data('filter')=='assistances'){
                    valor_filter = 5;
                }else if($('#idType').data('filter')=='report_user'){
                    valor_filter = 4;
                }
                applyDataTableFilterState(selectedValue, valor_filter); // 6 representa la columna del Estado en DataTables
            });
        }
    }
});