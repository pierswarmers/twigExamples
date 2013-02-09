<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Person.php';

use \Acme\Person;

$loader = new Twig_Loader_Filesystem(__DIR__);
$twig = new Twig_Environment($loader, array('debug' => true));

$twig->addExtension(new Twig_Extension_Debug());

$matrix = range(1,10);
$matrix[5] = range(1,10);

/*-------------------------------------------
 *
 * Fun stuff starts here!
 *
 * ------------------------------------------
*/

echo $twig->render(

    // Set a template...

    'index.html.twig',

    // Now set the parameters to pass to the template...

    array(
        'test_integer' => 10,
        'test_string' => 'Hello!',
        'test_datetime' => new \DateTime('now'),
        'test_array' => array('name' => 'Sally'),
        'test_xss' => '<script>alert("All your base are belong to us")</script>',
        'test_object' => new Person('Billy'),

        'people' => array(
            '1@example.com' => 'Example 1',
            '2@example.com' => 'Example 2'
        ),

        'numbers' => range(1,10),

        'matrix' => $matrix,

        'name' => 'DrupalCon Sprint'
    )

);
