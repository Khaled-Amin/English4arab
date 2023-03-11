@extends('layouts.site')

@section('content')
<section class="gen-section-padding-3">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                @foreach($sections as  $section1)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-1 movie-grid style-1">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <img src="{{ $section1->imageUrl }}" alt="{{ $section1->title }}">
                                    <div class="gen-movie-add">
                                        
                                    </div>
                                    <div class="gen-movie-action">
                                        <a 
                                        {{-- @if($section1->auth()) --}}
                                        href="/{{ $section1->slug}}" 
                                        {{-- @else --}}
                                            
                                        {{-- @endif --}}
                                        class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a   @if($section1->auth())
                                        href="/{{ $section1->slug}}" 
                                        @else
                                            
                                        @endif 
                                        >{{ $section1->title }}</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                        <ul>
                                            <li>{{ $section1->lessons()->count()}} درس </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="gen-pagination">   
                            {{  $sections->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

