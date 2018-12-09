            $(document).ready(function(){
    
            //$("#adoptionsLink").addClass("active");
            
            $(".productLink").click(function(){
                
                //alert(  );
                
                $('#productModal').modal("show");
                $("#productInfo").html("<img src='img/loading.gif'>");
                      
                
                $.ajax({

                    type: "GET",
                    url: "api/getProductInfo.php",
                    dataType: "json",
                    data: { "productId": $(this).attr("productId")},
                    success: function(data,status) {

                       $("#productModalLabel").html("<h2>" + data.productId + ":" + data.productName + "</h2>");
                       $("#productInfo").html("");
                       $("#productInfo").append("<img src='img/" + data.productImage +"' width='200' >"+ "<br><br>");
                       $("#productInfo").append("<strong>Description:</strong>  " + data.productDescription + "<br><br>");
                       $("#productInfo").append("<strong>price:</strong>  " + data.price + "<br><br>");
                       $("#productInfo").append("<strong>Region:</strong>  " + data.categoryName + "<br><br>");
                       $("#productInfo").append("<strong>Type:</strong>  " + data.typeName + "<br><br>");
                       $("#productInfo").append("<strong>Size:</strong>  " + data.size + "<br><br>");
                       $("#productInfo").append("<strong>Location:</strong>  " + data.location + "<br><br>");
                       
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                });//ajax
            });
    }); //document ready