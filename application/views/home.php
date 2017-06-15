<!DOCTYPE html>
<html>
<head>
	<title>validacion Codeigner</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <style type="text/css">
            .errorusername,.errorpassword,.correcto{
                display: none;
            }
            .correcto{
                margin-top: 60px;
            }
        </style>
        <script>
        $(document).ready(function(){
           $("form").on("submit", function(e){
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function(data)
                    {
                        var json = JSON.parse(data);
                        $(".errorusername, .errorpassword, .correcto").html("").css({"display":"none"});
                        if(json.res == "error")
                        {
                            if(json.username)
                            {
                                $(".errorusername").append(json.username).css({"display":"block"});
                            }
                          
                            if(json.password)
                            {
                                $(".errorpassword").append(json.password).css({"display":"block"});
                            }
                        }
                        else
                        {
                            $(".correcto").append("El formulario ha pasado la validacion").css({"display":"block"});
                        }
                    },
                    error: function(xhr, exception)
                    {
                        
                    }
                });
                e.preventDefault();
           }); 
        });
        </script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?= form_open(base_url('home/login')) ?>
                <div class="form-group">
                    <?= form_label("Nombre de usuario","username");?>
                    <?= form_input($input_name)?>
                    <!--?= form_error('username');?-->
                </div>
                <div class="errorusername alert alert-danger"></div>
                <div class="form-group">
                    <?= form_label("Password","password");?>
                    <?= form_input($input_password)?>
                    <!--?= form_error('password');?-->
                </div>
                <div class="errorpassword alert alert-danger"></div>
                <?= form_submit($input_submit) ?>
                <?= form_close(); ?>
            </div>
            <div class="correcto alert alert-success col-md-8 col-md-offset-2"></div>
        </div>
    </div>

</body>
</html>

