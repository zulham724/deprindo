@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Berita</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Beranda</a></li>
                            <li><a href="#">Artikel</a></li>
                            <li>Berita</li>
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
                @foreach ($pages as $page)
                    <article class="entry border-shadow flat-column3 clearfix">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a href="{{url('/detail-news?id='.$page->id)}}"> <img src="{{url('storage/'.$page->image)}}" alt="image"></a>
                            </div><!-- /.feature-post -->
                            <div class="content-post">
                                <!--<span class="category">{{$page->author_id}}</span>-->
                                <h2 class="title-post"><a href="{{url('/detail-news?id='.$page->id)}}">{{$page->title}}</a></h2>
                                <div class="meta-data style2 clearfix">
                                    <ul class="meta-post clearfix">
                                        <li class="day-time">
                                            <span>{{date('d-M-Y',strtotime($page->created_at))}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.contetn-post -->
                        </div><!-- /.entry-border -->
                    </article>
                @endforeach

            </div>
            <div class="blog-pagination clearfix">
                <ul class="flat-pagination  float-left clearfix">
                    {{ $pages->links() }}
                    {{-- <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">Next<i class="fa fa-angle-double-right"></i></a></li> --}}
                </ul><!-- /.flat-pagination -->
                {{-- <div class="count-page float-right">
                    <span>Page 1 of 60 results</span>
                </div> --}}
            </div><!-- /.blog-pagination -->
        </div><!-- /.container -->
    </section>
@endsection
