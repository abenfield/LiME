jQuery.validator.addMethod("numericdashe", function (value, element) {
    console.log(value);
      if (/^[0-9\-]+$/i.test(value)) {
          return true;
      } else {
          return false;
      };
    }, "Numbers and dashes only");


    jQuery.validator.setDefaults({
      highlight: function(element) {
          jQuery(element).closest('.form-control').addClass('is-invalid');
      },
      unhighlight: function(element) {
          jQuery(element).closest('.form-control').removeClass('is-invalid');
      },
      errorElement: 'span',
      errorClass: 'label label-danger',
      errorPlacement: function(error, element) {
          if(element.parent('.input-group').length) {
              error.insertAfter(element.parent());
          } else {
              error.insertAfter(element);
          }
      }
  });

    


  $("#addBook").validate({
rules: {
  title: "required",
  firstname: "required",
  lastname: "required",
  publisher: "required",
  publishdate: "required",
  genre: "required",
    isbn: {
          required:true,
          maxlength:20,
          minlength:10,
          numericdashe: true      
          }
        },
  messages: {
isbn: {
required: "You must add an ISBN to the book.",
maxlength: "ISBN can only be up to 20 characters in length.",
minlength: "ISBN must be a minimium of 10 characters",
numericdashe: "ISBNs are only composed of numbers and hyphens"
}

  }
      
  });



  $("#editBook").validate({
    rules: {
      title: "required",
      firstname: "required",
      lastname: "required",
      publisher: "required",
      publishdate: "required",
      genre: "required",
        isbn: {
              required:true,
              maxlength:20,
              minlength:10,
              numericdashe: true      
              }
            },
      messages: {
    isbn: {
    required: "You must add an ISBN to the book.",
    maxlength: "ISBN can only be up to 20 characters in length.",
    minlength: "ISBN must be a minimium of 10 characters",
    numericdashe: "ISBNs are only composed of numbers and hyphens"
    }
    
      }
    
          
      });


      $("#addUser").validate({
        rules: {
          firstname: "required",
          lastname: "required",
          phone: "required",
          address: "required",
          city: "required",
          state: "required",
          zipcode: "required",
            email: {
                  required:true,
                   
                  }
                },
          messages: {
        email: {
        required: "You must add an ISBN to the book.",
        email: "You must have a valid email address to use this site."
        }
        
          }
        
              
          });