<?php
    require_once("init.php");
?>

<body>

    <!-- WHOLE WEBPAGE -->
    <div class="container">
        <!-- LEFT CONTAINER -->
        <div class="container-left"> 
                <!-- HEADER -->
            <header>
                <nav>
                    <div class="logo">
                        <img src="./css/img/pineapple_logo.png" class="logo-img">
                        <img src="./css/img/pineapple_text.png" class="logo-text">
                    </div>
                    <div class="nav-links">
                        <a href="#">About</a>
                        <a href="#">How it works</a>
                        <a href="#">Contact</a>
                    </div> 
                </nav>
            </header>
            <!-- END HEADER -->
            <!-- MAIN -->
            <main class="subscribe-container">
                <article>
                    <h1>
                        Subscribe to newsletter
                    </h1>
                    <p>
                        Subscribe to our newsletter and get 10% discount on pineapple glasses.
                    </p>
                </article>
                <!-- FORM -->
                <form action="" method="POST">
                    <div class="input-container">
                        <div class="input-line"></div>
                        <input name="email" id="inputField" class="input-email" type="text" placeholder="Type your email address here…">
                        <button name="submit" id="subscribeBtn" class="subscribe-btn" type="submit" value="submit">
                            <div class="arrow-icon"></div>
                        </button>
                        <p id="errorMsg" class="error-msg">
                            <?php $form_controll = new FormController($_POST); ?>
                        </p>
                    </div>
                    <input id="formCheckbox" class="form-checkbox" type="checkbox" name="checkbox" value="check">
                    <label for="formCheckbox" class="checkbox-label"><img class="checkmark" src="./css/icons/ic_checkmark.svg">I agree to <a href="#">terms of service</a></label>
                </form>
                <!-- END FORM -->
            </main>
            <!-- END MAIN -->

            <!-- FOOTER -->
            <?php require_once ('views/footer.php'); ?>
            <!-- END FOOTER -->
            
        </div>
        <!-- END LEFT CONTAINER -->
        <!-- BACKGROUND PICTURE CONTAINER -->
        <div class="picture-container"></div>
        <!-- END BACKGROUND PICTURE CONTAINER -->
    </div>
    <!-- END WHOLE WEBPAGE -->
    <script src="./js/app.js"></script>
</body>
</html>