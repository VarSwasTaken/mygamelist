<div class="navigation container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-dark">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="controllerLogo.svg" alt="controller logo">
        <span class="site-title text-white"><span class="red-letter">M</span>y<span class="red-letter">G</span>ame<span class="red-letter">L</span>ist</span>
    </a>
    <form class="me-3" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>    
    <div class="col-md-3 text-end">
    <?php
        if(isset($_SESSION['username'])) {
            echo '<img src="personIcon.svg" alt="person icon">
            <span class="username">'.$_SESSION["username"].'</span>
            <a href="gamesList.php"><button type="button" class="yourGames btn btn-outline-primary me-2">Twoje gry</button></a>';
            echo '<a href="logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>';
        }
        else {
            echo '<button type="button" class="loginButton btn btn-outline-primary me-2">Login</button>';
            echo '<button type="button" class="signUpButton btn btn-primary">Sign up</button>';
        }
        
    ?>
    </div>
  </header>
</div>