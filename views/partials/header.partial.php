<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">PHP MVC Framework</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item ">
                        <?php if ($_SESSION['loggedUser'] ?? false) :?>
                            <a class="nav-item nav-link mr-md-2" id="bd-versions"
                               aria-haspopup="false" aria-expanded="false"
                               href="/logout">
                                Tancar sessió
                            </a>

                        <?php else :?>
                            <a class="nav-item nav-link mr-md-2" id="bd-versions"
                               aria-haspopup="false" aria-expanded="false"
                               href="/login">
                                Iniciar sessió
                            </a>

                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link"
                           aria-haspopup="false" aria-expanded="false"
                           href="/admin">
                            Panell de control
                        </a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
