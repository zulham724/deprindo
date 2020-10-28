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
                            <li class="home"><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                            <li><a href="new-fullwidth.html">Gallery</a></li>
                            <li>Gallery DPP</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row blog-grid">
        <div class="container">
            <div class="post-wrap post-grid wrap-column clearfix">
                @foreach ($images as $image)
                    <article class="entry border-shadow flat-column3 clearfix">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a href="{{url('storage/'.$image->image)}}"> <img src="{{url('storage/'.$image->image)}}" alt="image"></a>
                            </div><!-- /.feature-post -->
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
