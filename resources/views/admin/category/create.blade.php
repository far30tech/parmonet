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
            <h3 class="card-title">افزودن  دسته بندی جدید</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form @submit="formSubmit" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body" >
          <vue-progress-bar></vue-progress-bar>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>دسته بندی اصلی : </label>
                  <select name="category_parent" v-model="form.category_parent" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option>گلستان</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>
                <div class="form-group">
                    <label>عنوان</label>
                    <input type="text" class="form-control" v-model="form.category_name" name="category_name" placeholder="عنوان دسته بندی را وارد نمایید...">
                  </div>
                  <div class="form-group">
                    <div class="mb-3">
                    <label>توضیحات</label>
                      <textarea id="editor1" v-model="form.category_description" name="category_description" style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
                    </div>
                  </div>
                </div>
             
              <!-- /.col -->
              <div class="col-md-6">
                <img name="category_image" id="category_image"  class="category_image" width="100%" height="291" src="{{asset('dist/img/blank.png')}}" alt="">
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
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
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
          toolbar: { fa: true }
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
                  category_parent: '',
                    
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
                  
                    axios.post('/admin/category/store', {
                        name: this.form.category_name,
                        description: this.form.category_description,
                        parent: this.form.category_parent,
                       
                    })

                        .then(function (response) {
                            currentObj.output = response.data.success;
                            swal.fire(
                                {
                                    text: "Category با موفقیت ثبت شد !",
                                    type: "success",
                                    confirmButtonText: 'باشه',
                                }
                            );
                           
                        })
                        .catch(function (error) {
                            // this.allerros = error.response.data.errors;
                            // this.x=String(this.allerros.name);

                            currentObj.output = error;
                        });
                    this.$Progress.finish();
                }
            },
            mounted: function () {

            }
        });
    </script>










@endsection

