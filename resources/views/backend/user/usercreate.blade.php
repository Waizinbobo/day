@extends('backend.app')


@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h1 class="mt-4 text-primary ">User Create</h1>

                    <div class="shadow p-3 mb-5 bg-body rounded" >

                        <form action="{{route('user.store')}}" method="POST">

                         @csrf

                            <div class="mb-3">

                                <label for="exampleFormControlInput1" class="form-label">User Name</label>
                                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name.." require>

                            </div>
                            <div class="mb-3">

                                <label for="exampleFormControlInput2" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="Email.." require>

                            </div>
                            <div class="mb-3">

                                <label for="exampleFormControlInput3" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleFormControlInput3" placeholder="Passowrd.." require>

                            </div>

                             
                            <input type="submit" class="btn btn-primary my-4 w-100 fw-semibold" value="Save">

                        </form>
                        
                    
                            

                        </div>
                    </div>

        

@endsection