
    $('.editGrup').click(function() {
        var grupInv = $(this).attr('data-id');
        $.ajax({
            url: 'pathology/editGrupByIDD?grpID='+grupInv,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (grp_edit) {
                $('.grp_idi').val(grp_edit.tst_grp_iddi);
                $('.GrpName').val(grp_edit.tst_grp_name);
                $('.GRPShort').val(grp_edit.tst_grp_short);
            }
        })
    })