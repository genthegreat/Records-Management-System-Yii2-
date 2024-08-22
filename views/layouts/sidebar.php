<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://account.unza.zm/saml/module.php/astrialearning/astrialearning/img/unza.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RecordsMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php
                if(Yii::$app->user->isGuest){
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Log in', 'icon' => 'fas fa-walking', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                        ],
                    ]);
                } else{
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Hello ' . Yii::$app->user->identity->username . ' ', 'icon' => 'far fa-user-circle' , 'visible' => Yii::$app->user->can( 'log-in' )],
                        ],
                    ]);
                }
            ?>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Home',
                        'icon' => 'fas fa-igloo',
                        'url' => 'site/index', 
                        'visible' => Yii::$app->user->can( 'log-in' )
                    ],
                    /*['label' => 'LOGIN FEATURES', 'header' => true],*/
                    /*['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],*/
                    //['label' => 'Sign up', 'url' => ['/site/signup'], 'icon' => 'sign-out-alt', 'visible' => Yii::$app->user->isGuest],
                    //['label' => 'Sign out', 'url' => ['/site/logout'], 'icon' => 'sign-out-alt', 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'PAGES', 'header' => true, 'visible' => Yii::$app->user->can( 'log-in' )],
                    ['label' => 'Student', 'icon' => 'fas fa-user-graduate','url' => ['students/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Courses', 'icon' => 'fas fa-book-open','url' => ['courses/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Lecturers', 'icon' => 'fas fa-chalkboard-teacher','url' => ['lecturers/index'], 'visible' => Yii::$app->user->can( 'lecturer')],
                    //['label' => 'YII PROVIDED', 'header' => true, 'visible' => Yii::$app->user->can( 'admin' )],
                    //['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank', 'visible' => Yii::$app->user->can( 'admin' )],
                    //['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => Yii::$app->user->can( 'admin' )],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>