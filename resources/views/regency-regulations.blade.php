@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Peraturan Pemerintah Daerah</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                            <li><a href="#">Artikel</a></li>
                            <li>Peraturan Pemerintah Daerah</li>
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
                                    <h4>Filter</h4>
                                    <ul>
                                    <li>
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
                        @foreach($pages as $page)
                            <div class="single-text1">
                                <h2>{{$page->name}}</h2>
                                <p>{{$page->description}}  |
                                    @foreach (json_decode($page->file) as $file)
                                        <a target="_blank" href="{{asset('storage/'.$file->download_link)}}">Unduh File</a>
                                    @endforeach
                                </p>
                            </div>
                        @endforeach
                        {{$pages->links()}}
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
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
    });
  </script>
@endsection
