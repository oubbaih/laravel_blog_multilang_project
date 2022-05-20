<x-dashboard-master>
    @section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTable.min.css') }}">
    @endsection
    @section('main')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Combined All Table
            </div>
            <div class="card-block">
                <table class="table-bordered table-striped table-condensed table" id="example">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>User Status</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    @push('javascript')
        <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTable.min.js') }}"></script>

    <script  type="text/javascript" >
        $(function () {
            $('#example').dataTable({
                processing:true,
                serverSide: true,
                order:[
                    [0,"desc"]
                ],
                ajax: "{{route('dashboard.users.all')}}",
                columns:[
                    {
                        data:'id',
                        name : 'id',
                    },
                    {
                        data:'name',
                        name : 'name',
                    },
                    {
                        data:'email',
                        name : 'email',
                    },
                    {
                        data:'status',
                        name : 'status',
                    },
                    {
                        data:'created_at',
                        name : 'created_at',
                    },
                    {
                        data:'updated_at',
                        name : 'updated_at',
                    },
                    {
                        data:'actions',
                        name:'actions',
                    },
                ]
            });
        });

    </script>
    @endpush
</x-dashboard-master>
