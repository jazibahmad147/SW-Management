
function viewClient(){

    let id = document.getElementById('client').value;
    console.log("id");
    console.log(id);
    $.ajax({
        url:"/viewClientData/"+id,
        type:'get',
        data: {id: id },
        dataType : 'json',
        success : function(response) {
            // console.log(response );
            document.getElementById("email").value = response.email;
            document.getElementById("phone").value = response.phone;
            document.getElementById("address").innerHTML = response.address;

        },
        error: function(err){
            console.log(err);
        }
    })
}