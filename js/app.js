function ChangeValueRangeTXT(){
    document.getElementById('txtRangePrice').value 
        = 'US$' + document.getElementById('RangeMin').value +
             ' - US$' + document.getElementById('RangeMax').value;
}

function SelectedIMG(event){
    var ViewMode = "";
    if(event.target.alt=="Lateral"){
        ViewMode = "Lateral";
    }
    else if(event.target.alt=="Frente"){
        ViewMode = "Frente";
    }
    else if(event.target.alt=="Diagonal"){
        ViewMode = "Diagonal";
    }
    $('#exampleModalLabel')[0].textContent = "Product Details No. 000" + 
        $('.botton_cart_Details')[0].id + ' - ' + ViewMode;

    $('#VISOR_img')[0].src = event.srcElement.src;

}


$(document).ready(function(){
    $("#btnFind").click(function(){
        var Parameter1 = $('#FilterColorSelected option:selected').val();
        var Parameter2 = $('#FilterSizeSelected option:selected').val();
        var Parameter3 = $('#FilterStyleSelected option:selected').val();
        var Parameter4 = $('#FilterBrandSelected option:selected').val();
        var FILTERTYPE = 0;

        if(Parameter1!='Color'){FILTERTYPE = 1;}

        if(Parameter2!='Size'){FILTERTYPE = 2;}

        if(Parameter3!='Style'){FILTERTYPE = 3;}

        if(Parameter4!='Brand'){FILTERTYPE = 4;}
            
        $.ajax({
            url: "./db/ListProducts.php",
            type: "POST", 
            data: { Filter: FILTERTYPE, Parameter1: Parameter1, Parameter2: Parameter2,
                Parameter3: Parameter3, Parameter4:Parameter4}, 
            success: function(response) {
                $(".productList_List").html(response);
            },
            error: function(xhr, status) {
                alert("Ocurrió un error en la solicitud.");
            }
        });
    });
});

$(document).ready(function(){
    $(".ProductDetails").click(function(event){
        var ID = event.currentTarget.children[2].children[0].id;
            
        $.ajax({
            url: "./db/ListProductsID.php",
            type: "POST", 
            data: { ID: ID }, 
            success: function(response) {
                $(".ProductID").html(response);
            },
            error: function(xhr, status) {
                alert("Ocurrió un error en la solicitud.");
            }
        });
    });



    
});