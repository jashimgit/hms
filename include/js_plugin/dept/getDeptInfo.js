    $(".edit_dept_button").click(function() {
        var iid = $(this).attr('data-id');
        $.ajax({
            url: 'department/editDepartmentByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            async: false,
            success: function (response) {
            // Populate the form fields with the data returned from server
            $('#departmentEditForm').find('[name="id"]').val(response.department.dept_id).end()
            $('#departmentEditForm').find('[name="name"]').val(response.department.dept_name).end()
            CKEDITOR.instances['editor'].setData(response.department.description)
            }
        });
    });