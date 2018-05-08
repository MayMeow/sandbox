<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */

    /**
     * Profiles
     */
    $routes->connect('/profiles/', ['controller' => 'Profiles', 'action' => 'index']);
    $routes->connect('/profiles/:id', ['controller' => 'Profiles', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Projects Controller
     */
    $routes->connect('/projects/', ['controller' => 'Projects', 'action' => 'index']);
    $routes->connect('/projects/add', ['controller' => 'Projects', 'action' => 'add']);
    $routes->connect('/projects/:slug', ['controller' => 'Projects', 'action' => 'view'])->setPass(['slug']);
    $routes->connect('/projects/edit/:id', ['controller' => 'Projects', 'action' => 'edit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/projects/delete/:id', ['controller' => 'Projects', 'action' => 'delete'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/projects/:id/spaces', ['controller' => 'Projects', 'action' => 'spaces'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    /**
     * Project Settings Controller
     */
    $routes->connect('/projects/settings/:id/update-dependencies', ['controller' => 'ProjectSettings', 'action' => 'updateDependencies'])->setPatterns(['id' => '\d+'])->setPass(['id']);;

    /**
     * Spaces
     */
    $routes->connect('/spaces/', ['controller' => 'Spaces', 'action' => 'index']);
    $routes->connect('/spaces/add', ['controller' => 'Spaces', 'action' => 'add']);
    $routes->connect('/spaces/:id', ['controller' => 'Spaces', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/spaces/index/:id', ['controller' => 'Spaces', 'action' => 'index'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/spaces/edit/:id', ['controller' => 'Spaces', 'action' => 'edit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/spaces/delete/:id', ['controller' => 'Spaces', 'action' => 'delete'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Users
     */
    $routes->connect('/users/', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/login/', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/logout/', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/users/:id', ['controller' => 'Users', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Posts
     */

    $routes->connect('/posts/', ['controller' => 'Posts', 'action' => 'index']);
    $routes->connect('/posts/:id', ['controller' => 'Posts', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    //$routes->fallbacks(DashedRoute::class);
});

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    //$routes->fallbacks(DashedRoute::class);

    /**
     * License
     */
    $routes->connect('/license', ['controller' => 'License', 'action' => 'index', 'prefix' => 'ee']);
    $routes->connect('/license/upload', ['controller' => 'License', 'action' => 'upload', 'prefix' => 'ee']);
    $routes->delete('/license/delete', ['controller' => 'License', 'action' => 'delete', 'prefix' => 'ee']);

    /**
     * Permissions
     */
    $routes->connect('/permissions', ['controller' => 'Permissions', 'action' => 'index']);
    $routes->connect('/permissions/add', ['controller' => 'Permissions', 'action' => 'add']);

    /**
     * Roles
     */
    $routes->connect('/roles', ['controller' => 'Roles', 'action' => 'index']);
    $routes->connect('/roles/add', ['controller' => 'Roles', 'action' => 'add']);
    $routes->connect('/roles/:id', ['controller' => 'Roles', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->put('/roles/assign-permission/:id', ['controller' => 'Roles', 'action' => 'assignPermission'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->get('/roles/revoke-permission/:id/:permission', ['controller' => 'Roles', 'action' => 'revokePermission'])->setPatterns(['id' => '\d+', 'permission' => '\d+'])->setPass(['id', 'permission']);

    /**
     * Posts
     */
    $routes->connect('/posts/', ['controller' => 'Posts', 'action' => 'index']);
    $routes->connect('/posts/add', ['controller' => 'Posts', 'action' => 'add']);
    $routes->connect('/posts/:id', ['controller' => 'Posts', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/posts/edit/:id', ['controller' => 'Posts', 'action' => 'edit'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Users
     */
    $routes->connect('/users', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/users/:id', ['controller' => 'Users', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->connect('/users/edit/:id', ['controller' => 'Users', 'action' => 'edit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->put('/users/assign-role/:id', ['controller' => 'Users', 'action' => 'assignRole'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    $routes->get('/users/revoke-role/:id/:role', ['controller' => 'Users', 'action' => 'revokeRole'])->setPatterns(['id' => '\d+', 'role' => '\d+'])->setPass(['id', 'role']);
});

Router::prefix('api', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->setExtensions(['json']);

    /**
     * Users
     */
    $routes->get('/users/', ['controller' => 'Users', 'action' => 'index']);
    $routes->get('/users/:id/projects', ['controller' => 'Users', 'action' => 'projects'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Profiles
     */
    $routes->get('/profiles/', ['controller' => 'Profiles', 'action' => 'index']);
    $routes->get('/profiles/:profile', ['controller' => 'Users', 'action' => 'view'])->setPatterns(['profile' => '\d+'])->setPass(['profile']);

    /**
     * Posts
     */
    $routes->get('/posts/', ['controller' => 'Posts', 'action' => 'index']);
    $routes->get('/posts/:id', ['controller' => 'Posts', 'action' => 'view'])->setPatterns(['id' => '\d+'])->setPass(['id']);

    /**
     * Projects
     */
    $routes->get('/projects/', ['controller' => 'Projects', 'action' => 'index']);
    $routes->get('/projects/:project', ['controller' => 'Projects', 'action' => 'view'])->setPatterns(['project' => '\d+'])->setPass(['project']);
    $routes->connect('/projects/:project/posts', ['plugin' => 'Projects', 'controller' => 'Posts', 'action' => 'index'])->setPatterns(['project' => '\d+'])->setPass(['project']);

    /**
     * Spaces
     */
    $routes->get('/spaces', ['controller' => 'Spaces', 'action' => 'index']);
    $routes->get('/spaces/index/:id', ['controller' => 'Spaces', 'action' => 'index'])->setPatterns(['id' => '\d+'])->setPass(['id']);;
    //$routes->fallbacks(DashedRoute::class);
});

Router::prefix('settings', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    //$routes->fallbacks(DashedRoute::class);

    /**
     * Profiles
     */
    $routes->connect('/profiles/edit/:id', ['controller' => 'Profiles', 'action' => 'edit'])->setPatterns(['id' => '\d+'])->setPass(['id']);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
