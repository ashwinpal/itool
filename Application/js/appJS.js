 $( document ).ready(function() {

    var result = $("#result");
                
    result.show().css('border','1px solid black');
    
    var btnSearch = $("#btn_search");
    var searchText = $("#search_txt");
    
    btnSearch.click(function(){
    });
    
    var dataList = [];
    
    $.ajax({ 
        url: "../Application/service/ProductList.php",
        dataType: 'json',
        success: function(data){
            
            
            $.each(data, function( index, value ) {
             dataList[index] = value;
            
            });
            
        }
    });
    
    
   
    searchText.autocomplete({
        source: dataList
    });
    
    $( "#date" ).datepicker();


 });
 
