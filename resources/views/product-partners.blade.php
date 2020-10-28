@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">
                            @if($pc)
                                Mitra Supplier {{Navigation::ref_partnercategory($pc)->name}}
                            @else
                                Mitra Supplier Barang
                            @endif
                        </h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="#">Info Mitra</a></li>
                            <li>
                                @if($pc)
                                    Mitra Supplier {{Navigation::ref_partnercategory($pc)->name}}
                                @else
                                    Mitra Supplier Barang
                                @endif
                            </li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-post">
                        <div class="single-text1">
                            <div class="project-info">
                                <form id="search-form">
                                    <ul>
                                    <li>
                                        <span class="name"><h4>Pencarian Terfokus</h4></span>
                                        <span class="name">Pilih Provinsi
                                            <select name="province" id="province" class="form-control">
                                                <option value="">== Pilih Semua ==</option>
                                                @foreach (Navigation::list_province() as $province)
                                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                        <span class="name">Pilih Kota
                                            <select name="regency" id="regency" class="form-control">
                                                <option value="">== Pilih Kota ==</option>
                                            </select>
                                        </span>
                                        <span class="info"
                                        ><button type="submit" class="btn btn-default">
                                            Cari
                                        </button></span>
                                        <span class="info">
                                            {{-- <button class="btn btn-default">
                                                Pilih Semua
                                            </button> --}}
                                        </span>
                                    </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <table class="datatable mdl-data-table dataTable" cellspacing="0"
                            width="100%" role="grid" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Kategori</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Handphone</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        var memberTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url :'{{ route('list_productpartners') }}',
                data : function(d){
                    d.province_id = $("#province option:selected").val();
                    d.regency_id = $("#regency option:selected").val();
                    @if($pc)
                        d.pc = '{{$pc}}';
                    @endif
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'leader_name', name: 'leader_name'},
                {data: 'company_name', name: 'company_name'},
                {data: 'partner_category.name', name: 'partner_category_id'},
                {data: 'province.name', name: 'province_id'},
                {data: 'regency.name', name: 'regency_id'},
                @guest
                    {data: null,
                    defaultContent: "<p>Login untuk lihat</p>"},
                @endguest
                @auth
                    {data: 'no_hp', name: 'no_hp'},
                @endauth
            ],
            scrollX: true,
        });
        $('#search-form').on('submit', function(e) {
            memberTable.draw();
            e.preventDefault();
        });
    });

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
                    $('#regency').append(new Option('Pilih Semua', 'all'));
                    $.each(response, function (id, name) {
                        $('#regency').append(new Option(name, id))
                    })
                }
            })
        });
    });
  </script>
@endsection

