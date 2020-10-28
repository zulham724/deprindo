@extends('master')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Proyek Anggota</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">Anggota</a></li>
                            <li>Proyek Anggota</li>
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
                                    <h4>Filter</h4>
                                    <ul>
                                    <li>
                                        <span class="name">Pilih Provinsi
                                            <select name="province" id="province" class="form-control">
                                                <option value="">== Pilih Semua ==</option>
                                                @foreach (Navigation::list_province() as $province)
                                                    <option value="{{$province->id}}"  {{($province->id == $selected_prov) ? 'selected' : ''}}>{{$province->name}}</option>
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
                    </div>
                </div>
            </div>
            <div class="post-wrap post-grid wrap-column clearfix">

                @foreach ($pages as $page)
                <article class="entry border-shadow flat-column3 clearfix">
                    <div class="entry-border clearfix">
                        <div class="featured-post">
                             @php
                                $img = '.'.pathinfo('storage/'.$page->image, PATHINFO_EXTENSION);
                                $imgName = str_replace($img,'', $page->image);
                                $img = $imgName.'-cropped'.$img;
                              @endphp
                            <a href="{{$page->link}}" target="_blank"> <img src="{{url('storage/'.$img)}}" alt="image"></a>
                        </div><!-- /.feature-post -->
                        <div class="content-post">
                            <span class="category">{{$page->member_id}}</span>
                            <h2 class="title-post"><a href="#">{{$page->project_name}}</a></h2>
                            <div class="meta-data style2 clearfix">
                                <ul class="meta-post clearfix">
                                    <li class="day-time">
                                        <span>{{$page->description}}</span>
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
                    {{$pages->links()}}
                    {{-- <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">Next<i class="fa fa-angle-double-right"></i></a></li> --}}
                </ul><!-- /.flat-pagination -->
                <div class="count-page float-right">
                    {{-- <span>Page 1 of 60 results</span> --}}
                </div>
            </div><!-- /.blog-pagination -->
        </div><!-- /.container -->
    </section>
@endsection
@section('script')
    <script>


    $(function () {
        @php 
        if(!empty($selected_reg)){
        @endphp
            $('#province').val({{$selected_prov}})
            $.ajax({
                url: '{{ route('regency.store') }}',
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: {{$selected_prov}}
                },
                success: function (response) {
                    $('#regency').empty();
                    $('#regency').append(new Option('Pilih Semua', 'all'));
                    $.each(response, function (id, name) {
                        $('#regency').append(new Option(name, id))
                    });
                    console.log('{{$selected_reg}}');
                    
                        $('#regency').val('{{$selected_reg}}');  
                    
                }
            })
        @php
        }
        @endphp
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
                    $('#regency').append(new Option('Pilih Semua', 'all'));
                    $.each(response, function (id, name) {
                        $('#regency').append(new Option(name, id))
                    })
                }
            })
        });
    });
  </script>
@endsection
