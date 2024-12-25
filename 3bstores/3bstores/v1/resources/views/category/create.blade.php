@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name">
                        <input type="text" name="slug">
                        <textarea name="description"></textarea>
                        <fieldset>
                            <input type="file" name="images">
                        </fieldset>
                        <input type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
