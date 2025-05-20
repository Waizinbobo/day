@extends('backend.app')

@section('content')



    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-primary ">Post List</h1>

                            <div class="border border-1 shadow p-3 mb-5 bg-body rounded">
                           
                                <table class="table table-bordered">
                                <thead class="table-primary">
                                    <th>No</th>
                                    <th>Titel</th>
                                    <th>CategoryName</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>

                                @foreach($posts as $post)

                                <tr>
                                    <td>{{ $post->id }} </td>
                                    <td>{{ $post->titel }}</td>
                                    <td>{{ $post->category_id }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>
                                        
                                        <div class="btn btn-outline-primary" > <a href="" class="text-decoration-none text-primary hover-text-white"> <i class="fa-solid fa-wrench"></i> Edit</a> </div>
                                        <div class="btn btn-outline-danger" > <a href="" class="text-decoration-none text-danger hover-text-white"> <i class="fa-solid fa-trash"></i> Delete</a> </div>

                                        <!-- <input type="submit" class="btn btn-success fa-solid fa-wrench" value="Edit"> -->
                                        <!-- <input type="submit" class="btn btn-danger fa-solid fa-trash" value="Delete"> -->
                                    </td>
                                </tr>

                                @endforeach
                                </table>

                                <nav aria-label="Page navigation example">
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
                                </nav>

                            </div>

                            

@endsection
