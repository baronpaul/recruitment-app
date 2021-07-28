<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
 </div>
 <!-- end Back To Top -->
 
 
 <!-- JS -->
 <script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/jquery.introLoader.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
 
 <script type="text/javascript" src="{{ asset('js/customs.js') }}"></script>
 

 <script>
    $("#loginForm").submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var $form = $(this);
        var formurl = $form.attr('action');
        var username = $('#email').val();  
        var password = $('#password').val();  
        var serializedData = $form.serialize();
    
        if(username != '' && password != '')  
        {
            console.log('form submitted');
            $.ajax({
                url: formurl , 
                type: "POST", 
                data: serializedData,
                cache: false, 
                processData: false,
                contentType: false, 
                beforeSend: function(){
                    // Handle the beforeSend event
                    $('#submit_btn').text('Processing');
                },
                
                success: function(data) {
                    console.log('success');
                    if(data.auth)
                    //window.location.href = "http://{{$_SERVER['HTTP_HOST']}}/"+data.intended;	
                    $('#loginForm #error_msg_wrap')
                        .html('<div class="alert alert-danger">'+data.intended+'</div>');
                    else
                    $('#loginForm #error_msg_wrap')
                        .html('<div class="alert alert-danger">You entered an incorrect email and password combination</div>');
                        $('#submit_btn').text('Submit');
                },
                error:function(xhr){
                    console.log(xhr.responseJSON.message);
                    $('#loginForm #error_msg_wrap')
                    .html('<div class="alert alert-danger">'+xhr.responseJSON.message+'</di>');
                    
                    $('#submit_btn').text('Submit');
                }
            });
        }
    });
    
    
    $(function() {
        
        $('#register').submit(function(e) {
            var verified = grecaptcha.getResponse();
    
            if(varified.lenght === 0) {
                e.preventDefault();
            }
        });
        //$('#date').datepicker("show"); 
    });
    
    
    $('.delete_form_btn').on('click', function(e){
        var form = $(this).parent();
        var form_id = $(this).parent().attr("id");
        e.preventDefault();
        swal({
            title: "Careful!",
            text: "Are you sure you want to delete",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Exit",
                confirm: "Confirm",
            },
        })
        .then ((willDelete) => {
            if (willDelete) {
                $(form).submit();
                //alert('form with id '+form_id+' was submitted');
            }
        });
    });
    
    
    $('.confirm_form_btn').on('click', function(e){
    //var name = $(this).data('name');
        e.preventDefault();
        swal({
            title: "Careful!",
            text: "Are you sure you want to update records",
            icon: "warning",
            dangerMode: true,
            buttons: {
            cancel: "Exit",
            confirm: "Confirm",
            },
        })
        .then ((willDelete) => {
            if (willDelete) {
                $(".confirm_form").submit();
            }
        });
    });
    
    $('.deactivate_form_btn').on('click', function(e){
    //var name = $(this).data('name');
        e.preventDefault();
        swal({
            title: "Careful!",
            text: "Are you sure you want to suspend this account",
            icon: "warning",
            dangerMode: true,
            buttons: {
            cancel: "Exit",
            confirm: "Confirm",
            },
        })
        .then ((willDelete) => {
            if (willDelete) {
                $(".deactivate_form").submit();
            }
        });
    });
    
    
    $(document).on('click', '.remove-itm', function(){
        $(this).closest('tr').remove();
    });
    
</script> 