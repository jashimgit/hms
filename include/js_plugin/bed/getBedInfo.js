



    $(".edit_bed").click(function () {

        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $.ajax({
            url: 'bed/editBedByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
            // Populate the form fields with the data returned from server

            $('#updatebed').find('[name="id"]').val(response.bed_info.bed_Idi).end()
            $('#updatebed').find('[name="cat_name"]').val(response.bed_info.category).end()
            $('#updatebed').find('[name="bedno"]').val(response.bed_info.b_num).end()
            $('#updatebed').find('[name="floor"]').val(response.bed_info.floor).end()
            $('#updatebed').find('[name="bed_cat_i"]').val(response.bed_info.bed_cat_i).end()
            $('#updatebed').find('[name="description"]').val(response.bed_info.description).end()
            $('#updatebed').find('[name="price"]').val(response.bed_info.price).end()

            }
        });
    });
