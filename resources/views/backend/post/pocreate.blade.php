@extends('backend.app')


@section('content')

           


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h1 class="mt-4 text-primary ">Post Create</h1>

                    <div class="shadow p-3 mb-5 bg-body rounded" >


                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Titel</label>
                                <input type="Text" name="titel" class="form-control" id="exampleFormControlInput1" placeholder="Post titel">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Category Name</label>
                                <select name="category"  class="form-select" id="inputGroupSelect01">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="summernote" class="form-control"></textarea>
                            </div>

                            <label for="exampleFormControlInput3" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleFormControlInput3" >
                

                            <input type="submit" class="btn btn-primary my-4 w-100 fw-semibold" value="Save">

                        </form>
                        

                    </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>

        

@endsection