@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Peraturan Pemerintah</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="index.html">Beranda</a></li>
                            <li><a href="#">Artikel</a></li>
                            <li>Peraturan Pemerintah Pusat</li>
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
                    </div>
                </div><!-- /.col-md-6 -->
                {{$pages->links()}}
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
