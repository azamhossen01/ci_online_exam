$(document).ready(function(){
    
    signUp();
      
});

function signUp(){
    var html = `
    <h3>Registration Form</h3>
        <form id="sign_up">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
            </div>
            <button type="button" onclick="sign_up()" id="sign_up_button">Sign Up</button>
        </form>
    `;
    $('#form').html(html);
}

function logIn(){
    var html = `
    <h3>Login Form</h3>
        <form action="" id="sign_in">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
            </div>
            <button type="button" onclick="sign_in()">Log In</button>
        </form>
    `;
    $('#form').html(html);

}

function sign_up(){
    var li = "http://localhost/ci_online_exam/";
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type : 'post',
            data : {name,email,password},
            url : li+"auth_ctrl/registration",
            dataType : 'json',
            success : function(data){
                if(data === 1){
                    alert('User Registration Successfull');
                    $("#sign_up").trigger('reset');
                }
            }
        });
}

function sign_in(){
    var li = "http://localhost/ci_online_exam/";
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type : 'post',
            data : {email,password},
            url : li+"auth_ctrl/sign_in",
            dataType : 'json',
            success : function(data){
                console.log(data.role);
                if(data.role == 1){
                    window.location.href=li+"admin_ctrl";
                }else if(data.role == 2){
                    window.location.href=li+"user_ctrl";
                }
            }
        });
}

// $(document).ready(function(){
//     $( "#sign_up" ).submit(function( e ) {
//         var li = "http://localhost/ci_online_exam/";
//         event.preventDefault();
//         var name = $('#name').val();
//         var email = $('#email').val();
//         var password = $('#password').val();
//         $.ajax({
//             type : 'post',
//             data : {name,email,password},
//             url : li+"auth_ctrl/registration",
//             dataType : 'json',
//             success : function(data){
//                 if(data === 1){
//                     alert('User Registration Successfull');
//                     $("#sign_up").trigger('reset');
//                 }
//             }
//         });
//       });

// });

// $(document).ready(function(){
//     $( "#sign_in" ).submit(function( e ) {
//         var li = "http://localhost/ci_online_exam/";
//         event.preventDefault();
//         var email = $('#email').val();
//         var password = $('#password').val();
//         $.ajax({
//             type : 'post',
//             data : {email,password},
//             url : li+"auth_ctrl/sign_in",
//             dataType : 'json',
//             success : function(data){
//                 console.log(data);
//                 // if(data === 1){
//                 //     alert('User Registration Successfull');
//                 //     $("#sign_up").trigger('reset');
//                 // }
//             }
//         });
//       });
// });





