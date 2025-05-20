@extends('backend.app')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h1 class="mt-4 text-primary ">Category Create</h1>

                    <div class="shadow p-3 mb-5 bg-body rounded" >

                        

                        <form action="{{route('category.store') }}" method="POST">

                            @csrf
                            <div class="mb-3">

                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input type="text" name="categoryName" class="form-control" id="exampleFormControlInput1" placeholder="Category..">

                            </div>

                            <input type="submit" class="btn btn-primary my-4 w-100 fw-semibold" value="Create">

                        </form>
                        
                    
                            

                             
                            
                            <!-- <label for="exampleInputName" class="form-label my-3">Category Name</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select> -->

                            

                        </div>
                    </div>

        

@endsection