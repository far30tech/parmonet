@extends('layouts.admin.admin')

@section('title') دسترسی ها @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">خانه1</a></li>
    <li class="breadcrumb-item"><a href="#">خانه2</a></li>
    <li class="breadcrumb-item"><a href="#">خانه3</a></li>
    <li class="breadcrumb-item"><a href="#">خانه4</a></li>
@endsection

@section('content')

    <div class="container" id="area">
        <vue-progress-bar></vue-progress-bar>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" method="post" enctype="multipart/form-data" @submit="formSubmit">
                    <label for="name" class="ml-3"> عنوان : </label>
                    <input type="text" name="name" class="form-control" v-model="form.name" autofocus id="name">
                    <span>  @{{output}}</span>
                    <div class="form-check">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        var app = new Vue({
            el: '#area',
            data: {
                form: {
                    name: '',
                },
                allerros: [],
                success: false,
                output: ''
            },
            methods: {
                formSubmit(e) {
                    e.preventDefault();
                    this.$Progress.start();
                    let currentObj = this;
                    axios.post('/admin/permission/store', {
                        name: this.form.name,
                    })
                        .then(function (response) {
                            currentObj.output = response.data.key;
                            swal.fire(
                                {
                                    text: "Permission با موفقیت ثبت شد !",
                                    type: "success",
                                    confirmButtonText: 'باشه',
                                }
                            );
                        })
                        .catch(function (error) {
                            this.allerros = error.response.data.errors;
                            this.x=String(this.allerros.name[0]);

                            currentObj.output = this.allerros.name[0];
                        });
                    this.$Progress.finish();
                }
            },
            mounted: function () {

            }
        })
    </script>
    454545646456
@endsection

