@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Penawaran Lahan</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="#">Info Lahan</a></li>
                            <li>Penawaran Lahan</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <section class="flat-row page-contact">
        <div class="container">
            <div class="wrap-formcontact style2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin-left40">
                            <h1>Pemilik Lahan, Kuasa Jual Lahan yang ingin Lahannya  tampil dihalaman LISTING LAHAN Wajib mendapatkan Rekomendasi dari anggota Deprindo</h1><br>
                            <p>Bagi Pemilik Lahan atau Kuasa Jual Lahan yang yang ingin Lahannya ditawarkan ke anggota Deprindo dan tampil dihalaman LISTING LAHAN dapat menghubungi langsung Sekretariat DPD/DPW yang tersedia di HALAMAN PENGURUS DPD/DPW ditingkat Propinsi atau Kabupaten/Kota. 
<br><br>
Bagi anggota Deprindo yang menawarkan Lahan silahkan isi Form dibawah ini dan jangan lupa ketik Nama Anggota serta DPD/DPW anggota
</p>
                            <form id="contactform" class="contactform style4  clearfix" method="post" action="/submit-land" novalidate="novalidate">
                                @csrf
                                <span class="flat-input"><input name="name" type="text" value="" placeholder="Nama Rekom Anggota + DPD/DPW*" required="required"></span>
                                
                                <span class="flat-input"><input name="large" type="number" value="" placeholder="Luas Lahan ()*" required="required"></span>
                                <span class="flat-input">
                                    <select name="province_location" id="province_location" style="margin-bottom: 30px">
                                        <option value="">== Lokasi Provinsi* ==</option>
                                        @foreach (Navigation::list_province() as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                <span class="flat-input"><label for="regency_location"></label>
                                    <select name="regency_location" id="regency_location" style="margin-bottom: 30px">
                                        <option value="">== Lokasi Kota* ==</option>
                                    </select>
                                </span>
                                <span class="flat-input">
                                    <select name="letter" id="letter" style="margin-bottom: 30px">
                                        <option value="">== Jenis Surat* ==</option>
                                        <option value="1">SHM</option>
                                        <option value="0">HGB</option>
                                        <option value="2">AJB/Girik</option>
                                        <option value="3">Kombinasi</option>
                                    </select>
                                </span>
                                
                                <span class="flat-input"><input name="price" type="number" value="" placeholder="Harga Lahan*" required="required"></span>
                                <span class="flat-input">
                                    {{-- <label for="type">Jenis</label> --}}
                                    <select name="type" id="type" style="margin-bottom: 30px">
                                        <option value="">== Jenis Penawaran* ==</option>
                                        <option value="kerjasama">Kerjasama</option>
                                        <option value="termin">Termin</option>
                                        <option value="cashkeras">Cash Keras</option>

                                    </select>
                                </span>
                                <span class="flat-input"><input name="email" type="email" value="" placeholder="Email*" required="required"></span>
                                <span class="flat-input"><input name="no_hp" type="text" value="" placeholder="No HP*" required="required"></span>
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" id="submit" title="Submit now">Tawarkan Lahan</button></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function () {

            $('#province').on('change', function () {
                $.ajax({
                    url: '{{ route('regency.store') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).val()
                    },
                    success: function (response) {
                        $('#regency').empty();

                        $.each(response, function (id, name) {
                            $('#regency').append(new Option(name, id))
                        })
                    }
                })
            });

            $('#province_location').on('change', function () {
                $.ajax({
                    url: '{{ route('regency.store') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).val()
                    },
                    success: function (response) {
                        $('#regency_location').empty();

                        $.each(response, function (id, name) {
                            $('#regency_location').append(new Option(name, id))
                        })
                    }
                })
            });

        });
    </script>
@endsection
