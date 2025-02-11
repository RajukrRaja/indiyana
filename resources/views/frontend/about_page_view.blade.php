@extends('layouts.app')

@section('content')
<!-- About Start -->
<div class="container-fluid py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row align-items-center">
            @foreach($aboutUs as $about)
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('storage/' . $about->image_main) }}" alt="{{ $about->heading }}" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" />
            </div>
            <div class="col-lg-7">
                <p class="section-title pr-5">
                    <span class="pr-2 text-primary" style="font-weight: bold; font-size: 1.25rem;">Learn About Us</span>
                </p>
                <h1 class="mb-4" style="color: #333;">{{ $about->heading }}</h1>
                <p style="line-height: 1.6; color: #555;">{{ $about->description }}</p>
                <div class="row pt-2 pb-4">
                    
                    <div class="col-6 col-md-8">
                        <ul class="list-unstyled">
                            @php $bullet_points = [$about->bullet_points, $about->bullet_points_2, $about->bullet_points_3]; @endphp
                            @foreach($bullet_points as $point)
                                @if(!empty($point))
                                    <li class="py-2 border-top border-bottom" style="color: #555;">
                                        <i class="fa fa-check text-primary mr-3"></i>{{ $point }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mt-2 py-2 px-4" style="background-color: #007bff; border: none;">Learn More</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- About End -->
@endsection
