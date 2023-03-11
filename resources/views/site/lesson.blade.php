@extends('layouts.site')

@section('content')
    <section class="gen-section-padding-3">

        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="gen-video-holder">
                                    <div class="video" 
                                        data-{{ $lesson->type }}="{{ $lesson->link }}"
                                    ></div>
                                </div>
                                <div class="gen-single-movie-info">
                                    <h2 class="gen-title">{{ $section->title }} - {{ $lesson->title }}</h2>
                                    {!! $lesson->body !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="pm-inner">
                                    <div class="gen-more-like">
                                        <h5 class="gen-more-title">دروس القسم</h5>
                                        <div class="row">
                                            @foreach ($section->lessonsPagination as $currentLesson)
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div
                                                        class="gen-carousel-movies-style-1 movie-grid style-1 {{ $currentLesson->id == $lesson->id ? 'active' : '' }} ">
                                                        <div class="gen-movie-contain">
                                                            <div class="gen-movie-img">
                                                                <img src="{{ $currentLesson->imageUrl }}"
                                                                    alt="{{ $currentLesson->title }}">
                                                                <div class="gen-movie-add">
    
                                                                </div>
                                                                <div class="gen-movie-action">
                                                                    <a href="/lesson/{{ $currentLesson->id }}"
                                                                        class="gen-button">
                                                                        <i class="fa fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="gen-info-contain">
                                                                <div class="gen-movie-info">
                                                                    <h3><a
                                                                            href="/lesson/{{ $currentLesson->id }}">{{ $currentLesson->title }}</a>
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


    </section>
@endsection
@push('stack-js')
    <script src="/assets/js/videobox.min.js"></script>
    <script>
        $(".video").videoBox({
            height: '550',
            loop: false,
            autoplay: false,
            byline: true,
            color: "00adef",
            maxheight: '',
            maxwidth: '',
            portrait: true,
            title: '{{ $lesson->title }}'
        });
    </script>
@endpush
