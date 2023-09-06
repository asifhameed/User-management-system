@extends('templates.master')
@section('title', $data['title']. ' List')

@section('content')
<div class="content">
    @include('templates.partials.alerts')
    <section class="stat-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="h4 my-md-4 my-3">{{ $data['title']." List" }}</h4>
                </div>
                <div class="col-md-6 text-md-right pt-md-4 pr-md-0">
                    {!! add_button($singulartitle, $sectionId, $addTag, $route_path) !!}
                </div>
            </div>
            <!-- end row -->
        </div>
    </section>
    <section class="form-container">
        <div class="container-fluid">
            <div class="row bg-white mb-3 py-3 px-2 shadow-sm">
                <div class="col-md-12">
                    <div class="form-row float-left">
                        <div class="form-group col-md">
                            <label><strong>Status :</strong></label>
                            <select id="status" name="status" class="form-control" style="width: 200px">
                                <option value="">--Select Status--</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row float-left">
                        <div class="form-group col-md">
                            <label>&nbsp;</label><br>
                            <a class="btn btn-theme-green" href="{{ route($home_path) }}" style="margin-left: 10px;">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="report-listing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="table1" class="table table-borderless nowrap table-striped text-center">
                                <thead class="bg-theme-dark text-white">
                                    <tr>
                                        <th width="7%">Sr #</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Role</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </section>		   
</div>
<script>
    $(function () {    
        var table = $('#table1').DataTable({
            processing: true,
            serverSide: true,
            rowId: 'id',
            // ajax: "{{ route($route_path.'.allData') }}",
            ajax: {
                url: "{{ route($route_path.'.allData') }}",
                data: function (d) {
                    d.status = $('#status').val()
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role_id_fk', name: 'role_id_fk'},
                {
                    data: 'status', name: 'status',
                    orderable: false, 
                    searchable: false
                },
                {
                    data: 'action', name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ]
        });
        $('#status').change(function(){
            table.draw();
        });
    });
</script>
@endsection
