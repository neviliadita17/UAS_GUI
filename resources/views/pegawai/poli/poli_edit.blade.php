<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
    <script src="{{url('/assets/vue/vue.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    @include('sidebar')

    <div class="main" id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="header">
            <div class="row">
                <div class="col-12 col-s-12" style="overflow-x:auto;">
                    <h1>Form Penambahan Poli</h1>
                </div>
            </div>
        </div>


        <div id="app" class="row">
            <div class="col-12 col-s-12 data_tabel" style="overflow-x:auto;">
                <form action="{{url('/pegawai/poli/edit/action')}}" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form_in">
                            <div class="col-8 col-s-6" style="min-width: 500px;">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$tb_poli->id_poli}}">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="fname">Nama Poli</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="fname" name="nama_poli" placeholder="Nama Poli.." required value="{{$tb_poli->nama_poli}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="subject">Deskripsi</label>
                                    </div>
                                    <div class="col-75">
                                        <textarea id="subject" name="deskripsi" placeholder="Deskripsi.." required style="height:200px">{{$tb_poli->deskripsi}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-s-6" style="min-width: 200px;">
                                <div style="padding: 15px; margin-top: 6px; text-align: center;">
                                    <div>
                                        <img v-if="url" :src="url" style="width: 100%; max-width: 200px;" />
                                    </div>
                                    <div class="wrapperfile">
                                        <div class="file-upload" @change="onFileChange">
                                            <input type="file" name="file" />
                                            <i class="fa fa-arrow-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>

        @include('footer')

    </div>
</body>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("myTopnav").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("myTopnav").style.marginLeft = "0";
    }

    function topNav() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
            document.getElementById("main").style.marginTop = "0";
        } else {
            x.className = "topnav";
        }
    }

    const vm = new Vue({
        el: '#app',
        data() {
            return {
                url: "{{$tb_poli->gambar_poli}}",
            }
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.test = {
                    name: URL.createObjectURL(file)
                };
                this.url = URL.createObjectURL(file);
                console.log(file)
            }
        }
    })
</script>

</html>
