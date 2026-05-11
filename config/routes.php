<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    /*
     * =========================
     * PUBLIC SITE ROUTES
     * =========================
     */
    $routes->scope('/', function (RouteBuilder $builder): void {

        // Home page
        $builder->connect('/', [
            'controller' => 'Pages',
            'action' => 'display',
            'home'
        ]);

        // Pages fallback
        $builder->connect('/pages/*', 'Pages::display');

        // AUTH ROUTES (EXPLICIT = IMPORTANT)
        $builder->connect('/users/login', [
            'controller' => 'Users',
            'action' => 'login'
        ]);

        $builder->connect('/users/logout', [
            'controller' => 'Users',
            'action' => 'logout'
        ]);

        $builder->connect('/forgot-password', [
            'controller' => 'Users',
            'action' => 'forgotPassword'
        ]);

        $builder->connect('/verify-code/*', [
            'controller' => 'Users',
            'action' => 'verifyCode'
        ]);

        $builder->connect('/reset-password/*', [
            'controller' => 'Users',
            'action' => 'resetPassword'
        ]);

        $builder->fallbacks();
    });

    /*
     * =========================
     * ADMIN AREA
     * =========================
     */
    $routes->prefix('Admin', function (RouteBuilder $builder): void {

        $builder->connect('/dashboard', [
            'controller' => 'Dashboard',
            'action' => 'index'
        ]);

        $builder->connect('/contact-messages', [
            'controller' => 'ContactMessages',
            'action' => 'index'
        ]);

        // safer: limit fallback usage
        $builder->fallbacks(DashedRoute::class);
    });
};
