@extends('layouts.app')

@section('title')
    Home
@endsection

@section('admin')


<div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Home</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">Home</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">

                                <a href="{{ route('story.index') }}">
                                    <!-- Card start  -->
                                    <div class="card story-card gradient-border">
                                        <div class="card-body">
                                            <header class="story-header">
                                                <h2>History of Egypt</h2>
                                            </header>
    
                                            <div class="pt-1 story-content">
                                                <p class="text-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet, natus magnam doloribus totam nam cum quasi? Vero officiis id iusto? At enim distinctio odit ipsum eligendi quibusdam voluptatem quisquam aperiam praesentium quidem, assumenda inventore quae, consectetur maxime neque molestiae. Asperiores, impedit cum. Consequuntur nobis pariatur quasi. Rerum eaque possimus ipsam quos repellendus obcaecati veniam optio neque voluptas repellat incidunt saepe reiciendis, illo aspernatur repudiandae fugiat magnam sit enim quis officia asperiores nihil ullam aliquam. Sequi blanditiis nobis accusamus fugiat quasi est soluta, amet voluptate rerum consequatur eum magni perspiciatis consequuntur ut omnis a enim exercitationem molestiae minus? Sunt est quod esse eveniet consectetur animi in hic at fugiat aperiam totam velit eos magnam deserunt quaerat cum reprehenderit nam, aliquam illo, sapiente natus corporis! Non eos quaerat expedita, rem enim maxime est quia in nam iste recusandae perspiciatis sed soluta possimus magnam odio iure facilis nesciunt. Repellendus ad quidem molestias?</p>
                                                <p class="text-muted text-truncate mb-2">Yesterday</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </a>


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
