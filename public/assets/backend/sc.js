$(document).ready(function() {
    $('select[name="Division"]').on('change', function() {
        
        var DivisionId = $(this).val();
        if(DivisionId) {
            $.ajax({
                url: '/myform/ajax/'+DivisionId,
                type: "GET",
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('select[name="District"]').empty();
                    $.each(data, function(key, value) {
                    
                    });
                }
            });
        }else{
            $('select[name="District"]').empty();
        }
    });
});