@extends('layouts.admin.admin')

@section('title')افزودن دسته بندی جدید @endsection
@section('style')



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="{{ asset('dist/css/persian-datepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
    <!-- Theme style -->

@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">خانه1</a></li>
    <li class="breadcrumb-item"><a href="#">خانه2</a></li>
    <li class="breadcrumb-item"><a href="#">خانه3</a></li>
    <li class="breadcrumb-item"><a href="#">خانه4</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid" id="area">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">افزودن دسته بندی جدید</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form @submit="formSubmit" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <vue-progress-bar></vue-progress-bar>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" class="form-control" v-model="form.category_name"
                                           name="category_name" placeholder="عنوان دسته بندی را وارد نمایید...">
                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>دسته بندی اصلی : </label>
                                            <select name="category_parent" v-on:change="maincategorychangeItem($event)" v-model="form.category_parent1"
                                                    class="form-control"
                                                    style="width: 100%;" >
                                                <option value=""></option>
                                                <option v-for="(category,index) in categories.data" :key="category.id"
                                                        v-bind:value="category.id">
                                                    @{{category.name}}
                                                </option>

                                            </select>

                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>

                                            <br>


                                        </div>

                                    </div>
                                    <div v-if="subcategories"  class="col-md-3">
                                        <div class="form-group">
                                            <label>دسته   : </label>
                                            <select name="category_parent" v-on:change="subcategorychangeItem($event)" v-model="form.category_parent2"
                                                    class="form-control"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value=""></option>
                                                <option v-for="(subcategory,index) in subcategories.data" :key="subcategory.id"
                                                        v-bind:value="subcategory.id">
                                                    @{{subcategory.name}}
                                                </option>

                                            </select>

                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>

                                            <br>


                                        </div>

                                    </div>
                                    <div v-if="subsubcategories"  class="col-md-3">
                                        <div class="form-group">
                                            <label>دسته   : </label>
                                            <select name="category_parent" v-on:change="subschangeItem($event)" v-model="form.category_parent3"
                                                    class="form-control"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value=""></option>
                                                <option v-for="(subsubcategory,index) in subsubcategories.data" :key="subsubcategory.id"
                                                        v-bind:value="subsubcategory.id">
                                                    @{{subsubcategory.name}}
                                                </option>

                                            </select>

                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>

                                            <br>


                                        </div>

                                    </div>
                                    <div v-if="subs"  class="col-md-3">
                                        <div class="form-group">
                                            <label>دسته   : </label>
                                            <select name="category_parent" v-model="form.category_parent4"
                                                    class="form-control"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value=""></option>
                                                <option v-for="(sub,index) in subs.data" :key="sub.id"
                                                        v-bind:value="sub.id">
                                                    @{{sub.name}}
                                                </option>

                                            </select>

                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>

                                            <br>


                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mb-3">
                                        <label>توضیحات</label>
                                        <textarea id="editor1"  v-model="form.category_description"
                                                  name="category_description" style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <img style="cursor:pointer" name="category_image" id="category_image"
                                     class="category_image" width="100%" height="291"
                                     src="{{asset('dist/img/blank.png')}}" alt="">
                                <input type="file" id="category_file" onchange="readURL(this);" style="display: none;"/>

                            </div>
                            <!-- /.row -->
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                                <span>  @{{output}}</span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <!-- Bootstrap 4 -->


    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- Persian Data Picker -->
    <script src="{{ asset('dist/js/persian-date.min.js')}}"></script>
    <script src="{{ asset('dist/js/persian-datepicker.min.js')}}"></script>



    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()


            $('.normal-example').persianDatepicker();


        })
    </script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: {fa: true}
            })
        })
    </script>




    <script>

        var app = new Vue({
            el: '#area',
            data: {

                form: {
                    category_name: '',
                    category_description: '',
                    category_parent1: '',
                    category_parent2: '',
                    category_parent3: '',
                    category_parent4: '',
                    category_file: '',
                    },
                selected: "selected",
                categories: '',
                subcategories : '',
                subsubcategories : '',
                subs : '',
                allerros: [],
                success: false,
                output: ''
            },

            methods: {
                maincategorychangeItem: function maincategorychangeItem(event) {
                    let id = event.target.value;
                    let data = this;
                    axios.get(`/admin/category/fetchsubcat/${id}`)
                        .then(res => {
                            data.subcategories = res.data;
                        });

                },
                subcategorychangeItem: function subcategorychangeItem(event) {
                    let id = event.target.value;
                    let data = this;
                    axios.get(`/admin/category/fetchsubsubcat/${id}`)
                        .then(res => {
                            data.subsubcategories = res.data;
                        });

                },
                subschangeItem: function subschangeItem(event) {
                    let id = event.target.value;
                    let data = this;
                    axios.get(`/admin/category/fetchsubs/${id}`)
                        .then(res => {
                            data.subs = res.data;
                        });

                },
                fetchCategories() {

                    this.$Progress.start();
                    let data = this;
                    axios.get('/admin/category/fetch')
                        .then(res => {
                            data.categories = res.data;
                        });
                    this.$Progress.finish();

                },
                formSubmit(e) {
                    e.preventDefault();
                    this.$Progress.start();
                    let currentObj = this;
                    if(this.form.category_parent1 !== '')
                    {
                        this.postparent = this.form.category_parent1;
                    }
                    if(this.form.category_parent2 !== '')
                    {
                        this.postparent = this.form.category_parent2;
                    }
                    if(this.form.category_parent3 !== '')
                    {
                        this.postparent = this.form.category_parent3;
                    }
                    if(this.form.category_parent4 !== '')
                    {
                        this.postparent = this.form.category_parent4;
                    }

                    axios.post('/admin/category/store', {
                        name: this.form.category_name,
                        description: $("#editor1").val(),
                        parent: this.postparent,
                        image: this.form.category_file,

                    })

                        .then(function (response) {

                            // currentObj.output = response.data.success;
                            swal.fire(
                                {
                                    text: "Category با موفقیت ثبت شد !",
                                    type: "success",
                                    confirmButtonText: 'باشه',
                                }
                            );
                            this.categories =  '';
                            this.subcategories = '';
                            this.subsubcategories = '';
                            this.subs = '';
                        })
                        .catch(function (error) {
                            // this.allerros = error.response.data.errors;
                            // this.x=String(this.allerros.name);

                            currentObj.output = error;
                        });

                    this.form.category_name = '';
                    this.form.category_description = '';
                    this.form.category_parent = '';
                    this.$Progress.finish();
                    this.categories =  '';
                    this.subcategories = '';
                    this.subsubcategories = '';
                    this.subs = '';
                    this.fetchCategories();
                    this.categories =  '';
                    this.subcategories = '';
                    this.subsubcategories = '';
                    this.subs = '';

                }
            },
            mounted: function () {

                this.categories =  '';
                this.subcategories = '';
                this.subsubcategories = '';
                this.subs = '';
                this.fetchCategories();
                this.categories =  '';
                this.subcategories = '';
                this.subsubcategories = '';
                this.subs = '';

            }

        });
    </script>




    <script>
        $("#category_image").click(function () {
            $("input[id='category_file']").click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#category_image')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(291);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>





@endsection

