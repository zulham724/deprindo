@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Artikel</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="projects.html">Artikel</a></li>
                            <li>Artikel</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row flat-project-v1">
        <div class="container">
            <div class="post-wrap project-v1 post-list clearfix">
                @foreach ($posts as $post)
                    <article class="entry border-shadow clearfix">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a href="{{url('/detail-article?id='.$post->id)}}"> <img src="{{url('storage/'.$post->image)}}" alt="image" width="500px"></a>
                            </div><!-- /.feature-post -->
                            <div class="content-post">
                                <!--<span class="category">{{$post->category_id}}</span>-->
                                <h2 class="title-post"><a href="{{url('/detail-article?id='.$post->id)}}">{{$post->title}}</a></h2>
                                <p>{{$post->excerpt}}</p>
                                <a href="{{url('/detail-article?id='.$post->id)}}" class="readmore">READ MORE</a>
                            </div><!-- /.contetn-post -->
                        </div><!-- /.entry-border -->
                    </article>
                @endforeach

            </div>

            <div class="blog-pagination clearfix">

                <ul class="flat-pagination  float-left clearfix">

                    {{-- <li class="active"><a href="#"></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">Next<i class="fa fa-angle-double-right"></i></a></li> --}}
                </ul><!-- /.flat-pagination -->
                <div class="count-page float-right">
                    {{ $posts->links() }}
                    {{-- <span>Page {{ $posts->currentPage() }} of {{ $posts->total() }} results, {{ $posts->perPage() }} Perhalaman</span> --}}
                </div>
            </div><!-- /.blog-pagination -->
        </div><!-- /.container -->
    </section>
@endsection
