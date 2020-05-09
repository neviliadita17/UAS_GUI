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
            <div class="container" style="height: 100%;">
                <h1 style="color: black;">Antrian</h1>
                <div class="row">
                    <div class="col-12" id="app">
                        <div id="home_data" class="antrian" v-for="row in rows" :key="row.id">
                            <span class="icon_status">
                                <i class='far fa-clock' style='font-size:36px; margin: 20%;'></i>
                            </span>
                            <h4 style=" text-align: right;">Tanggal : @{{row['Tanggal Antrian']}}</h4>
                            <h1>No Antrian : @{{row['No Antrian']}}</h1>
                            <h2 style=" text-align: center;">Nama Poli : @{{row['Poli']}}</h2>
                            <div class="row" style="text-align: center;">
                                <div class="col-6">
                                    <form action="{{url('/pasien/delete-antrian')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" :value="row['Id']">
                                        <button style="background-color: red;" class="status_btn" type="submit">Batal</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="{{url('/pasien/konfirmasi-antrian')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" :value="row['Id']">
                                        <button style="background-color: green;" class="status_btn" type="submit">Selesai</button>
                                    </form>
                                </div>
                                <br>
                                <span style="color: red;">*Klik Untuk Merubah Status Antrian</span>
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
                axios.get('http://localhost:8000/pasien/antrian-api')
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
