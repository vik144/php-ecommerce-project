<?php
include "connect.php";
?>
<?php
$error="";
$fname=$lname=$email=$password=$street=$city=$zipcode=$province='';
$checkwfname=$checkwlname=$checkwemail=$checkwpassword=$checkwstreet=$checkwcity=$checkwprovince=$checkwzipcode='';

 //below function will be used for the validating the the fied for special characters using regex pattern matching
 function checkspecialcharacters($string) {
    //pattern used for finding special charater in a data
    $pattern = '/[^a-zA-Z0-9\s]/';
    
    // returing true if condtion matches
    if (preg_match($pattern, $string)) {
        return true; 
    } else {
        return false; 
    }
}

//below function will be used for the validating the the fied called watchename for special characters and empty field
function wfNamecheck($wfname){
    //condtion for empty data 
    if($wfname=="" || $wfname==null){
      
        global $checkwfname;
        $checkwfname=1;
    }
    else{
        //condtion to check speacial charaters by calling the validate fucntio for special charaters
        if(checkspecialcharacters($_POST['fname'])){
            global $checkwfname;
            $checkwfname=2;
        }

        //else saving the data in the delcared variable
        else{
            global $checkwfname;
            $checkwfname="success";
            return $wfname;
        }
        
    }
    
}
//below function will be used for the validating the the fied called watchename for special characters and empty field
function wlNamecheck($wlname){
    //condtion for empty data 
    if($wlname=="" || $wlname==null){
      
        global $checkwlname;
        $checkwlname=1;
    }
    else{
        //condtion to check speacial charaters by calling the validate fucntio for special charaters
        if(checkspecialcharacters($_POST['lname'])){
            global $checkwlname;
            $checkwlname=2;
        }

        //else saving the data in the delcared variable
        else{
            global $checkwlname;
            $checkwlname="success";
            return $wlname;
        }
        
    }
    
}
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
  function wPasswordcheck($wpassword){
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
  function wStreetcheck($wstreet){
    //condtion for empty data 
    if($wstreet=="" || $wstreet==null){
      
        global $checkwstreet;
        $checkwstreet=1;
    }
    else{
        //condtion to check speacial charaters by calling the validate fucntio for special charaters
        if(checkspecialcharacters($_POST['street'])){
            global $checkwstreet;
            $checkwstreet=2;
        }

        //else saving the data in the delcared variable
        else{
            global $checkwstreet;
            $checkwstreet="success";
            return $wstreet;
        }
        
    }
    
}
function wCitycheck($wcity){
    //condtion for empty data 
    if($wcity=="" || $wcity==null){
      
        global $checkwcity;
        $checkwcity=1;
    }
    else{
        //condtion to check speacial charaters by calling the validate fucntio for special charaters
        if(checkspecialcharacters($_POST['city'])){
            global $checkwcity;
            $checkwcity=2;
        }

        //else saving the data in the delcared variable
        else{
            global $checkwcity;
            $checkwcity="success";
            return $wcity;
        }
        
    }
    
}
function wZipcodecheck($wzipcode){
    //condtion for empty data 
    if($wzipcode=="" || $wzipcode==null){
      
        global $checkwzipcode;
        $checkwzipcode=1;
    }
    else{
        //condtion to check speacial charaters by calling the validate fucntio for special charaters
        if(strlen($wzipcode)<=7){
            global $checkwzipcode;
            $checkwzipcode="success";
            return $wzipcode;
        }
        else{
            global $checkwzipcode;
            $checkwzipcode=2;
        }
    }
    
  }

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $fname=wfNamecheck($_POST['fname']);
        $lname=wlNamecheck($_POST['lname']);
        $email=wEmailcheck($_POST['email']);
        $password=wPasswordcheck($_POST['password']);
        $street=wStreetcheck($_POST['street']);
        $city=wCitycheck($_POST['city']);
        $province=$_POST['province'];
        $zipcode=wZipcodecheck($_POST['zipcode']);
        if($checkwfname=="success" && $checkwlname=="success" && $checkwemail=="success" && $checkwpassword=="success"&& $checkwstreet=="success" && $checkwcity=="success"){

        
        $email_query="SELECT email FROM `customers_details` WHERE `email` LIKE '$email'";
        $emaildata=mysqli_query($conn,$email_query);
        $email_row=mysqli_num_rows($emaildata);
        if($email_row>=1){
            $error="email";
        }
        else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $signup_query="INSERT INTO `customers_details` (`first_name`, `last_name`, `email`, `password`, `street`, `province`, `city`, `zipcode`) VALUES ('$fname', '$lname', '$email', '$hash', '$street', '$province', '$city', '$zipcode')";
            $datainserted=mysqli_query($conn,$signup_query);
            $error="inserted";
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
    if($error=="email"){
      echo' 
       <div class="container" id="alertbox">
           <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
               role="alert">
               <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                   <path
                       d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
               </svg>
               <p>Error </b>User Already Exists</p>
   
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
       elseif($error=="inserted"){
        echo' 
         <div class="container" id="alertbox">
             <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                 role="alert">
                 <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path
                         d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                 </svg>
                 <p>Info </b>User Created now You Can Login</p>
     
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
    <form action="signup.php" method="POST" class="w-full flex items-center justify-center my-12">
        <div class="absolute top-40 bg-white dark:bg-gray-800 shadow rounded py-16 lg:px-28 px-8">
            <p class="md:text-3xl text-xl font-bold leading-7 text-center text-gray-700 dark:text-white">SignUp</p>
            <div class="md:flex items-center mt-12">
                <div class="md:w-72 flex flex-col">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">First Name</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="fname" />
                    <div>
                        <?php
                    if($checkwfname==1){
                      echo'
                      <p class="text-red-500">Enter Firstname</p>';
                    }
                    elseif($checkwfname==2){
                      echo'
                      <p class="text-red-500">No Special Characters allowed</p>';
                    }
                    ?>
                    </div>
                </div>
                <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Last Name</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="lname" />
                    <div>
                        <?php
                    if($checkwlname==1){
                      echo'
                      <p class="text-red-500">Enter Lastname</p>';
                    }
                    elseif($checkwlname==2){
                      echo'
                      <p class="text-red-500">No Special Characters allowed</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="md:flex items-center mt-8">
                <div class="md:w-72 flex flex-col">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Email</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="email" />
                    <div>
                        <?php
                    if($checkwemail==1){
                      echo'
                      <p class="text-red-500">Enter Email Address</p>';
                    }
                    elseif($checkwemail==2){
                      echo'
                      <p class="text-red-500">Enter a valid email</p>';
                    }
                    ?>
                    </div>
                </div>
                <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">password</label>
                    <input tabindex="0" arial-label="Please input name" type="password"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="password" />
                    <div>
                        <?php
                    if($checkwpassword==1){
                      echo'
                      <p class="text-red-500">Enter password</p>';
                    }

                    ?>
                    </div>
                </div>
            </div>
            <div class="md:flex items-center mt-8">
                <div class="md:w-72 flex flex-col">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Street
                        Name</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="street" />
                    <?php
                    if($checkwstreet==1){
                      echo'
                      <p class="text-red-500">Enter Street Name</p>';
                    }
                    elseif($checkwemail==2){
                      echo'
                      <p class="text-red-500">No special Charaters Allowed</p>';
                    }
                    ?>

                </div>
                <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">City</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="city" />
                    <?php
                    if($checkwcity==1){
                      echo'
                      <p class="text-red-500">Enter City Name</p>';
                    }
                    elseif($checkwcity==2){
                      echo'
                      <p class="text-red-500">No special Charaters Allowed</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="md:flex items-center mt-8">
                <div class="md:w-72 flex flex-col">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Province</label>
                    <select
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        id="provinceSelect" name="province"
                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="alberta">Alberta</option>
                        <option value="british_columbia">British Columbia</option>
                        <option value="manitoba">Manitoba</option>
                        <option value="new_brunswick">New Brunswick</option>
                        <option value="newfoundland_labrador">Newfoundland and Labrador</option>
                        <option value="nova_scotia">Nova Scotia</option>
                        <option value="ontario">Ontario</option>
                        <option value="prince_edward_island">Prince Edward Island</option>
                        <option value="quebec">Quebec</option>
                        <option value="saskatchewan">Saskatchewan</option>
                    </select>
                </div>
                <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                    <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Zip Code</label>
                    <input tabindex="0" arial-label="Please input name" type="text"
                        class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"
                        name="zipcode" />
                    <div>
                        <?php
                    if($checkwzipcode==1){
                      echo'
                      <p class="text-red-500">Enter Zip Code</p>';
                    }
                    elseif($checkwzipcode==2){
                      echo'
                      <p class="text-red-500">Length should be less than 7</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>

            <p class="text-xs leading-3 text-gray-600 dark:text-gray-200 mt-4">By clicking submit you agree to our terms
                of service, privacy policy and how we use data as stated</p>
            <div class="flex items-center justify-center w-full">
                <button
                    class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none">SUBMIT</button>
            </div>
        </div>
    </form>
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