$('.table tr.row-link').each(function(){
    $(this).css('cursor','pointer').hover(
        function(){ 
            $(this).addClass('active'); 
        },  
        function(){ 
            $(this).removeClass('active'); 
        }).click( function(){ 
            document.location = $(this).attr('data-href'); 
        }
    );
});
