@extends('layouts.app')

@section('title')
   Quiz
@endsection

@section('admin')


<div class="page-content">
    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>
    <div class="card shadow rounded-3">
        <div class="card-body">
            <div class="card-header shadow-lg rounded-3">
                
            </div>
            <div class="card-body">
                {{-- <i class="mdi mdi-voice d-inline-block"></i> --}}
                <button type="button" class="btn header-item noti-icon waves-effect d-flex gap-2">
                    <i class="ri-user-voice-fill"></i>
                    <h2 class="inline-block text-primary"></h2>
                </button>
            </div>
        </div>
    </div>

    {{-- id" => "11"
  "story_id" => "3"
  "word" => "Honest"
  "easy_spelling" => "On-est"
  "wordmeaning" => "Telling the truth"
  "synonyms" => "Truthful, Sincere"
  "antonyms" => "Dishonest"
  "tactic" => "Always tell truth"
  "example" => "He is an honest man. --}}
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
