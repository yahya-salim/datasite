<?php
  session_start();
  // Détruire toutes les variables de session
  if(isset($_SESSION["user_name"])) {
    session_unset();
  }
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>Create account</title>
</head>
<body class="h-full bg-gradient-to-r from-cyan-50 to-red-50">

  <div id="modal_success" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:flex-col sm:justify-center sm:items-center">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-100 sm:mx-0 sm:h-10 sm:w-10">
                
                <svg style=" margin-left: 3.5; margin-top: 4.5; margin-top: 4.2; margin-top: 4.400; " 
                      class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <!-- <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /> -->
                  <path stroke-linecap="round" stroke-linejoin="round" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/> 
                
                </svg>
              </div>
              <div class="pt-2 mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Account created successfully</h3>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:space-x-4 sm:flex sm:justify-center sm:items-center sm:px-6">
            
            
            <button id="go_to_signIn" type="button" class="space-x-1 inline-flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 sm:ml-3 sm:w-auto">
                <svg class=" w-6 h-6 text-gray-800 dark:text-white" 
                aria-hidden="true" style=" padding-bottom: 4px;  padding-top: 2px;"                    
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                </svg>
                <p>Go to Sign In </p>
                
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>



    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-20" src="../images/real_logo.png" alt="Yahya SALIM logo">          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form action="../back/signUp" class="space-y-6" method="POST">
            <div>
              <label for="usernameSignUp" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
              <div class="mt-2">
                <input id="usernameSignUp" name="usernameSignUp" type="text" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
              </div>
              <div id="user_exists" class="mb-4 mt-2 rounded-lg text-red-800 text-sm hidden" role="alert">
                <span class="font-medium">A user with that username already exists. Try another one.</span>
              </div>
            </div>
            
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <!-- <div class="text-sm">
                  <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div> -->
              </div>
              <div class="mt-2">
                <input id="passwordSignUp" name="passwordSignUp" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md 
              bg-gradient-to-r from-sky-600 to-red-500
              px-3  py-1.5 text-sm font-semibold leading-6 text-white shadow-sm 
              focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
              focus-visible:outline-indigo-600">
                Create account
            </button>
            </div>
          </form>
          <p class="mt-10 text-center text-sm text-gray-500">
            Already registred?
            <a href="./index" class="font-semibold leading-6 text-sky-600 hover:text-sky-500">Sign In</a>
          </p>
        </div>
      </div>
</body>
</html>



<?php
  if (isset($_SESSION["inscription_reussi"])) {
    if($_SESSION["inscription_reussi"] == "true") {
      echo 'inscr réussi !';
      echo '
        <script>
            document.getElementById("modal_success").classList.remove("hidden");

            document.getElementById("go_to_signIn").addEventListener("click", function() {
                window.location.href = "./index";
            });
            console.log("registred submitted ok");
        </script>';
    } else {
      echo'
        <script>
          document.getElementById("user_exists").classList.remove("hidden");
        </script>
      ';
    }
  }
?>