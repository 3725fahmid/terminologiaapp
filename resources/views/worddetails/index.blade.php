@extends('layouts.app')

@section('title')
    Home
@endsection

@section('admin')


<div class="page-content">
    <div class="card">
        <div class="card-body">
            <a href="{{route('home')}}">Home</a>
                {{}}
        </div>
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
