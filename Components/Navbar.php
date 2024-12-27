
<style>
    <?php
        include './Components/styles/Navbar.css'
    ?>
</style>
<div class='navbar'>
    <div class="left">
        <div class="website-logo">
            <h1>EMart</h1>
            <div class="logo-name">ElectroMart</div>
        </div>
        
        <ul class="nav">
            <li class="nav-items"><a href="./">Home</a></li>
            <li class="nav-items"><a href="./mobiles.php?catid=1">Mobiles</a></li>
            <li class="nav-items"><a href="./laptops.php?catid=2">Laptops</a></li>
            <li class="nav-items"><a href="./cameras.php?catid=3">Cameras</a></li>
            <li class="nav-items"><a href="./headphones.php?catid=4">Headphones</a></li>
        </ul>
    </div>
    

    <div class="right">
        <?php
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            echo '
                <div class="profile-dropdown dropdown">
                    <div class="dropbtn">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                        </div>
                        <div class="dropdown-content">
                            <a href="./myProfile.php">My Profile</a>
                            <a href="./cart.php">Cart</a>
                            <a href="./Components/logout.php">Log Out</a>
                        </div>
                        
                    </div>
                    
                </div>
                ';
        }
        else{
            echo '
                <div class="signupBtn">
                    <button> <a href="./signup.php">Sign Up</a> </button>
                </div>
            ';
        }
        ?>
    </div>
</div>