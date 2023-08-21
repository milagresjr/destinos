<html>

<head>
<title>Auto COmplete</title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

<div class="container box">
    <div class="form-group">
        <input type="text" name="autocomplete" id="auto" placeholder="Digite aqui" class="form-control">
        <div id="lista"></div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $("#auto").keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('auto_fetch') }}",
                    method: "POST",
                    data: {query:query, _token:_token},
                    success: function(data){
                        $("#lista").fadeIn();
                        $("#lista").html(data);
                    }
                });
            }
        });
        $(document).on('click','li',function(){
            $("#auto").val($(this).text())
            $("#lista").fadeOut();                        
        });
    });
</script>
</body>
</html>