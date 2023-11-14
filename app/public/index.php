<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Pico Website</title>
  </head>
  <body>
    <h1 align="center">
        <strong>Wonderland Parking</strong>
    </h1>
  <main class="container">
    <article class="grid">
      <div>
        <h1>Find Reservations</h1>
        <?php include "reservationSearch.php"; ?>
      </div>
    </article> 
    <article class="grid">
    <?php include "reserve.php"; ?>
    </article>
    <article class="grid">
      <div>
        <h1>Admin Login</h1>
        <?php include "adminLogin.php"; ?>
      </div>
    </article>
    
  </main>
  </body>
</html>
