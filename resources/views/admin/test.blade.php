<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
    <style>
        html, body {
            font: 13px/18px sans-serif;
        }
        select {
            min-width: 300px;
        }
    </style>
</head>
<body>
<section id="area"></section>
    <script type="text/x-template" id="demo-template">
        <div>
            <p>Selected: @{{ selected }}</p>
            <select2 :options="options" v-model="selected">
                <option disabled value="0">Select one</option>
            </select2>
        </div>
    </script>

    <script type="text/x-template" id="select2-template">
        <select>
            <slot></slot>
        </select>
    </script>




<script>
    Vue.component('select2', {
        props: ['options', 'value'],
        template: '#select2-template',
        mounted: function () {
            var vm = this
            $(this.$el)
            // init select2
                .select2({ data: this.options })
                .val(this.value)
                .trigger('change')
                // emit event on change.
                .on('change', function () {
                    vm.$emit('input', this.value)
                })
        },
        watch: {
            value: function (value) {
                // update value
                $(this.$el)
                    .val(value)
                    .trigger('change')
            },
            options: function (options) {
                // update options
                $(this.$el).empty().select2({ data: options })
            }
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
    })

    var vm = new Vue({
        el: '#area',
        template: '#demo-template',
        data: {
            selected: 2,
            options: [
                { id: 1, text: 'Hello' },
                { id: 2, text: 'World' }
            ]
        }
    })
    // new Vue({
    //     el: '#area',
    //     data: {
    //         MainCategorySelected: ''
    //     }
    // })
    //
    // var app = new Vue({
    //     el: '#area',
    //     data: {
    //         selected: "selected",
    //         rowId: 10
    //     },
    //     methods: {
    //         changeItem: function changeItem(rowId, event) {
    //             this.selected = "rowId: " + rowId + ", target.value: " + event.target.value;
    //         }
    //     }
    // });
</script>
<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
</body>
</html>
