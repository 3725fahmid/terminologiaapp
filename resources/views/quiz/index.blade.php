@extends('layouts.app')

@section('title', 'Stories')

@section('admin')

<div class="page-content">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h3 class="fw-bold mb-1 text-dark">
            Learning Stories
        </h3>
        <p class="text-muted mb-0">
            Choose a story and start learning
        </p>
    </div>

    <div class="row g-4">

        @foreach ($storyData as $item)
            @if(isset($item['story_id']))

            <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                <a href="{{ route('quiz.show', $item['story_id']) }}"
                   class="text-decoration-none">

                    <div class="card h-100 border-0 rounded-4 edu-card">

                        <div class="card-body p-4 d-flex flex-column">

                            <!-- TOP BADGE -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="edu-badge">
                                    Story {{ $item['story_id'] }}
                                </span>

                                <span class="edu-dot"></span>
                            </div>

                            <!-- TITLE -->
                            <h6 class="fw-bold text-dark mb-1">
                                Reading Practice
                            </h6>

                            <!-- SUBTEXT -->
                            <p class="text-muted small mb-0">
                                Improve vocabulary and comprehension
                            </p>

                            <!-- FOOTER -->
                            <div class="mt-auto pt-4">
                                <span class="edu-link">
                                    Start Learning →
                                </span>
                            </div>

                        </div>

                    </div>

                </a>

            </div>

            @endif
        @endforeach

    </div>

</div>

@endsection


