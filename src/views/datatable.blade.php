<div class="table-responsive">
    <table id="routelist-table" class="table table-striped table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <tr>
            @foreach ($columns as $field => $setting)
                <th>{{ $setting['title'] }}</th>
            @endforeach
        </tr>
        </thead>
    </table>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            // 定義 DataTable 的欄位設定
            var columns = @json($columns);

            // 定義 DataTable 的 AJAX URL
            var ajaxUrl = '{{$ajaxUrl}}';

            // 定義 DataTable 的顯示數量設定
            var pageLengthOptions = @json($pageLengthOptions);

            // 定義 order 的顯示數量設定
            var tableOrder = @json($tableOrder);
            $('#routelist-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: ajaxUrl,
                columns: Object.keys(columns).map(function(field) {
                    return {
                        data: field,
                        name: field,
                        title: columns[field]['title']
                    };
                }),
                pageLength: 25, // 預設顯示 25 筆資料
                lengthMenu: pageLengthOptions,
                order: [tableOrder]
            });
        });
    </script>
@endpush
