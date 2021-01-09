$(document).ready(function () {
    var hrgS = document.getElementById('hrgS');
    var hrgM = document.getElementById('hrgM');
    var hrgL = document.getElementById('hrgL');
    var hrgXL = document.getElementById('hrgXL');
    var hrgXXL = document.getElementById('hrgXXL');


    // $('#S').on('keyup', function () {
    $('#jmlS').val(S.value * hrgS.value);
    $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
    $('#htS').html('Rp. ' + S.value * hrgS.value);
    $('#ptot').html('Total : ');
    $('#httot').html('Rp. ' + total.value);
    // });

    // $('#M').on('keyup', function () {
    $('#jmlM').val(M.value * hrgM.value);
    $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
    $('#htM').html('Rp. ' + M.value * hrgM.value);
    $('#ptot').html('Total : ');
    $('#httot').html('Rp. ' + total.value);
    // });

    // $('#L').on('keyup', function () {
    $('#jmlL').val(L.value * hrgL.value);
    $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
    $('#htL').html('Rp. ' + L.value * hrgL.value);
    $('#ptot').html('Total : ');
    $('#httot').html('Rp. ' + total.value);
    // });

    // $('#XL').on('keyup', function () {
    $('#jmlXL').val(XL.value * hrgXL.value);
    $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
    $('#htXL').html('Rp. ' + XL.value * hrgXL.value);
    $('#ptot').html('Total : ');
    $('#httot').html('Rp. ' + total.value);
    // });

    // $('#XXL').on('keyup', function () {
    $('#jmlXXL').val(XXL.value * hrgXXL.value);
    $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
    $('#htXXL').html('Rp. ' + XXL.value * hrgXXL.value);
    $('#ptot').html('Total : ');
    $('#httot').html('Rp. ' + total.value);
    // });


    $('#S').on('change', function () {
        $('#jmlS').val(S.value * hrgS.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htS').html('Rp. ' + S.value * hrgS.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#M').on('change', function () {
        $('#jmlM').val(M.value * hrgM.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htM').html('Rp. ' + M.value * hrgM.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#L').on('change', function () {
        $('#jmlL').val(L.value * hrgL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htL').html('Rp. ' + L.value * hrgL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#XL').on('change', function () {
        $('#jmlXL').val(XL.value * hrgXL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htXL').html('Rp. ' + XL.value * hrgXL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#XXL').on('change', function () {
        $('#jmlXXL').val(XXL.value * hrgXXL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htXXL').html('Rp. ' + XXL.value * hrgXXL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#S').on('keyup', function () {
        $('#jmlS').val(S.value * hrgS.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htS').html('Rp. ' + S.value * hrgS.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#M').on('keyup', function () {
        $('#jmlM').val(M.value * hrgM.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htM').html('Rp. ' + M.value * hrgM.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#L').on('keyup', function () {
        $('#jmlL').val(L.value * hrgL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htL').html('Rp. ' + L.value * hrgL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#XL').on('keyup', function () {
        $('#jmlXL').val(XL.value * hrgXL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htXL').html('Rp. ' + XL.value * hrgXL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

    $('#XXL').on('keyup', function () {
        $('#jmlXXL').val(XXL.value * hrgXXL.value);
        $('#total').val(S.value * hrgS.value + M.value * hrgM.value + L.value * hrgL.value + XL.value * hrgXL.value + XXL.value * hrgXXL.value);
        $('#htXXL').html('Rp. ' + XXL.value * hrgXXL.value);
        $('#ptot').html('Total : ');
        $('#httot').html('Rp. ' + total.value);
    });

});