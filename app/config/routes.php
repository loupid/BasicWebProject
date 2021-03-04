<?php

/*
    *                    // Match all request URIs
    [i]                  // Match an integer
    [i:id]               // Match an integer as 'id'
    [a:action]           // Match alphanumeric characters as 'action'
    [h:key]              // Match hexadecimal characters as 'key'
    [:action]            // Match anything up to the next / or end of the URI as 'action'
    [create|edit:action] // Match either 'create' or 'edit' as 'action'
    [*]                  // Catch all (lazy, stops at the next trailing slash)
    [*:trailing]         // Catch all as 'trailing' (lazy)
    [**:trailing]        // Catch all (possessive - will match the rest of the URI)
    .[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional
 */

/*
 * https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode
 * Method:
 * GET
 * POST
 * GET|POST
 *--------------------------------------------------------------------------------------------*
 * By exemple if you want to change the name of the user will with the id 3                   *
 * you will have a get method with a parameters i:id afther you have change the name          *
 * you will have a post method with all the new informations to update the user with the id 3 *
 *--------------------------------------------------------------------------------------------*
 */


//Home
$router->map('GET','/','HomeController@index');


//Programs
$router->map('GET', '/programme', 'ProgramController@index', 'indexProgram');

//Cours
$router->map('GET', '/cours', 'CoursesController@index', 'CoursesIndex');

//Admin
$router->map('GET', '/admin', 'AdminController@index', 'adminIndex');
$router->map('GET', '/admin/logout', 'AdminController@logout', 'adminLogout');
$router->map('GET', '/admin/dashboard', 'AdminController@dashboard', 'adminDashboard');
$router->map('GET', '/admin/adminsList', 'AdminController@adminsList', 'adminsList');
$router->map('GET', '/admin/create', 'AdminController@create', 'adminCreate');
$router->map('GET', '/admin/update/[i:id]','AdminController@update', 'adminEdit');
$router->map('GET', '/admin/updateprofil/[i:id]','AdminController@updateProfil', 'adminUpdateProfil');
$router->map('GET', '/admin/delete/[i:id]','AdminController@delete', 'adminDelete');

$router->map('POST','/admin/connexion','AdminController@login', 'adminConfirm');
$router->map('POST','/admin/created','AdminController@created', 'adminCreated');
$router->map('POST','/admin/updated','AdminController@updated', 'adminUpdated');
$router->map('POST','/admin/updatedprofil','AdminController@updatedProfil', 'adminUpdatedProfil');


//events
$router->map('GET', '/admin/events', 'EventController@eventsList', 'eventsList');
$router->map('GET', '/admin/event/create', 'EventController@create', 'eventCreate');
$router->map('GET', '/admin/event/update/[i:id]', 'EventController@update', 'eventUpdate');
$router->map('GET', '/admin/event/delete/[i:id]','EventController@delete', 'eventDelete');

$router->map('POST', '/admin/event/created', 'EventController@created', 'eventCreated');
$router->map('POST', '/admin/event/updated', 'EventController@updated', 'eventUpdated');


//news
$router->map('GET', '/admin/news', 'NewsController@newsList', 'newsList');
$router->map('GET', '/admin/news/create', 'NewsController@create', 'newsCreate');
$router->map('GET', '/admin/news/update/[i:id]', 'NewsController@update', 'newsEdit');
$router->map('GET', '/admin/news/delete/[i:id]','NewsController@delete', 'newsDelete');

$router->map('POST','/admin/news/created', 'NewsController@created', 'newsSave');
$router->map('POST','/admin/news/updated','NewsController@updated', 'newsUpdate');
