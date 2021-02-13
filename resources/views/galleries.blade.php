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
                            <li>Gallery</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row blog-grid">
        <div class="container">
            <div class="post-wrap post-grid row clearfix">
                @foreach ($images as $image)
                    <article class="entry border-shadow col-md-4 clearfix">
                        <div class="entry-border clearfix" style="">
                            <div class="featured-post">
                                <a href="{{url('storage/'.$image->image)}}"> <img style="height:300px;width:100%" src="{{url('storage/'.$image->image)}}" alt="image"></a>
                            </div><!-- /.feature-post -->
                            <div class="content-post">
                                <h5 class="title-post" style="font-size:12px;">{{$image->description}}</h5>
                                
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
