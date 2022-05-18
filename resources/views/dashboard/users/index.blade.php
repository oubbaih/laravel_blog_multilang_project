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
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vishnu Serghei</td>
                            <td>2012/01/01</td>
                            <td>Member</td>
                            <td>
                                <span class="tag tag-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Zbyněk Phoibos</td>
                            <td>2012/02/01</td>
                            <td>Staff</td>
                            <td>
                                <span class="tag tag-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Einar Randall</td>
                            <td>2012/02/01</td>
                            <td>Admin</td>
                            <td>
                                <span class="tag tag-default">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Félix Troels</td>
                            <td>2012/03/01</td>
                            <td>Member</td>
                            <td>
                                <span class="tag tag-warning">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Aulus Agmundr</td>
                            <td>2012/01/21</td>
                            <td>Staff</td>
                            <td>
                                <span class="tag tag-success">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTable.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#example').dataTable();
        });

    </script>
    @endsection
</x-dashboard-master>
