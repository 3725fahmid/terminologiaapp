@extends('layouts.app')

@section('title')
    
@endsection

@section('admin')


<div class="page-content">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('home')}}">Home</a>

                </div>
            </div>
                    <div class="lg-container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card story-card">
                                    <div class="card-body">
                                        <header class="story-header">
                                            <h2>Story ID: {{ $story['story_id'] }}</h2>
                                        </header>

                                        <div class="pt-1 story-content">
                                            <p class="text-bold">
                                                @foreach(explode("\n\n", $story['english'] ?? '') as $paragraph)
                                                    <p>{{ $paragraph }}</p>
                                                @endforeach
                                            </p>
                                            <p class="text-muted text-truncate mb-2">
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-12">
                                <div class="card story-card">
                                    <div class="card-body">
                                        <header class="story-header">
                                            <h2>Story ID: {{ $story['story_id'] }}</h2>
                                        </header>

                                        <div class="pt-1 story-content">
                                            <p class="text-muted text-truncate mb-2">
                                                @foreach(explode("\n\n", $story['bangla'] ?? '') as $paragraph)
                                                    <p>{{ $paragraph }}</p>
                                                @endforeach
                                            </p>
                                            <p class="text-muted text-truncate mb-2">
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-12">
                                <div class="card p-3">
                                    <div class="row">
                                        {{-- <div class="col-12 col-md-6 col-lg-3">
                                            <div class="card-flip mb-3">
                                                <div class="content">
                                                    <div class="front">Front</div>
                                                    <div class="back">Back!</div>
                                                </div>
                                            </div>
                                        </div> --}}
                                
                                        @foreach($words as $item)
                                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 mb-1">
                                            <div class="scene scene--card">
                                                <div class="scene-card" 
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Click card to flip"
                                                >
                                                    <div class="card__face card__face--front">{{ $item['word'] }}</div>
                                                    <div class="card__face card__face--back">{{ $item['wordmeaning'] }}</div>
                                                </div>
                                            </div>
                                            <a href="{{Route('story.worddata',$item['id'])}}" class="btn btn-primary mb-3">Details about {{ $item['word'] }}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <!-- End Page-content -->


@endsection


@section('scripts')

<script>
// var card = document.querySelectorAll('.scene-card');
// card.addEventListener( 'click', function() {
//   card.classList.toggle('is-flipped');
// });

document.querySelectorAll('.scene-card').forEach(card => {
    card.addEventListener('click', function () {
        this.classList.toggle('is-flipped');
    });
});
</script>


@endsection
