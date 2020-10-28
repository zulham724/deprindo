@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Daftar Anggota</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="#">Anggota</a></li>
                            <li>Daftar Anggota</li>
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
                            <h1>Untuk menjadi anggota DEPRINDO selain perusahaan berbadan hukum bisa juga atas nama perorangan</h1>
                            <p>isi Form dibawah ini untuk mendaftar Anggota, kami akan menghubungi anda untuk verifikasi kelengkapan lainnya</p>
                            <form id="contactform" class="contactform style4  clearfix" method="post" action="/submit-members" novalidate="novalidate">
                                @csrf
                                <span class="flat-input">
                                    <select name="type_member" id="type_member" class="form-control" style="margin-bottom: 30px">
                                            <option value="#">== Daftar Atas Nama ==</option>
                                            <option value="0">Perusahaan</option>
                                            <option value="1">Perorangan</option>
                                    </select>
                                </span>
                                <span class="flat-input"><input name="name" type="text" value="" placeholder="Nama*" required="required"></span>
                                <span class="flat-input"><input name="company" id="company" type="text" value="" placeholder="Perusahaan (Jika Atas Nama Perusahaan)" ></span>
                                <span class="flat-input">
                                    <select name="province" id="province" class="form-control" style="margin-bottom: 30px">
                                        <option value="">== Pilih Provinsi ==</option>
                                        @foreach (Navigation::list_province() as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                                <span class="flat-input">
                                    <select name="regency" id="regency" class="form-control" style="margin-bottom: 30px">
                                        <option value="">== Pilih Kota ==</option>
                                    </select>
                                </span>
                                <span class="flat-input"><input name="npwp" type="text" value="" placeholder="NPWP Pribadi/Perusahaan*" required="required"></span>
                                <span class="flat-input"><input name="telpon" type="text" value="" placeholder="No Telpon" ></span>
                                <span class="flat-input"><input name="no_hp" type="text" value="" placeholder="No HP Pribadi/Pimpinan*" required="required"></span>

                                <span class="flat-input"><input name="email" type="email" value="" placeholder="Email" required="required"></span>
                                {{-- <span class="flat-input"><input name="url" type="url" value="" placeholder="Website" required="required"></span> --}}
                                {{-- <span class="flat-input"><textarea name="message" placeholder="Messages" required="required"></textarea></span> --}}
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" id="submit" title="Submit now">Daftar</button></span>
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
            $('#company').hide();
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
            $('#type_member').on('change', function () {
                if($(this).val() == 0){
                    $('#company').show();
                }else{
                    $('#company').hide();
                }
                    
            });
        });
    </script>
@endsection
