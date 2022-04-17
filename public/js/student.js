
$("#studentAddForm").unbind('submit').bind('submit', function () {
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData($('#studentAddForm')[0]),
        processData: false,
        contentType: false,
        success:function(response){
            // response = JSON.parse(response);
            // console.log(response.messages);
            swal({
                title: response.title,
                text: response.messages,
                icon: response.class,
            }).then(function (){
                if(response.class == "success"){
                    location.reload();
                }
            });
            
        },
        error:function(e){
            console.log(e);
        }
    })
})

function courseFee(){
    let course = document.getElementById('course').value;
    if(course == "Computer Basics"){
        document.getElementById('fee').value = 3000;
    }else if(course == "Graphic Designing"){
        document.getElementById('fee').value = 5500;
    }else if(course == "Video Editing"){
        document.getElementById('fee').value = 5000;
    }else if(course == "WordPress"){
        document.getElementById('fee').value = 5000;
    }else if(course == "Web Design & Development"){
        document.getElementById('fee').value = 7000;
    }
}


function editStudent(id){

    console.log("id");
    console.log(id);
    $.ajax({
        url:"/studentEditForm/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            $('#edit_id').val(response.id);
            $('#edit_date').val(response.date);
            $('#edit_name').val(response.name);
            $('#edit_email').val(response.email);
            $('#edit_phone').val(response.phone);
            $('#edit_address').val(response.address);
            $('#edit_course').val(response.course);
            $('#edit_fee').val(response.fee);

            $("#studentUpdateForm").unbind('submit').bind('submit', function () {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData($('#studentUpdateForm')[0]),
                    processData: false,
                    contentType: false,
                    success:function(response){
                        // response = JSON.parse(response);
                        // console.log(response.messages);
                        swal({
                            title: response.title,
                            text: response.messages,
                            icon: response.class,
                        }).then(function (){
                            if(response.class == "success"){
                                location.reload();
                            }
                        });
                        
                    },
                    error:function(e){
                        console.log(e);
                    }
                })
            })
        },
        error: function(err){
            console.log(err);
        }
    })
}

function viewStudent(id){

    console.log("id");
    console.log(id);
    $.ajax({
        url:"/studentEditForm/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            document.getElementById("name").innerHTML = response.name;
            document.getElementById("address").innerHTML = response.address;
            document.getElementById("course").innerHTML = response.course;
            document.getElementById("fee").innerHTML = response.fee;

        },
        error: function(err){
            console.log(err);
        }
    })
}

function deleteStudent(id){
    event.preventDefault();
    $.ajax({
        url:"/deleteStudentRecord/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            swal({
                title: response.title,
                text: response.messages,
                icon: response.class,
            }).then(function (){
                if(response.class == "success"){
                    location.reload();
                }
            });

            
        },
        error: function(err){
            console.log(err);
        }
    })
}
