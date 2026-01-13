@extends('layouts.app')

@section('title')
    Home
@endsection

@section('admin')


<div class="page-content">
                    <div class="lg-container-fluid p-0">
                        



                        <div class="row">
                            <div class="col-12">
                                <div class="card story-card gradient-border">
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

                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>
                <!-- End Page-content -->


@endsection


@section('scripts')

<script>

</script>


@endsection
