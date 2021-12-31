$(document).ready(function () {
    /**
     * Set laravel csrf token for ajax post calls start
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /**
     * Set laravel csrf token for ajax post calls end
     */

    /**
     * Set toaster default options start
     * @type {{closeButton: boolean, debug: boolean, newestOnTop: boolean, progressBar: boolean, positionClass: string, preventDuplicates: boolean, onclick: null, extendedTimeOut: string, showDuration: string, showEasing: string, hideEasing: string, showMethod: string, hideMethod: string}}
     */
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "extendedTimeOut": "1000",
        "showDuration": "10",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    /**
     * Set toaster default options end
     */

    /**
     * Set form validation default errors start
     */
    $('.form').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    /**
     * Set form validation default errors end
     */

    /**
     * Set datatable default options start
     */
    $('#defaultDatatable').DataTable({
        "lengthMenu": [[ 10, 25, 50, 100, -1 ], [10, 25, 50, 100, "All"]],
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "order": [],
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    });
    /**
     * Set datatable default options end
     */

    /**
     * show alert on clicking delete button in listing start
     */
    $('.deleteItem').on('click', function (event) {
        if (!confirm('Are you sure to delete this Item?')) {
            event.preventDefault();
            return;
        }
    });
    /**
     * show alert on clicking delete button in listing end
     */

    /**
     * Initialize Select2 Elements start
     */
    $('.select2').select2();
    /**
     * Initialize Select2 Elements end
     */

    /**
     * enable submit button if form is valid or else disable button start
     */
    $('form').submit(function(){
        if($(this).valid() && $(this).find(':submit').val() === '') {
            $(this).find(':submit').prop('disabled', true);
        } else {
            $(this).find(':submit').removeAttr('disabled');
        }
    });
    /**
     * enable submit button if form is valid or else disable button end
     */

    /**
     * Datalist with multiselect in cd_number_csv field start, insert custom entered values by user in list
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    let input = $('#cd_numbers_csv');
    if(input[0] !== undefined) {
        // Datalist with multiselect start
        let datalist = jQuery('datalist');
        let options = jQuery('datalist option');
        let optionsarray = jQuery.map(options ,function(option) {
            return option.value;
        });
        let inputcommas = (input.val().match(/,/g)||[]).length;
        let separator = ',';

        input.bind("change paste keyup",function() {
            var inputtrim = input.val().replace(/^\s+|\s+$/g, "");
            var currentcommas = (input.val().match(/,/g)||[]).length;
            if (inputtrim != input.val()) {
                if (inputcommas != currentcommas) {
                    let lsIndex = inputtrim.lastIndexOf(separator);
                    let str = (lsIndex != -1) ? inputtrim.substr(0, lsIndex)+", " : "";
                    filldatalist(str);
                    inputcommas = currentcommas;
                }
                input.val(inputtrim);
            }
        });

        /**
         * add value to datalist in input field
         * @param prefix
         */
        function filldatalist(prefix) {
            if (input.val().indexOf(separator) > -1 && options.length > 0) {
                datalist.empty();
                for (i=0; i < optionsarray.length; i++ ) {
                    if (prefix.indexOf(optionsarray[i]) < 0 ) {
                        datalist.append('<option value="'+prefix+optionsarray[i]+'">');
                    }
                }
            }
        }
    }
    /**
     * Datalist with multiselect start in cd_number_csv field start, insert custom entered values by user in list
     */

    /**
     * search rma_numbers_csv from DB start
     * @type {string}
     */
    let table = '';
    $('#modal_search').on('click', function () {
        let query = $('#search_query').val();
        if(table !== '') {
            table.rows('.selected').deselect();
        }
        // call api if search query is not empty
        if(query !== '') {
            $.ajax({
                url: '/rma/api/get-rmas/'+query,
                method: 'Get',
                success: function (data) {
                    // table.data(data.item.data);
                    table = $('#modalDatatable').DataTable({
                        data:  data.item.data,
                        bPaginate: false,
                        searching: false,
                        destroy : true,
                        bInfo: false,
                        select: "multiple",
                        columns: [
                            {
                                data: "id"
                            },
                            {
                                data: "customer"
                            },
                            {
                                data: "rma_number"
                            }
                        ]
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
    $('#modalDatatable tbody').on('click', 'tr', function () {
        let selected_row = table.row(this);
        let data = selected_row.data();

        let txt = data.rma_number;
        let optionExists = ($('#rma_numbers_csv option[value="' + data.rma_number + '"]').length > 0);

        if(!($(this).hasClass('selected')) && optionExists) {
            $('#rma_numbers_csv option[value="' + data.rma_number +'"]').prop('selected', true).trigger('change');
        } else if(!($(this).hasClass('selected')) && !optionExists) {
            $('#rma_numbers_csv').append($('<option></option>')
                .attr('value', ''+data.rma_number +'')
                .text(txt)
                .prop('selected', true));
        } else {
            $('#rma_numbers_csv option[value="' + data.rma_number+'"]').prop('selected', false).trigger('change');
        }
    });
    /**
     * search rma_numbers_csv from DB end
     */

});

/**
 * Validate value in textarea
 * @param event
 * @param form
 * @param field
 */
function validateDescription(event, form, field) {
    let regx = /^[a-zA-Z0-9\s?@()'!,+\-=_:.&*%]+$/;
    let input_field = $('#'+field).val();
    if(input_field !== "") {
        if (regx.test(input_field)) {
            $('#'+field).valid();
        } else {
            $("#"+form).validate().showErrors({ [field]: "InValid Format!" });
            event.preventDefault();
        }
    }
}
