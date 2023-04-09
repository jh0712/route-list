<html>
<head>
    <title>RouteList DataTable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
@php
    // 定義 DataTable 的欄位設定
    $columns = config('routelist.columns') ? config('routelist.columns') : [
        'methods' => ['title' => 'Method'],
        'path' => ['title' => 'Path'],
        'name' => ['title' => 'Name'],
        'action' => ['title' => 'Action'],
        'middleware' => ['title' => 'Middleware'],
    ];
    $ajaxUrl = route('route-view.getRouteListData');
    $pageLengthOptions = config('routelist.pageLengthOptions') ? config('routelist.pageLengthOptions') : [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ];
    $tableOrder = config('routelist.tableOrder') ? config('routelist.tableOrder') : [1, 'asc'];
@endphp
<div class="container">
    <h1>Route List</h1>
    <div class="row">
    @include('routelist::datatable',[
        'columns' => $columns,
        'ajaxUrl' => $ajaxUrl,
        'pageLengthOptions'=> $pageLengthOptions,
        'tableOrder' => $tableOrder
    ])
    </div>
    <h1></h1>
</div>
@stack('scripts')
</body>
</html>
