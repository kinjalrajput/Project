
        function processForm(){ 
            $.ajax({
                url: 'register_db.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $("#add_form").serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#msg').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

//            e.preventDefault();
        }



         function processForm1(){ 
            $.ajax({
                url: 'user_account_db.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $("#add_form").serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#msg').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

//            e.preventDefault();
        }