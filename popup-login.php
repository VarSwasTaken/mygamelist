<div class="popup-login">
    <div>
        <img class="popup-controller" src="./img/controllerLogo.svg" alt="controller logo">
    </div>
    <div>
        <span class="site-title text-white"><span class="red-letter">M</span>y<span class="red-letter">G</span>ame<span
                class="red-letter">L</span>ist</span>
    </div>
    <form method="POST" action="index.php">
        <div class="userInfo">
            <div class="formInput">
                <input type="text" id="username" name="username" placeholder="Username"
                    value="<?= isset($username) ? $username : "" ?>">
            </div>
            <div class="formInput">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>

            <input type="text" name="action-type" hidden>

            <?php echo '<span class="errorMessage">'.$message.'</span>' ?>
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <img class="closeLoginPopup" src="./img/crossSign.svg" alt="cross sign">
</div>