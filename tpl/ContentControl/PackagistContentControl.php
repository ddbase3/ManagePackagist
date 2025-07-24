<div id="PackagistContentControl" class="contentcontrol">
	<div id="wrap">
                <div id="datatable"></div>
	</div>
</div>


<div id="ServerContentControl" class="contentcontrol">
        <div id="wrap">
                <div id="serverDatatable"></div>
        </div>
</div>

<script>
        var columns = [
                { key: 'name', label: 'Name' },
                { key: 'url', label: 'URL' },
                { key: 'description', label: 'Beschreibung' },
                { key: 'downloads', label: 'Downloads' }
        ];

        $('#datatable').jqueryDataTable({
                dataSource: '?name=packagistconnector&out=json',
                columns: columns,
                sortColumn: 'name',
                sortDirection: 'asc',
                pageSize: 20,
                onRowClick: function(row) {
                        console.log('Zeile geklickt:', row);
                }
        });
</script>


