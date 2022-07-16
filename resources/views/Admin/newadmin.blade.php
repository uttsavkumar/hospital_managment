@extends('Admin.adminnav')

@section('admin')
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.insertnewadmin') }}" class="btn btn-primary float-end ">Add a New Admin </a>
            </div>
            <div class="col-12 mt-1">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($admin as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>
                                {{-- {!! Session::get('admin_email') !!} --}}
                               <div class="d-flex">
                                {{ $b->admin_name }}
                                @if (Session::get('admin_email') == $b->admin_email)
                                    <div style="width: 10px;height:10px;border-radius:50px;background-color:rgb(0, 255, 0)" class=""></div>
                                    (active admin)
                                @endif
                               </div>
                            </td>
                            <td>{{ $b->admin_email }}</td>
                            <td>
                                @if (Session::get('admin_email') == $b->admin_email)
                                    <a href="#" style="cursor: default;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="grey"
                                            class="bi bi-trash " viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('admin.deletenewadmin', $b->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="red"
                                            class="bi bi-trash " viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection