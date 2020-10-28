@extends('master')
@section('content')
    <section class="flat-row services-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="item-wrap">
                        <div class="item item-details">
                            <div class="featured-item">
                                <img src="{{url('storage/'.$post->image)}}" alt="image">
                            </div><!-- /.feature-post -->
                            <div class="content-item">
                                <h2 class="title-item">{{$post->title}}</h2>
                                {!!$post->body!!}
                            </div><!-- /.content-item -->
                        </div><!-- /.item -->
                    </div><!-- /.item-wrap -->
                </div><!-- /.Col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
