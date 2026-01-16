@extends('layouts.app')

@section('title')
   Word- {{ $word_details['word'] }}
@endsection

@section('admin')


<div class="page-content">
    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>
    <div class="card shadow rounded-3">
        <div class="card-body">
            <div class="card-header shadow-lg rounded-3">
                <h1>{{ $word_details['word'] }}</h1>
                <hr>
                 <h2 class="text-warning">Meaning:
                    {{-- {{ $word_details['wordmeaning'] }} --}}
                    @foreach(explode(',', $word_details['wordmeaning']) as $syn)
                        <span class="badge bg-success rounded-0">{{ trim($syn) }}</span>
                    @endforeach
                </h2>
            </div>
            <div class="card-body">
                {{-- <i class="mdi mdi-voice d-inline-block"></i> --}}
                <button type="button" class="btn header-item noti-icon waves-effect d-flex gap-2">
                    <i class="ri-user-voice-fill"></i>
                    <h2 class="inline-block text-primary"> {{ $word_details['easy_spelling'] }}</h2>
                </button>
            </div>
        </div>
    </div>

    <div class="card rounded-3">
        <div class="card-body">
            <div class="card-header rounded-3">
            </div>
            <div class="card-body">
                <span class="text-lg">Synonyms:</span>
                <h5>
                    {{-- {{ $word_details['synonyms'] }} --}}
                    @foreach(explode(',', $word_details['synonyms']) as $syn)
                        <span class="badge text-lg bg-info">{{ trim($syn) }}</span>
                    @endforeach
    
                </h5>
                <hr>
                Antonyms:
                <h5>
                    {{-- {{ $word_details['synonyms'] }} --}}
                    @foreach(explode(',', $word_details['antonyms']) as $syn)
                        <span class="badge bg-info">{{ trim($syn) }}</span>
                    @endforeach
    
                </h5>
            </div>
        </div>
    </div>

    <div class="card rounded-3">
        <div class="card-body">
            <div class="card-header rounded-3">
            </div>
            <div class="card-body">
                Antonyms:
                <h5>
                    {{-- {{ $word_details['synonyms'] }} --}}
                    @foreach(explode(',', $word_details['antonyms']) as $syn)
                        <span class="badge bg-info">{{ trim($syn) }}</span>
                    @endforeach
    
                </h5>
                <hr>
                <h4 class="text-mute">{{ $word_details['easy_spelling'] }}</h4>
            </div>
        </div>
    </div>

    <div class="card rounded-3">
        <div class="card-body">
            <div class="card-header rounded-3">
            </div>
            <div class="card-body">
                Tactic:
                <h5>
                    {{-- {{ $word_details['synonyms'] }} --}}
                    @foreach(explode(',', $word_details['tactic']) as $syn)
                        <span class="badge bg-info">{{ trim($syn) }}</span>
                    @endforeach
    
                </h5>
                <hr>
                <h4 class="text-mute">{{ $word_details['easy_spelling'] }}</h4>
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
