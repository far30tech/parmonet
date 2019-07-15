@extends('layouts.admin.admin')

@section('title') نمایش دسته بندی های سایت @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">خانه1</a></li>
    <li class="breadcrumb-item"><a href="#">خانه2</a></li>
    <li class="breadcrumb-item"><a href="#">خانه3</a></li>
    <li class="breadcrumb-item"><a href="#">خانه4</a></li>
@endsection

@section('content')

    <div class="container" id="area">
        <vue-progress-bar></vue-progress-bar>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">کد</th>
                        <th scope="col">نام</th>
                        <th scope="col">عنوان</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" name="id" class="form-control" v-model="search.id" @keyup="searchId" placeholder="جستجو بر اساس کد">
                        </td>
                        <td>
                            <input type="text" name="name" class="form-control" v-model="search.name" @keyup="searchName" placeholder="جستجو بر اساس نام">
                        </td>
                        <td>
                            <input type="text" name="title" class="form-control" v-model="search.parent" @keyup="searchParent" placeholder="جستجو بر اساس عنوان">
                        </td>
                        <td></td>

                    </tr>
                    <tr v-for="(category,index) in categories.data" :key="category.id">
                        <td>@{{category.id}}</td>
                        <td>@{{category.name}}</td>
                        <td>@{{category.parent}}</td>
                        <td>
                            <a @click="deleteCategory(category.id,index)" style="font-size: 20px;">
                                <i class="fa fa-times" style="color: #dc3545"></i>
                            </a>
                        </td>

                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row mt-2">
            <pagination :data="categories" @pagination-change-page="fetchCategories"></pagination>
        </div>
        <div class="panel-footer" v-if="data_results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in data_results">@{{ result.name }}</li>
            </ul>
        </div>
    </div>
@endsection

@section('script')
    <script>

        var app = new Vue({
            el: '#area',
            data: {
               
                search: {
                    id: '',
                    name: '',
                    parent: '',
                },
                success: false,
                categories: '',
                error: {
                    name: '',
                    parent: '',
                },
                data_results: [],
            },
            methods: {
                fetchCategories(page = 1) {
                    
                    this.$Progress.start();
                    let data = this;
                    axios.get('/admin/category/fetch?page=' + page)
                        .then(res => {
                        data.categories = res.data;
                        
                    });
                    this.$Progress.finish();
                    
                },
                
                deleteCategory(id, index) {
                    swal.fire({
                        text: "آیا از پاک کردن اطمینان دارید ؟",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'بله',
                        cancelButtonText: 'لغو',
                    }).then((result) => {
                        if (result.value) {
                            axios.get(`/admin/category/delete/${id}`)
                                .then(() => {
                                    // this.commentsData.splice(index, 1);
                                    swal.fire(
                                        {
                                            text: "Category با موفقیت حذف شد !",
                                            type: "success",
                                            confirmButtonText: 'باشه',
                                        }
                                    );
                                    this.fetchCategories();
                                }).catch(() => {
                                swal.fire(
                                    {
                                        text: "درخواست شما انجام نشد !",
                                        type: "error",
                                        confirmButtonText: 'باشه',
                                    }
                                )
                            });

                        }
                    });

                },
                searchId(page = 1) {
                    data = this;
                    if (this.search.id.length > 0) {
                        axios.get('/admin/category/search?page=' + page, {params: {id: this.search.id}}).then(response => {
                            data.categories = response.data;
                        });
                    }
                    if (this.search.id.length === 0) {
                        this.fetchCategories();
                    }
                },
                searchName(page = 1) {
                    data = this;
                    if (this.search.name.length > 0) {
                        axios.get('/admin/category/search?page=' + page, {params: {name: this.search.name}}).then(response => {
                            data.categories = response.data;
                        });
                    }
                    if (this.search.name.length === 0) {
                        this.fetchCategories();
                    }
                },
                searchParent(page = 1) {
                    data = this;
                    if (this.search.parent.length > 0) {
                        axios.get('/admin/category/search?page=' + page, {params: {title: this.search.parent}}).then(response => {
                            data.categories = response.data;
                        });
                    }
                    if (this.search.title.length === 0) {
                        this.fetchCategories();
                    }
                },
            },
            mounted: function () {
                this.fetchCategories();
            }
        })
    </script>
@endsection

