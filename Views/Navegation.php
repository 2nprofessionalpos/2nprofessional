    <!--Sidebar-->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <img src="../Assets/img/logo.png" alt="Logo" class="header__img--desktop">
                        <p class="text-center"><?php echo $_SESSION['user_name']?></p>
                    </li>
                    <li class="nav-item">
                        <a id="viewuser" class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarMenu.show">
                            <ion-icon name="person-add-outline" class="nav__icon-item"></ion-icon>
                            Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="viewcustomer" class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarMenu.show">
                            <ion-icon name="people-outline" class="nav__icon-item"></ion-icon>
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="viewproduct" class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarMenu.show">
                            <ion-icon name="hardware-chip-outline" class="nav__icon-item"></ion-icon>
                            Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="viewlogout" class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarMenu.show">
                            <ion-icon name="log-out-outline" class="nav__icon-item"></ion-icon>
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Fin del Sidebar-->
    