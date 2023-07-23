<?php
  session_start();
  
  if(isset($_SESSION['user_name'])) {
    header("Location: ./index.php");
 }
?>



<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <link rel="icon" href="./images/real_logo.png" type = "image/x-icon">
    <title>Login Page</title>
</head>
<body class="h-full bg-gradient-to-r from-cyan-50 to-red-50 ">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-20" src="./images/real_logo.png" alt="Yahya SALIM logo">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form action="./login.php" class="space-y-6" method="POST">
            <div>

              <!-- Alert to show username or password is wrong -->
              <div id="wrong_pwd_alert" class="hidden flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 " role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  Incorrect <span class="font-medium">username </span> or 
                  <span class="font-medium">password</span>.
                </div>
              </div>


              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
              <div class="mt-2">
                <input id="username" name="username" type="text" autocomplete="username" required 
                class="block w-full rounded-md border-sky-200 py-1.5 text-gray-900 shadow-sm ring-1 
                ring-inset ring-gray-300 placeholder:text-gray-400 
                focus:ring-2 focus:ring-inset focus:ring-sky-600 
                sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required 
                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 
                  border-sky-200
                ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md 
                bg-gradient-to-r from-sky-600 to-red-500
                px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm 
                focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                focus-visible:outline-indigo-600">
                  Sign in
              </button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm text-gray-500">
            Not a member?
            <a href="./signuppage" class="font-semibold leading-6 text-sky-600 hover:text-sky-500">Create account</a>
          </p>
        </div>
      </div>
</body>

  <script>
    
  </script>
</html>
<?php 
      if(isset($_SESSION['wrong_password'])) {
        echo "
          <script>
            document.getElementById('wrong_pwd_alert').classList.remove('hidden');
          </script>
        ";
        session_unset();
      }
  ?>