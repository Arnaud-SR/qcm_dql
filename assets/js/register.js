$(document).ready(function () {
    showInputCode();
});

function showInputCode() {
    var block = $('#block_code');
    var select = $('#select_role');

    select.on('change', function () {
        block.find('input').attr('required', 'required');
        block.removeClass('d-none');
    })
}


