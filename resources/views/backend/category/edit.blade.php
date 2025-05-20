@extends('backend.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-primary">Edit Category</h1>

            <div class="shadow p-3 mb-5 bg-body rounded">

                {{-- Show validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('category.update', $categories->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input type="text" name="categoryName" value="{{ old('categoryName', $categories->name) }}" class="form-control" placeholder="Category..">
                    </div>

                    <input type="submit" class="btn btn-primary my-3 w-100 fw-semibold" value="Update">
                </form>

            </div>
        </div>
    </main>
</div>
@endsection
