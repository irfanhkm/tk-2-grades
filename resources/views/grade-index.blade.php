<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    @if(env('APP_ENV') == 'production')
        <link href="https://cdn.statically.io/gh/irfanhkm/tk-2-grades/ffafee97/public/css/app.css" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-28">
        <div class="">
            <form class="w-full" action="{{ route('grades.submit')}}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-10">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            NIM
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name"
                               type="text" name="nim" required>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-10">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Nilai Quiz
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name"
                               type="number" required min="1" max="100" name="quiz_score">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Nilai Tugas
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="number" required min="1" max="100" name="task_score">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Nilai Absensi
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="number" required min="1" max="100" name="absent_score">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Nilai Praktek
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="number" required min="1" max="100" name="practice_score">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Nilai UAS
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                            py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="number" required min="1" max="100" name="uas_score">
                    </div>
                </div>
                <div class="md:w-2/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                                    text-white font-bold py-2 px-4 rounded"
                            type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-28">
        <div class="shadow-lg rounded-lg overflow-hidden">
            <canvas class="p-10" id="chartLine"></canvas>
        </div>

        <table class="table-auto mt-5">
            <thead>
            <tr>
                <th class="px-4 py-2">NIM</th>
                <th class="px-4 py-2">Nilai Quiz</th>
                <th class="px-4 py-2">Nilai Tugas</th>
                <th class="px-4 py-2">Nilai Absensi</th>
                <th class="px-4 py-2">Nilai Praktek</th>
                <th class="px-4 py-2">Nilai UAS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td class="border px-4 py-2">{{ $grade->nim }}</td>
                    <td class="border px-4 py-2">{{ $grade->quiz_score }} - {{ $grade->quiz_score_grade }}</td>
                    <td class="border px-4 py-2">{{ $grade->task_score }} - {{ $grade->task_score_grade }}</td>
                    <td class="border px-4 py-2">{{ $grade->absent_score }} - {{ $grade->absent_score_grade }}</td>
                    <td class="border px-4 py-2">{{ $grade->practice_score }} - {{ $grade->practice_score_grade }}</td>
                    <td class="border px-4 py-2">{{ $grade->uas_score }} - {{ $grade->uas_score_grade }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- End block -->
</body>
</html>


<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
    const labels = [
        "Nilai Quiz",
        "Nilai Tugas",
        "Nilai Absensi",
        "Nilai Praktek",
        "Nilai UAS"
    ];

    const random = function (min, max) {
        return min + Math.random() * (max - min);
    }

    const randomColor = function () {
        const h = random(1, 360);
        const s = random(0, 100);
        const l = random(0, 100);
        return 'hsl(' + h + ',' + s + '%,' + l + '%)';
    }

    const datasets = {!! json_encode($grades->toArray()) !!}.map(function (map) {
        return {
            label: map.nim,
            backgroundColor: randomColor(),
            borderColor: randomColor(),
            data: [
                map.quiz_score,
                map.task_score,
                map.absent_score,
                map.practice_score,
                map.uas_score
            ],
        }
    });

    const data = {
        labels: labels,
        datasets: datasets,
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };

    const chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );
</script>
