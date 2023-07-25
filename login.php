<?php include "connect.php"?>
<?php
$login='nostatus';
$login_mail=$login_password='';
$checkwemail=$checkwpassword=0;

function isValidEmail($email) {
  // Regular expression pattern for email validation
  $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

  // Perform the email validation using preg_match
  if (preg_match($pattern, $email)) {
      // The email is valid
      return true;
  } else {
      // The email is not valid
      return false;
  }
} 

function wEmailcheck($wemail){
  //condtion for empty data 
  if($wemail=="" || $wemail==null){
    
      global $checkwemail;
      $checkwemail=1;
  }
  else{
      //condtion to check speacial charaters by calling the validate fucntio for special charaters
      if(!isValidEmail($_POST['email'])){
          global $checkwemail;
          $checkwemail=2;
      }

      //else saving the data in the delcared variable
      else{
          global $checkwemail;
          $checkwemail="success";
          return $wemail;
      }
      
  }
  
}
function wpasswordcheck($wpassword){
  //condtion for empty data 
  if($wpassword=="" || $wpassword==null){
    
      global $checkwpassword;
      $checkwpassword=1;
  }
  else{
      //condtion to check speacial charaters by calling the validate fucntio for special charaters
      global $checkwpassword;
      $checkwpassword="success";
      return $wpassword;
  }
  
}

if($_SERVER['REQUEST_METHOD']=="POST"){
  // echo"post request made";
  $login_mail=wEmailcheck($_POST["email"]);
  $login_password=wpasswordcheck($_POST["password"]);
  if($checkwemail=="success" && $checkwpassword=="success"){


  $login_query="SELECT email,password,srno,first_name,last_name FROM `customers_details` WHERE `email` LIKE '$login_mail'";
  $userdetails=mysqli_query($conn,$login_query);
  $number_rows=mysqli_num_rows($userdetails);
  if($number_rows !=1){
    // echo'data is not correct';
    $login="error";
  }
  else{
    while($row=mysqli_fetch_assoc($userdetails)){
      if(password_verify($login_password,$row['password'])){
        session_start();
        $_SESSION['fname']=$row['first_name'];
        $_SESSION['lname']=$row['last_name'];
        $_SESSION["u_id"]=$row['srno'];
        header("Location: index.php");

      }
    else{
      $login="password";
    }
      }
  }
  }
  }

?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Active Wear Co</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: "#da373d",
                },
            },
        },
    };
    </script>
</head>

<body class="h-full">
    <?php include "navbar.php";?>
    <?php
    
    if($login=="error"){
      echo' 
       <div class="container" id="alertbox">
           <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
               role="alert">
               <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                   <path
                       d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
               </svg>
               <p>Error </b>user doesn`t Exists Create New User By Signing In.</p>
   
               <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                   <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                       viewBox="0 0 20 20">
                       <title>Close</title>
                       <path
                           d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                   </svg>
               </span>
           </div>
       </div>';
    }
    elseif($login=="password"){
      echo' 
       <div class="container" id="alertbox">
           <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
               role="alert">
               <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                   <path
                       d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
               </svg>
               <p>Error </b>Check Your Password.</p>
   
               <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                   <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                       viewBox="0 0 20 20">
                       <title>Close</title>
                       <path
                           d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                   </svg>
               </span>
           </div>
       </div>';
    }
    ?>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company" />
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="login.php" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="<?php echo $login_mail; ?>" autocomplete="email" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                    <?php
                    if($checkwemail==1){
                      echo'
                      <p class="text-red-500">Enter Email Address</p>';
                    }
                    elseif($checkwemail==2){
                      echo'
                      <p class="text-red-500">Enter A Valid Email Address</p>';
                    }
                    ?>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" value="<?php echo $login_password; ?>" autocomplete="current-password" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                    <?php
                    if($checkwpassword==1){
                      echo'
                      <p class="text-red-500">Enter Password</p>';
                    }

                    ?>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="signup.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">SignUp</a>
            </p>
        </div>
    </div>
    <?php include "footer.php";?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>

    <script>
    $(".closealertbutton").click(function(e) {
        // $('.alertbox')[0].hide()
        // e.preventDefault();
        pid = $(this).parent().parent().hide(500)
        console.log(pid)
        // $(".alertbox", this).hide()
    })
    </script>
</body>

</html>