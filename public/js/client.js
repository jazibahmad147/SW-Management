
$("#clientAddForm").unbind('submit').bind('submit', function () {
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData($('#clientAddForm')[0]),
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

function viewClient(id){

    console.log("id");
    console.log(id);
    $.ajax({
        url:"/clientEditForm/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            document.getElementById("name").innerHTML = response.name;
            document.getElementById("company").innerHTML = response.company;
            document.getElementById("email").innerHTML = response.email;
            document.getElementById("address").innerHTML = response.address;

        },
        error: function(err){
            console.log(err);
        }
    })
}

function editClient(id){
    
    console.log("id");
    console.log(id);
    $.ajax({
        url:"/clientEditForm/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            $('#edit_id').val(response.id);
            $('#edit_name').val(response.name);
            $('#edit_company').val(response.company);
            $('#edit_email').val(response.email);
            $('#edit_phone').val(response.phone);
            $('#edit_address').val(response.address);

            $("#clientUpdateForm").unbind('submit').bind('submit', function () {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData($('#clientUpdateForm')[0]),
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

function deleteClient(id){
    event.preventDefault();
    $.ajax({
        url:"/deleteClientRecord/"+id,
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
