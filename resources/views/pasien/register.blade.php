<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="{{url('/assets/vue/vue.js')}}"></script>
    <style></style>
</head>



<body>
    <div class="container_r">
        <div class="col-12">
            <a href="{{url('/')}}" class="btn btn-reverse btn-arrow btnbutton" style="float: right;">
                <span>Back<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.1 25.8" enable-background="new 0 0 36.1 25.8" xml:space="preserve">
                        <g>
                            <line fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" x1="0" y1="12.9" x2="34" y2="12.9"></line>
                            <polyline fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" points="22.2,1.1 34,12.9 22.2,24.7   "></polyline>
                        </g>
                    </svg></span>
            </a>

            <h1>Register</h1>
            <p>Mohon isi data secara lengkap dan benar.</p>
            <hr style="height: 10px; background-color: black; border: 10px;">

            <div id="app">
                <form method="POST" action="{{url('/pasien/register/action')}}" id="form_reg">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password  "></input>

                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama Lengkap Anda" value="{{old('nama')}}">

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" value="{{old('alamat')}}"></textarea>

                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}"></input>

                    <label for="st_bpjs">Status BPJS</label>
                    <select id="st_bpjs" name="st_bpjs" v-model="selected">
                        <option value="Tidak">Tidak</option>
                        <option value="Iya">Iya</option>
                    </select>

                    <label v-if="selected === 'Iya'" for="n_bpjs">Nomor BPJS</label>
                    <input v-if="selected === 'Iya'" type="number" id="n_bpjs" name="n_bpjs" placeholder="Nomor BPJS ">

                    <label for="st_p">Status Pasien</label>
                    <select id="st_p" name="st_p">
                        <option value="Baru">Baru</option>
                        <option value="Lama">Lama</option>
                    </select>

                    <button type="submit" name="submit" class="registerbtn" value="register"> Register</button>

                </form>
            </div>
        </div>
    </div>

</body>
<script>
    new Vue({
        el: '#app',
        data: {
            selected: 'Tidak'
        }
    });
</script>

</html>