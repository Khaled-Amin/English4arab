@extends('layouts.site')

@section('content')
<section class="gen-section-padding-3">
    
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="gen-single-movie-wrapper style-1">
                    <div class="row">
                        <div class="gen-blog-post">
                                    <div class="gen-post-media text-center">
                                        <img src="{{  $section->imageUrl }}" alt="{{  $section->title }}" loading="lazy">
                                    </div>
                                    <div class="gen-blog-contain">
                                        <h5 class="gen-blog-title">{{  $section->title }}</h5>
                                        {!!  $section->body !!}
                                    </div>
                                </div>
                        <div class="col-lg-12">
                            <div class="pm-inner">
                                <div class="gen-more-like">
                                    <h5 class="gen-more-title">الدروس</h5>
                                    <div class="row">
                                        @foreach ($section->lessonsPagination as $lesson)
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                                    <div class="gen-movie-contain">
                                                        <div class="gen-movie-img">
                                                            <img src="{{ $lesson->imageUrl }}" alt="{{ $lesson->title }}">
                                                            <div class="gen-movie-add">
    
                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <a href="/lesson/{{ $lesson->id }}" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a
                                                                        href="/lesson/{{ $lesson->id }}">{{ $lesson->title }}</a>
                                                                </h3>
                                                            </div>
                                                            <div class="gen-movie-meta-holder">
                                                                <ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                 <div class="gen-pagination">
                                    {{ $section->lessonsPagination->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    
@endsection
