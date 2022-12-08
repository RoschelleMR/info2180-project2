<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dolphin CRM</title>

    <script src="dashboard.js" type="text/javascript"></script>
    <link rel="stylesheet" href="dashboard.css">
  </head>
  <body>
    <header>
      <img src="dolphin_logo.png" alt="Dolphin" />
      <h1>Dolphin CRM</h1>
    </header>
    <main>
      <div class="sidebar">
          <a href="#">Home</a>
          <a href="newcontact.php">New Contact</a>
          <a href="#">Users</a>
          <hr>
          <a href="#">Logout</a>
        </div>
      <div class="main_container">
        <div class="main_head">
            <h2>Dashboard</h2> 
            <form>
              <button formaction="newcontact.php">+ Add Contact</button>
            </form>
        </div>
        <div class= "second_container">
          <div class="table_container">       
              <div class= "table_header">
                  <p>Filter By:</p>
                  <button class="all">All</button>
                  <button class="sales_leads">Sales Leads</button>
                  <button class="support">Support</button>
                  <button class="to_me">Assigned to me</button>
              </div>
              <div class="result">
                  <!-- where table appears -->
              </div>
          </div>

    </div>
    </main>

    <footer><p>Copyright © 2022 Dolphin CRM</p></footer>
  </body>
</html>
