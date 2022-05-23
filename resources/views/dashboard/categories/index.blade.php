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
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Parent</th>
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
    {{-- Model Setup  --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('dashboard.users.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_use" id="id-name">
                    <p style="padding:2rem; text-align:center; font-size:2rem; text-transform:capitalize;">Are You Sure Want To Delete Category</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection
    @push('javascript')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTable.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#example').dataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: "{{route('dashboard.category.all')}}",
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'content',
                        name: 'content',
                    },
                    {
                        data: 'parent',
                        name: 'parent',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                    },
                ]
            });
        });
        // $('#deleteBtn').on('click'  , function(event){
        //     // var id = $(this).attr('data-id');
        //     // $('#deletemodel  #id').val(id); 
        //     console.log('btn');
        // } )
        function clickFinc() {
            let element = document.getElementById('deleteBtn');
            let id = element.getAttribute('data-id');
            let inputHiddenId = document.getElementById('id-name');
            inputHiddenId.value = id;

            console.log(inputHiddenId);
        }

    </script>
    @endpush
</x-dashboard-master>
