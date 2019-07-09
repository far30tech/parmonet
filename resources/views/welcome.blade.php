<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>


<div class="container" id="area">
    <vue-progress-bar></vue-progress-bar>
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" method="post" enctype="multipart/form-data" @submit="formSubmit"
                  action="{{route('permission.store')}}">
                <label for="name" class="ml-3"> عنوان : </label>
                <input type="text" name="name" class="form-control" v-model="form.name" autofocus id="name">
                <span>@{{ y }}</span>
                <div class="form-check">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>

        </div>
    </div>

</div>

<div id="app-6">
    <p>@{{ message }}</p>
    <input v-model="message">
</div>


<script>
    var app6 = new Vue({
        el: '#app-6',
        data: {
            message: 'Hello Vue!'
        }
    })


    var app = new Vue({
        el: '#area',
        data: {
            x: 'sssss',
            y: 'oooo',
            form: {
                name: '',
            },
            allerros: [],
            success: false,
            commentsData: [],

        },

        methods: {
            formSubmit(e) {
                e.preventDefault();
                // this.$Progress.start();
                axios.post('/admin/permission/store', {
                    name: this.form.name,
                })
                    .then(function (res) {


                        this.y = res.data.key;

                        console.log(this.y);
                        swal.fire(
                            {
                                text: "Permission با موفقیت ثبت شد !",
                                type: "success",
                                confirmButtonText: 'باشه',
                            }
                        );

                    })
                    .catch(function (error) {
                        // this.allerros = error.response.data.errors;
                        // this.x=String(this.allerros.name[0]);
                        // console.log(this.x);
                        // this.success = false;
                    });
                // this.$Progress.finish();
            }
        },
        mounted: function () {

        }
    })
</script>


</body>
</html>