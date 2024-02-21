<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Pengaduan Masyarakat</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <style>
   @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

   body {
     font-family: 'Montserrat', sans-serif;
   }

   .card-container {
     display: flex;
     justify-content: center;
     align-items: center;
     margin-top: 50px;
   }
 </style>
</head>

<body>
 <nav class="navbar bg-primary d-flex justify-content-center">
   <a class="navbar-brand text-light fw-bold" href="index.php">Portal Pengaduan Masyarakat</a>
 </nav>
 <div class="card-container">
   <div class="card w-50">
     <div class="card-body">
       <form autocomplete="off" action="proseslogin.php" method="POST">
         <h2 class="card-title">Login Petugas</h2>
         <div class="mt-2 mb-3">
           <label>Username</label>
           <input type="text" name="username" required="required" class="form-control mt-1">
         </div>
         <div class="mb-3">
           <label>Password</label>
           <input type="password" name="password" required="required" class="form-control mt-1">
         </div>
         <button type="submit" class="btn btn-primary">Login</button>
         <button type="reset" class="btn btn-secondary">Reset</button> 
       </form>
     </div>
   </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9J+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
 </script>

</html>
