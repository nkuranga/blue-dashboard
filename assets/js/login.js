        $(document).ready(function(){
        $("#login_form").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url:"login-root",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){
                    if(data == 1){
                        $(".successMessage").html("You are logged in successfully.").fadeIn(500).css('display','block');
                        $(".errorMessage").css('display','none');
                        setTimeout(function(){
                           window.location.href="home";
                        }, 1000);
                    }
                    else{
                        $(".successMessage").css('display','none');
                        $(".errorMessage").html(data).fadeIn(500).css('display','block');
                        setTimeout(()=>{
                            window.location.href= "home";
                        }, 2000);
                        
                    }
                },
                error:function(data){
                    $(".errorMessage").html("An unkown error occurred.").fadeIn(200).css('display','block');
                }         
            });
        }));


    });