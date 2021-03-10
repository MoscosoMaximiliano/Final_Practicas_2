$(document).ready(function() {
    tableSubjects = $("#tableSubjects").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data": null,
            "defaultContent":"<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEdit'><i class='fas fa-pen' style='margin-right: 10px;'></i>Edit</button><button class='btn btn-danger btnDelete'><i class='fas fa-trash' style='margin-right: 10px;''></i>Delete</button></div></div>",
        }]
    });

    $("#btnNewSubject").click(function(){
        $("#formSubjectForm").trigger("reset");
        $(".modal-header").css("background-color", "#26a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").css("New Person");
        $("#modalNewSubject").modal("show");
        option = 1
    });


    // Capture the row of the table for edit the data

    $(document).on("click", ".btnEdit", function()
    {
        row = $(this).closest("tr");
        id = parseInt(row.find('td:eq(0)').text());
        subject = row.find('td:eq(1)').text();
        teacher = row.find('td:eq(2)').text();
        year = row.find('td:eq(3)').text();

        console.log(year);
        $("#IDForm").val(id);
        $("#subjectForm").val(subject);
        $("#teacherForm").val(teacher);
        $("#yearForm").val(year);
        option = 2;

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").css("New Person");
        $("#modalNewSubject").modal("show");
        
    });

    // Capture the row of the table for delete the data

    $(document).on("click", ".btnDelete", function()
    {
        actualRow = $(this).closest("tr");
        id = parseInt(actualRow.find('td:eq(0)').text());
        option = 3;

        var answer = confirm("Do you want to delete this subject?");

        if(answer)
        {
            $.ajax({
                url: "DB/deleteData.php",
                type: "POST",
                dataType: "json",
                data: {id: id},
                success: function(){
                    tableSubjects.row(actualRow.parents("tr")).remove().draw();
                }
            });
        }
    });

    $("#formSubjectForm").submit(function(e){
        e.preventDefault();

        id = $("#IDForm").val();
        subject = $("#subjectForm").val();
        teacher = $("#teacherForm").val();
        year = $("#yearForm").val();

        if(subject != "" && teacher != "" && year != "")
        {
            //INSERT
            if(option == 1) {
                alert("INGRESANDO");
                $.ajax({
                    url: "DB/insertData.php",
                    type: "POST",
                    dataType: "json",
                    data: { subject: subject, teacher: teacher, year: year},
                    success: function(data){
                        alert("ASFASF");
                        console.log(data);

                        var jsonData = JSON.parse(response);
                        
                        if(jsonData.success == "1");
                            tableSubjects.row.add([id, subject, teacher, year]).draw();
                    },
                    error: function(){
                        alert("NO FUNCIONO");
                    }
                });

                e.preventDefault();
            }
            //MODIFY
            else {
                alert("MODIFICANDO");
                $.ajax({
                    url: "DB/updateData.php",
                    type: "POST",
                    dataType: "json",
                    data: { subject: subject, teacher: teacher, year: year, id: id},
                    success: function(data){
                        console.log(data);
                        
                        tableSubjects.row(actualRow).data([id, subject, teacher, year]).draw();
                    }
                });

                e.preventDefault();
            }

            $("#modalNewSubject").modal("hide");
        }


    });

});

