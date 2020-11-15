<div class="card-body">
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp

                @foreach ($users as $key => $item)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td> <img src="/{{ $item->photo }}" style="height: 40px;" alt=""></td>
                        <td>{{ $item->role_id }}</td>
                        <td>{{ $item->created_at->format('d-M-Y h:i:s a') }}</td>
                        <td>
                            <ul class="d-flex justify-content-center table_action_list">
                                <li><a href="{{ route('admin_user_profile',$item->slug) }}"><i class="fa fa-plus"></i></a></li>
                                <li>
                                    <a href="#" class="edit_btn"
                                        data-href="{{ route('admin_user_update') }}"
                                        data-edit_href="{{ route('admin_user_edit') }}?id={{ $item->id }}"
                                        data-toggle="modal" data-target="#formemodal">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li><a href="#" data-href="{{ route('admin_user_delete', $item->id) }}"
                                        class="delete_btn" data-toggle="modal"
                                        data-target="#modal-animation-1"><i class="fa fa-trash"></i></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    {{ $users->links() }}
</div>
