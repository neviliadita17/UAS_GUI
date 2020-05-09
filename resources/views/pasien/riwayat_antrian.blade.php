<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="{{url('assets/vue/vue.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>


<body>

    @include('navbar-after')

    <div class="main" id="main">
        <div class="back_antrian" id="card_antrian">
            <div class="container" style="height: 100%;" id="app">
                <h1 style="color: black;">Riwayat Antrian</h1>
                <div class="row" v-for="row in rows" :key="row.id">
                    <div class="col-12">
                        <div id="home_data" class="antrian">
                            <span class="icon_status">
                                <i class='fas fa-notes-medical' style='font-size:36px; margin: 20% 28%;'></i>
                            </span>
                            <h4 style=" text-align: right;">Tanggal : @{{row['Tanggal Antrian']}}</h4>
                            <h1>No Antrian : @{{row['No Antrian']}}</h1>
                            <h2 style=" text-align: center;">Nama Poli : @{{row['Poli']}}</h2>
                            <div class="row" style="text-align: center;">
                                <button class="status_btn" type="button">@{{row['Status']}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('footer')

</body>
<script>
    function topNav() {
        var x = document.getElementById("myTopnav");
        var y = document.getElementById("main");
        if (x.className === "topnav") {
            x.className += " responsive";
            y.className = "";
            document.getElementById("card_antrian").style.marginTop = "30px";
        } else {
            x.className = "topnav";
            y.className = "main";
            document.getElementById("card_antrian").style.marginTop = "80px";
        }
    };
    new Vue({
        el: "#app",
        data: ({
            search: null,
            column: null,
            items: []
        }),
        computed: {
            cols() {
                return this.items.length >= 1 ? Object.keys(this.items[0]) : []
            },
            rows() {
                if (!this.items.length) {
                    return []
                }
                return this.items.filter(item => {
                    let props = (this.search && this.column) ? [item[this.column]] : Object.values(item)
                    return props.some(prop => !this.search || ((typeof prop === 'string') ? prop
                        .includes(this.search) : prop.toString(10).includes(this.search)))
                })
            }
        },
        methods: {
            upDate: function() {
                axios.get('http://localhost:8000/pasien/riwayat-api')
                    .then(response => this.items = response.data['data'])
            }
        },
        mounted() {
            this.upDate();
            this.timer = setInterval(this.upDate, 5000)
        }
    });
</script>

</html>
