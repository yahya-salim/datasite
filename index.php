<?php 
  session_start();

 
  if(!isset($_SESSION['user_name'])) {
    header("Location: ./signin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Welcome</title>
</head>
<body class="bg-gradient-to-r from-cyan-50 to-red-50 h-full">
    
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">


      <div class="flex flex-1 justify-start">
        <a href="http://linkedin.com/in/yahyasalim" target="_blank" class="text-[#0e76a8] underline text-xl -m-1.5 p-1.5">
          LinkedIn
        </a>
      </div>
      
      <div class="flex flex-1 justify-end">
        <a href="./logout.php" class="text-base font-semibold leading-6 text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
  </header>

    <div class=" py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 grid grid-cols-1">
          
        <div class="text-center">
          <h3 class="text-3xl my-3 tracking-normal text-gray-900 sm:text-4xl">
            Welcome 
            <?php 
              if($_SESSION['dailyConnexion']>1) echo "back ";
              echo "<b>";
              echo $_SESSION['user_name'];
              if($_SESSION['dailyConnexion']>1) echo "<p>&#127881</p>";
            ?></b>
          </h3>
        </div>

        <div class="text-center">
          <h1 class="text-4xl my-20 font-bold tracking-normal text-gray-900 sm:text-5xl">
          Your account statistics
          </h1>
        </div>
          
          <dl class="grid grid-cols-1 gap-x-1 gap-y-16 text-center md:grid-cols-2">
            
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">
                <?php
                  if($_SESSION['dailyConnexion']==1) {
                    echo "Today's connexion";
                  } else {
                    echo "Today's connexions";
                  }
                ?>
              </dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                <?php
                  echo $_SESSION['dailyConnexion'];
                ?>
              </dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">
                <?php
                  if($_SESSION['total_connexion']>1) {
                    echo ' User total connexions';
                  } else {
                      echo ' User total connexion';
                  }
                ?>
              </dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                <?php
                  echo $_SESSION['total_connexion'];
                ?>
              </dd>
            </div>
          </dl>
        </div>
    </div>
</body>
</html>