@extends('layouts.admin')

@section('content')

    <div class="main-content-inner">

        <div class="main-content-wrap">

            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>All Messages</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All Messages</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                      @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show p-3 fs-4" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($contacts as $contact)

                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->comment }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>  

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $contacts->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>



@endsection

@push('scripts')
    <script>
            $(function() {
        $('.delete').on("click", function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Are you Sure",
                text: "Once deleted, you will not be able to recover this data",
                type: "warning",
                buttons: ["No", "Yes"],
                confirmButtonColor: '#dc3545'
            }).then(function(result) {
                if (result) {
                    form.submit();
                }
            });
        });
    });
    </script>
@endpush