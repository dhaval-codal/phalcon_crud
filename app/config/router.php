<?php

$router = $di->getRouter();

// Define your routes here
// 
// $router->add(
//     '/showstud',
//     [
//         'controller' => 'student',
//         'action'     => 'index',
//     ]
// );

$router->add(
    '/crtstudview',
    [
        'controller' => 'student',
        'action'     => 'create',
    ]
);

$router->add(
    '/updatestud',
    [
        'controller' => 'student',
        'action'     => 'update',
    ]
);

$router->add(
    '/crtstud',
    [
        'controller' => 'student',
        'action'     => 'createnew',
    ]
);

$router->add(
    '/editstud/{id}',
    [
        'controller' => 'student',
        'action'     => 'edit',
    ]
);

$router->add(
    '/deletestud/{id}',
    [
        'controller' => 'student',
        'action'     => 'delete',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
