@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">{{$longword}}</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('')}}">Beranda</a></li>
                            <li><a href="#">{{$type}}</a></li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <section class="flat-row  page-teammember2 bg-section">
        <div class="container">
            @if ($type != 'DPP')
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-post">
                        <div class="single-text1">
                            <div class="project-info">
                                <form id="search-form">
                                    <ul>
                                    <li>
                                        <span class="name"><h4>Pencarian Terfokus {{$type}}</h4></span>
                                        <span class="name">Pilih Provinsi
                                            <select name="province" id="province" class="form-control">
                                                <option value="">== Pilih Semua ==</option>
                                                @foreach (Navigation::list_province() as $province)
                                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                        @if ($type == 'DPD')
                                        <span class="name">Pilih Kota
                                            <select name="regency" id="regency" class="form-control">
                                                <option value="">== Pilih Kota ==</option>
                                            </select>
                                        </span>
                                        @endif
                                        <span class="info"
                                        ><button type="submit" class="btn btn-default">
                                            Cari
                                        </button></span>
                                        <span class="info">
                                        </span>
                                    </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="title-section text-center">
                        <h1 class="title">{{$type}}</h1>
                        <div class="sub-title">
                            {{$longword}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($managements as $management)
                <div class="col-lg-3 col-sm-6">
                    <div class="flat-team style2">
                    <div class="avatar">
                        @php
                            $img = '.'.pathinfo('storage/'.$management->photo, PATHINFO_EXTENSION);
                            $imgName = str_replace($img,'', $management->photo);
                            $img = $imgName.'-cropped'.$img;
                          @endphp
                        <a href="{{'storage/'.$img}}">
                            <img src="{{'storage/'.$img}}" />
                        </a>
                    </div>
                    <div class="content text-center">
                        <div class="info-team">
                        <h5 class="name">{{$management->name}}</h5>
                        <p class="position">{{$management->position}}</p>
                        </div>
                        <ul class="social-links style3 team">
                        <li>
                            <a href="{{'storage/'.$img}}"></a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    @if ($type == 'DPD')
    <script>
        $(function () {

            $('#province').on('change', function () {
                $.ajax({
                    url: '{{ route('areas') }}',
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
    @endif
@endsection
