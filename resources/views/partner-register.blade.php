@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Daftar Menjadi Mitra</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                            <li><a href="#">Info Mitra</a></li>
                            <li>Daftar Menjadi Mitra</li>
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
                            <h1>Mari Bergabung Bersama Kami !</h1>
                            <p>Isilah form dibawah ini untuk mendaftar jadi mitra</p>
                            <form id="contactform" class="contactform style4  clearfix" method="post" action="/submit-partner" novalidate="novalidate">
                                @csrf
                                <span class="flat-input"><input name="name" type="text" value="" placeholder="Nama*" required="required"></span>
                                <span class="flat-input"><input name="company" type="text" value="" placeholder="Perusahaan" ></span>
                                <span class="flat-input">
                                    <select name="province" id="province" class="form-control" style="margin-bottom: 30px">
                                        <option value="">== Pilih Provinsi* ==</option>
                                        @foreach (Navigation::list_province() as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                <span class="flat-input">
                                    <select name="regency" id="regency" style="margin-bottom: 30px">
                                        <option value="">== Pilih Kota* ==</option>
                                    </select>
                                </span>
                                <span class="flat-input">
                                    <select name="partner_type" id="partner_type" style="margin-bottom: 30px">
                                        <option value="">== Pilih Kategori Partner* ==</option>
                                        <option value="1">Suplier Barang</option>
                                        <option value="0">Jasa</option>
                                    </select>
                                </span>
                                <span class="flat-input">
                                    <select name="partner_category" id="partner_category" style="margin-bottom: 30px">
                                        <option value="">== Pilih Jenis Layanan* ==</option>
                                    </select>
                                </span>
                                <!--<span class="flat-input">-->
                                <!--    <select name="province_range" id="province_range" style="margin-bottom: 30px">-->
                                <!--        <option value="">== Jangkauan Provinsi* ==</option>-->
                                <!--        @foreach (Navigation::list_province() as $province)-->
                                <!--            <option value="{{$province->id}}">{{$province->name}}</option>-->
                                <!--        @endforeach-->
                                <!--    </select>-->
                                <!--</span>-->
                                <!--<span class="flat-input">-->
                                <!--    <select name="regency_range" id="regency_range" style="margin-bottom: 30px">-->
                                <!--        <option value="">== Jangkauan Kota* ==</option>-->
                                <!--    </select>-->
                                <!--</span>-->
                                <span class="flat-input"><input name="email" type="email" value="" placeholder="Email*"></span>
                                <span class="flat-input"><input name="telephone" type="text" value="" placeholder="No Telephone" ></span>
                                <span class="flat-input"><input name="no_hp" type="text" value="" placeholder="NO HP*" required="required"></span>
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" id="submit" title="Submit now">Daftar Mitra</button></span>
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

            $('#province_range').on('change', function () {
                $.ajax({
                    url: '{{ route('regency.store') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).val()
                    },
                    success: function (response) {
                        $('#regency_range').empty();

                        $.each(response, function (id, name) {
                            $('#regency_range').append(new Option(name, id))
                        })
                    }
                })
            });

            $('#partner_type').on('change', function () {
                $.ajax({
                    url: '{{ route('partner-categories') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).val()
                    },
                    success: function (response) {
                        $('#partner_category').empty();

                        $.each(response, function (id, name) {
                            $('#partner_category').append(new Option(name, id))
                        })
                    }
                })
            });
        });
    </script>
@endsection
