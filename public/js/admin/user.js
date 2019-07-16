$(document).ready(function() {
      $("#form-profil").validate({
      rules : {
        inputName : {
          required : true
        },
        inputEmail : {
          required : true,
          mail : true
        },  
        inputPhone : {
          required : true
        },
        inputPassword : {
          required : true
        },
        inputConfirmPassword: {
            equalTo: "#inputPassword"
        }
      },
      messages : {
        inputName : "Veuillez fournir un nom",
        inputEmail : "L'email est incorrect",
        inputPhone : "Veuillez fournir un numéro téléphone",
        inputPassword : "Veuillez renseigner le mot de passe",
        inputConfirmPassword : "Les deux mots de passe ne sont pas identique"
      },
      submitHandler: function(form) {
        form.submit();
      }
     });
      
          $last = $('.user-update .profile-username').text();

      $('.user-update').on('keyup','#inputName',function(){
          if($(this).val()!=""){
            $('.user-update .profile-username').text($(this).val());
          }else{
            $('.user-update .profile-username').text($last);
          }
      });
      $('#inputPhoto').on('change', function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.user-update .img-profil').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(this.files[0]);
        }
      });
      $('.user-update').on('click','#inputStatus',function(){
          if($(this).prop('checked')){
            $(this).siblings().val(1);
            console.log('on')
          }else{
            $(this).siblings().val(0);
            console.log('off')
          }
      });
      $('.user-profil').on('click','#inputStatus',function(){
          if($(this).prop('checked')){
            $(this).siblings().val(1);
            console.log('on')
          }else{
            $(this).siblings().val(0);
            console.log('off')
          }
      });
    });