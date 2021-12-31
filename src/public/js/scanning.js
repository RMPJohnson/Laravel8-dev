$(document).ready(function () {

    enableDisableSubmitBtn();

    /**
     * For update, check manifest_number exist
     */
    if($("#manifest_number").val() !== '' && $("#manifest_number").val() !== undefined) {
        checkManifestNumber($("#manifest_number").val());
    }

    $('#damaged').val('');
    $('#missing_accessories').val('');

    $('#scanLubForm').validate();

    /**
     * hide/show blocks on change in input field 'manifest_number' start
     */
    $('#manifest_number').on('input',function () {
        $(".manifest_number_search").removeClass('d-none');
        $(".manifest_number_hold").addClass('d-none');
        hideAllBelowManifestNumber();
    });
    /**
     * hide/show blocks on change in input field 'manifest_number' end
     */

    /**
     * hide/show blocks on change in input field 'model_number' start
     */
    $('#model_number').on('input',function () {
        $(".model_number_search").removeClass('d-none');
        $(".model_number_hold").addClass('d-none');
        hideAllBelowModelNumber();
    });
    /**
     * hide/show blocks on change in input field 'model_number' end
     */

    /**
     * check validity of 'manifest_number' start
     */
    $(".manifest_number_search").on('click', function () {
        let manifest_num = $("input[name='manifest_number']").val();
        console.log(manifest_num);
        if(manifest_num !== '') {
            checkManifestNumber(manifest_num);
        }
    });
    /**
     * check validity of 'manifest_number' end
     */

    /**
     * check validity of 'model_number' start
     */
    $(".model_number_search").on('click', function () {
        let model_num = $("input[name='model_number']").val();
        if(model_num !== '') {
            checkModelNumber(model_num);
        }
    });
    /**
     * check validity of 'model_number' end
     */

    /**
     * on change in damaged input field start
     */
    $("#damaged").on('keyup', function () {
        let damaged = $(this).val();
        enableDisableSubmitBtn();
        if(damaged !== '') {
            $(".missing_accessories_box").addClass('d-none');
            $(".damaged_hold").removeClass('d-none');
        }
        if(damaged === '') {
            $(".missing_accessories_box").removeClass('d-none');
            $(".damaged_hold").addClass('d-none');
        }
    });
    /**
     * on change in damaged input field end
     */

    /**
     * on change in missing_accessories input field start
     */
    $("#missing_accessories").on('keyup', function () {
        let missing_accessories = $(this).val();
        enableDisableSubmitBtn();
        if(missing_accessories !== '') {
            $(".missing_accessories_hold").removeClass('d-none');
        }
        if(missing_accessories === '') {
            $(".missing_accessories_hold").addClass('d-none');
        }
    });
    /**
     * on change in missing_accessories input field start
     */

    /**
     * handle logic on clicking hold button start
     */
    $(".hold").on('click', function () {
        let data_type = $(this).attr('data-type');
        let manifest_number = $("#manifest_number").val();
        let model_number = $("#model_number").val();
        let description = "model number: "+model_number+" for manifest number: "+manifest_number;
        let key = data_type+"_number";
        let value = $("#"+key).val();
        let hold_form = {};
        if(data_type === "manifest" || data_type === "model") {
            let desc = "bad "+data_type+" number :"+value;
            if(data_type === "model") {
                desc = "bad "+description;
            }
            hold_form = {
                description: desc,
                [key]: value,
                loading_unit_bundle_id: parseInt($("#loading_unit_bundle_id").val())
            };
        } else {
            let des = data_type.replace(/_/gi,' ');
            hold_form = {
                description: description+" is "+des+": "+$("#"+data_type).val(),
                model_number: model_number,
                manifest_number: manifest_number,
                loading_unit_bundle_id: parseInt($("#loading_unit_bundle_id").val())
            };
        }
        $.ajax({
            url: "/scanning/api/hold-scan",
            type: "POST",
            data: hold_form,
            success: function(data) {
                if(data.status === 'success') {
                    console.log(window.location.origin + data.item);
                    window.location.href = window.location.origin + data.item;
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    /**
     * handle logic on clicking hold button end
     */
});

/**
 * Check if manifest_num is valid by calling API
 * @param manifest_num
 */
function checkManifestNumber(manifest_num) {
    let form_data = {
        "manifest_number": manifest_num
    };
    $.ajax({
        url: "/scanning/api/check-manifest-num",
        type: 'post',
        dataType: 'json',
        data: form_data,
        success: function(data){
            if(data.item !== null) {
                let item = data.item;

                fillManifest(item);

                $(".manifest").removeClass('d-none');
                $(".model_number_box").removeClass('d-none');
                $(".serial_number_box").removeClass('d-none');

                if($("#model_number").val() !== '' && $("#model_number").val() !== undefined) {
                    checkModelNumber($("#model_number").val());
                }
            } else {
                $(".manifest_number_search").addClass('d-none');
                $(".manifest_number_hold").removeClass('d-none');
                hideAllBelowManifestNumber();
            }
        },
        error: function (error) {
            $(".manifest_number_search").addClass('d-none');
            $(".manifest_number_hold").removeClass('d-none');
            hideAllBelowManifestNumber();
        }
    });
}

/**
 * Check if model_num is valid by calling API
 * @param model_num
 */
function checkModelNumber(model_num) {
    let form_data = {
        "_token": $('meta[name="_token"]').attr('content'),
        "model_number": model_num
    };
    $.ajax({
        url: "/scanning/api/check-model-num",
        type: 'post',
        dataType: 'json',
        data: form_data,
        success: function(data){
            if(data.item !== null) {
                let item = data.item;

                fillProduct(item);

                $(".product").removeClass('d-none');
                $(".damaged_box").removeClass('d-none');
                $(".missing_accessories_box").removeClass('d-none');

                enableDisableSubmitBtn();
            } else {
                $(".model_number_search").addClass('d-none');
                $(".model_number_hold").removeClass('d-none');
                hideAllBelowModelNumber();
            }
        },
        error: function (error) {
            $(".model_number_search").addClass('d-none');
            $(".model_number_hold").removeClass('d-none');
            hideAllBelowModelNumber();
        }
    });
}

/**
 * Fill and show section below manifest number if manifest_num is valid
 * @param item
 */
function fillManifest(item) {
    $(".actual_id").text(item.actual_id);
    $(".id").text(item.id);
    $(".type").text(item.type);
    $(".state").text(item.state);
    $(".inventoryLocation").text('PK');
    $(".receiver_doc_id").text(item.receiver_doc_id);
    $(".scanned_quantity").text(item.scanned_quantity);
    $(".quantity").text(item.quantity);
    $("#loading_unit_bundle_id").val(item.inventory_id);
    $('#text_inventory_id').val(item.inventory_id);
    $('#text_loading_unit_bundle_id').val(item.id);
    $('#text_assembled_from_material_id').val(1);
}

/**
 * * Fill and show section below model number if model_num is valid
 * @param item
 */
function fillProduct(item) {
    $(".name").text(item.title);
    $(".category").text(item.category);
    $(".brand").text(item.brand);
    $(".upc_number").text(item.upc_number);
    $('#text_name').val(item.title);
}

/**
 * Hide all sections below manifest number input field
 */
function hideAllBelowManifestNumber() {
    $('.manifest').addClass('d-none');
    $('.model_number_box').addClass('d-none');
    $('.serial_number_box').addClass('d-none');
    $('.product').addClass('d-none');
    $('.damaged_box').addClass('d-none');
    $('.missing_accessories_box').addClass('d-none');
    $(':input[type="submit"]').prop('disabled', true);
}

/**
 * Hide all below model number input field
 */
function hideAllBelowModelNumber() {
    $('.product').addClass('d-none');
    $('.damaged_box').addClass('d-none');
    $('.missing_accessories_box').addClass('d-none');
    $(':input[type="submit"]').prop('disabled', true);
}

/**
 * Enable/Disable submit button based on data inside form
 */
function enableDisableSubmitBtn() {
    if(($("#damaged").val() === '')
        && ($("#missing_accessories").val() === '')
        && ($("#model_number").val() !== '')
        && ($("#manifest_number").val() !== '')) {
        $(':input[type="submit"]').prop('disabled', false);
    } else {
        $(':input[type="submit"]').prop('disabled', true);
    }
}