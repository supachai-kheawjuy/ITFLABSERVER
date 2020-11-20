$("#deleteaccept").modal("show");
$('#deleteaccept').on('hidden.bs.modal', function () {
    $('#deleteaccept form')[0].reset();
});

$("#addrow").modal("show");
$('#addrow').on('hidden.bs.modal', function () {
    $('#addrow form')[0].reset();
});