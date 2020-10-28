@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Gallery</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="new-fullwidth.html">Gallery</a></li>
                            <li>Gallery DPD</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-post">
                        <div class="single-text1">
                            <div class="project-info">
                                <form id="search-form">
                                    <ul>
                                    <li>
                                        <span class="name"><h4>Pencarian Terfokus DPD</h4></span>
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
                                        </span>
                                    </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-wrap post-grid wrap-column clearfix">
                @foreach ($images as $image)
                    <article class="entry border-shadow flat-column3 clearfix">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a href="#"> <img src="{{url('storage/'.$image->image)}}" alt="image"></a>
                            </div><!-- /.feature-post -->
                            <div class="content-post">
                                <span class="category">{{$image->type}} {{$image->regency ? '| '.$image->regency->name : ''}}</span>
                                <h2 class="title-post"><a href="#">{{$image->description}}</a></h2>
                                <div class="meta-data style2 clearfix">
                                    <ul class="meta-post clearfix">
                                        <li class="day-time">
                                            <span>{{$image->created_at}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.contetn-post -->
                        </div><!-- /.entry-border -->
                    </article>
                @endforeach

            </div>
            <div class="blog-pagination clearfix">
                {{$images->links()}}
            </div><!-- /.blog-pagination -->
        </div><!-- /.container -->
    </section>
@endsection
@section('script')
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
@endsection
