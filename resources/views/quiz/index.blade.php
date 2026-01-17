@extends('layouts.app')

@section('title', 'Quiz')

@section('admin')

<div class="container py-4">

    <a href="javascript:history.back()" class="btn btn-outline-dark mb-4">
        ← Back
    </a>

    <div class="row">


        {{-- OPTIONS CARD --}}
        <div class="col-12 col-lg-6 h-100">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-white fw-bold">
                    Options (Drag & Drop)
                </div>

                <div class="card-body">
                    <div class="row g-1 options-area">

                        @php
                            $options = [
                                'Short-term supply of energy.',
                                'Needed for growth and repair of cells.',
                                'Long-term store of energy.',
                                'Needed to maintain health.',
                                'Needed to maintain health.'
                            ];
                        @endphp

                        @foreach($options as $opt)
                            <div class="col-12 col-sm-6">
                                <div class="option-card drag-item">
                                    {{ $opt }}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>

        {{-- QUESTION CARD --}}
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-white fw-bold">
                    Questions
                </div>

                <div class="card-body">

                    @php
                        $questions = [
                            'Carbohydrate',
                            'Protein',
                            'Fats',
                            'Vitamins',
                            'Minerals'
                        ];
                    @endphp

                    @foreach($questions as $i => $q)
                        <div class="question-card mb-1">
                            <div class="fw-semibold mb-1">
                                {{ $i + 1 }}. {{ $q }}
                            </div>

                            <div class="answer-box" data-index="{{ $i }}">
                                Drop answer here
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        

        {{-- ACTIONS --}}
                <div class="d-flex gap-1 mt-4">
                    <button class="btn btn-primary px-4 check-answer w-100">
                        Submit
                    </button>
            
                    <button class="btn btn-outline-secondary px-4 reset-btn d-none">
                        Reset
                    </button>
                </div>
            
                <div class="score-card mt-3 fw-bold"></div>
        

    </div>


</div>

@endsection

@section('scripts')

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- jQuery UI --}}
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
<link rel="stylesheet"
      href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

{{-- Touch support --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

{{-- STYLES --}}
<style>
.answer-box {
    min-height: 60px;
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    padding: 10px;
    display: flex;
    align-items: center;
    color: #6c757d;
    transition: all .3s ease;
}

.option-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
    cursor: grab;
    text-align: center;
}

.answer-box.correct {
    background: #d4edda;
    border-color: #28a745;
    color: #155724;
}

.answer-box.wrong {
    background: #f8d7da;
    border-color: #dc3545;
    color: #721c24;
}

.correct-answer-text {
    font-size: .85rem;
    margin-top: 6px;
    color: #198754;
}
</style>

{{-- SCRIPT --}}
<script>
$(function () {

    const answers = [
        "Short-term supply of energy.",
        "Needed for growth and repair of cells.",
        "Long-term store of energy.",
        "Needed to maintain health.",
        "Needed to maintain health."
    ];

    function enableDragDrop() {

        $(".drag-item").draggable({
            revert: "invalid",
            cursor: "move"
        });

        $(".answer-box").droppable({
            accept: ".drag-item",
            tolerance: "pointer",
            drop: function (event, ui) {
                $(this).empty().append(ui.draggable);
                ui.draggable.css({ position: "relative", top: "auto", left: "auto" });
            }
        });
    }

    enableDragDrop();

    $(".check-answer").on("click", function () {

        let score = 0;

        $(".answer-box").each(function (i) {
            const userAnswer = $(this).text().trim();
            const correctAnswer = answers[i];

            $(this).removeClass("correct wrong")
                   .find(".correct-answer-text").remove();

            if (userAnswer === correctAnswer) {
                score++;
                $(this).addClass("correct");
            } else {
                $(this).addClass("wrong")
                       .append(`<div class="correct-answer-text">
                           ✔ Correct: ${correctAnswer}
                       </div>`);
            }
        });

        $(".score-card").text(`Score: ${score} / 5`);
        $(".check-answer").addClass("d-none");
        $(".reset-btn").removeClass("d-none");
    });

    $(".reset-btn").on("click", function () {
        location.reload();
    });

});
</script>

@endsection
