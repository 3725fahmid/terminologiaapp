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
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">#</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-primary fw-semibold">
                            <i class="ri-user-voice-fill me-2"></i>
                            User Voice
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary">
                                Listen
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
