$(document).ready(function(){
    
    $(function(){
        $("#rota-autocomplete-search").autocomplete({
            source: "/rota/auto-complete",
            minLength: 0,
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
        minLength: 0
    });

    $("#input-autocomplete").on('focus', function(){
        $(this).autocomplete('search',' ');
    });

    $("#rota-autocomplete-search").on('focus', function(){
        $(this).autocomplete('search',' ');
    });

});