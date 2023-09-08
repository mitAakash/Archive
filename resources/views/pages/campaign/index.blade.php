@extends(env('LAYOUT_TEMPLATE'), ['title' => 'Campaign'])
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">Campaign</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Campaign</li>
    </ol>
@endsection
@section('topbutton')
    <a href="{{route('campaign.create')}}" class="btn btn-primary btn-icon-text my-2 me-2">
        <i class="fe fe-plus me-2"></i> Create
    </a>
@endsection

@section('content')
    <div class="row row-sm pb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table id="template" class=" table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>Campaign</span></th>
                                    <th class="wd-lg-20p"><span>Type</span></th>
                                    <th class="wd-lg-20p"><span>Created At</span></th>
                                    <th class="wd-lg-20p"><span>Status</span></th>
                                    <th class="wd-lg-20p"><span>Audience</span></th>
                                    <th class="wd-lg-20p"><span>Submitted</span></th>

                                </tr>
                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var datatable = $('#template').DataTable({
                processing: true,
                serverSide: true,
                bSort: false,
                ajax: {
                    url: "{{ route('template.index') }}",
                },
                columns: [


                ],

            });
        });
    </script>
@endsection
