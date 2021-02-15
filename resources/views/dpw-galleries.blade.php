@extends('master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
        integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
        crossorigin="anonymous" />
@stop
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
                            <li class="home"><i class="fa fa-home"></i><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li>Gallery DPW</li>
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
                                            <span class="name">
                                                <h4>Pencarian Terfokus DPW</h4>
                                            </span>
                                            <span class="name">Pilih Provinsi
                                                <select name="province" id="province" class="form-control">
                                                    <option value="all">== Pilih Semua ==</option>
                                                    @foreach (Navigation::list_province() as $province)
                                                        <option value="{{ $province->id }}"
                                                            {{ $province->id == $selected ? 'selected' : '' }}>
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                            <span class="info"><button type="submit" class="btn btn-default">
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
            <div class="post-wrap post-grid row clearfix">
                @foreach ($images as $image)
                    <article class="entry border-shadow col-md-4 clearfix">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a href="{{ url('storage/' . $image->image) }}" data-lightbox="images"> <img style="height:300px;width:100%"
                                        src="{{ url('storage/' . $image->image) }}" alt="image"></a>
                            </div><!-- /.feature-post -->
                            <div class="content-post">
                                <span class="category">{{ $image->type }} |
                                    {{ $image->province ? '| ' . $image->province->name : '' }}</span>
                                <h2 style="font-size:12px;" class="title-post"><a href="#">{{ $image->description }}</a></h2>
                                <div class="meta-data style2 clearfix">
                                    <ul class="meta-post clearfix">
                                        <li class="day-time">
                                            <span>{{ $image->created_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.contetn-post -->
                        </div><!-- /.entry-border -->
                    </article>
                @endforeach

            </div>
            <div class="blog-pagination clearfix">
                {{ $images->links() }}
            </div><!-- /.blog-pagination -->
        </div><!-- /.container -->
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })

    </script>
@stop
