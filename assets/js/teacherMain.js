$(function() {
  toggleBlock($('#block_noPublished_QCM_list'), $('#btn_noPublished_QCM_list'));
  toggleBlock($('#block_published_QCM_list'), $('#btn_published_QCM_list'));
});

function toggleBlock(blockID, displayBtnSel) {
    displayBtnSel.on('click', function(){
        blockID.find(this);
        blockID.toggleClass('d-none');
    })
}
