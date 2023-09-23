$(document).ready(function(){
    
    $(function(){
        $("#rota-autocomplete-search").autocomplete({
            source: "/rota/auto-complete",
            minLength: 1,
            select: function(event, ui){
                //
            }
        })
    });

    $("#input-autocomplete").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/rota/auto-complete',
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 1
    });

});