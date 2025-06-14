@extends('backend.app')

@section('content')



    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-primary ">User List</h1>

                            <div class="border border-1 shadow p-3 mb-5 bg-body rounded">
                           
                                <table class="table table-bordered">
                                <thead class="table-primary">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </thead>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="visually-hidden">{{ $user->password }}</td>
                                    <td>
                                        
                                        <div class="btn btn-outline-primary" > <a href="" class="text-decoration-none text-primary hover-text-white"> <i class="fa-solid fa-wrench"></i> Edit</a> </div>
                                        <!-- <div class="btn btn-outline-danger" > <a href="" class="text-decoration-none text-danger hover-text-white"> <i class="fa-solid fa-trash"></i> Delete</a> </div> -->
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <!-- <input type="submit" class="btn btn-success fa-solid fa-wrench" value="Edit"> -->
                                        <!-- <input type="submit" class="btn btn-danger fa-solid fa-trash" value="Delete"> -->
                                    </td>
                                </tr>
                                @endforeach
                                </table>

                                {{ $users->links('pagination::Bootstrap-5') }}

                                <!-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                        </li>
                                    </ul>
                                </nav> -->

                            </div>

                            

@endsection
