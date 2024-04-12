<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>">
            <img src="<?php echo URLROOT; ?>/img/logo.png" width="100" height="70" class="d-inline-block align-top"
                alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/shopping">Shopping</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/cart">
                        Cart
                        <?php if (count($_SESSION['products']) != 0)
                            echo count($_SESSION['products'])
                                ?>
                        </a>
                    </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile">My Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>