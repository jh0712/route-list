<?php
return [
    /**
     * The routes to hide with regular expression.
     */
    'filter_regular' => [
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],
    /**
     * The columns array can help you to change which columns do you want to show for datatable.
     */
    'columns' => [
        'methods'    => ['title' => 'Method'],
        'domain'     => ['title' => 'Domain'],
        'path'       => ['title' => 'Path'],
        'name'       => ['title' => 'Name'],
        'action'     => ['title' => 'Action'],
        'middleware' => ['title' => 'Middleware'],
    ],
    /**
     * The pageLengthOptions array can help you to setting showing item for datatable.
     */
    'pageLengthOptions' => [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    /**
     * choose column to sort.
     * array > 0,1,2,3,4,5
     * asc >> 1,2,3,4
     * desc >> 4,3,2,1
     */
    'tableOrder' => [1, 'asc'],
];
