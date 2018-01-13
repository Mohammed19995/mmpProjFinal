@extends('admin.app')
@section('css')
    <style>
        section {
            padding: 0px;
        }
    </style>
@endsection
@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Category</h2>
        </div>
    </header>
    <div class="content-inner">

        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add Category</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-inline" style="margin-left: 50px">
                                    <div class="form-group">

                                        <input id="inlineFormInput" type="text" placeholder="Enter your category"
                                               class="mx-sm-3 form-control">
                                    </div>

                                    <div class="form-group">

                                        <button class="mx-sm-3 btn btn-primary"><i class="fa fa-plus"></i> Add Category
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Page Footer-->

        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Category</h3>

                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Delete
                                            </button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Delete
                                            </button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Mark</td>
                                        <td>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Delete
                                            </button>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </div>
@endsection
