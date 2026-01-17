@extends('layouts.app')

@section('title')
    Home
@endsection

@section('admin')


@yield('story')

<div class="page-content">
                    <div class="lg-container-fluid p-0">
                        <div class="row">
                            <div class="col-12">

                                @foreach ($storyData as $item)
                                @if(isset($item['story_id']))
                                <a href="{{ Route('story.show',$item['story_id'])}}" class="story-link">
                                        <div class="card story-card gradient-border">
                                            <div class="card-body">
                                                <header class="story-header">
                                                    <h2>{{ $item['story_id'] }}</h2>
                                                </header>

                                                <div class="pt-1 story-content">
                                                    <p class="text-bold">
                                                       {{ Str::limit($item['english'] ?? '', 150) }}
                                                    </p>
                                                    <p class="text-muted text-truncate mb-2">
                                                        {{ Str::limit($item['bangla'] ?? '', 150) }}
                                                    </p>
                                                    <p class="text-muted text-truncate mb-2">
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach


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
