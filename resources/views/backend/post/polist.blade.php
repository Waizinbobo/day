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
                                    <th>Image</th>
                                    <th>Action</th>
                                </thead>

                                @foreach($posts as $post)

                                <tr>
                                    <td>{{ $post->id }} </td>
                                    <td>{{ $post->titel }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td> <?= Str::words($post->description ,50,'...') ?> </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $post->cover) }}" width="80">
                                    </td>
                                    <td>
                                        
                                        <div class="btn btn-outline-primary" > <a href="{{ route('post.edit', $post->id) }}" class="text-decoration-none"> <i class="fa-solid fa-wrench"></i> Edit</a> </div>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
                             
                                {{ $posts->links('pagination::Bootstrap-5') }}
                               
                            </div>

                            

@endsection
