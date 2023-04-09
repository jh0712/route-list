<?php
return [
    /**
     * The routes to hide with regular expression
     */
    'filter_regular' => [
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],
    'columns' => [
        'methods'    => ['title' => 'Method'],
        'domain'     => ['title' => 'Domain'],
        'path'       => ['title' => 'Path'],
        'name'       => ['title' => 'Name'],
        'action'     => ['title' => 'Action'],
        'middleware' => ['title' => 'Middleware'],
    ],
    'pageLengthOptions' => [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    'tableOrder' => [1, 'asc'],
];
