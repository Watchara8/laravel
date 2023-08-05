<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Coding Challenge</title>

</head>

<body>
    <div class="container">
        <div class="text-center">
            <h2>Details of all results</h2>
        </div>
        <div>
            <a href="{{ route('index') }}" class="btn btn-sm btn-warning">Back</a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="card-header text-center">
                    <strong>HIER + GIBT + ES = NEUES </strong>
                </div>
                @foreach ($arr_answer as $key => $value)
                    <div class="col-12 mt-2 border">
                        <div class="p-2">
                            <strong>
                                Solution {{ $key + 1 }}
                            </strong>
                            <p class="p-0 m-0">Substituting the value obtained from solving the equation into the
                                variable, we get:</p>
                            <div>H = {{ $value['H'] }} , I = {{ $value['I'] }}, E = {{ $value['E'] }}, R =
                                {{ $value['R'] }}, G = {{ $value['G'] }}, B = {{ $value['B'] }}, T =
                                {{ $value['T'] }}, S = {{ $value['S'] }}, N = {{ $value['N'] }}, U =
                                {{ $value['U'] }}</div>
                            <p class="p-0 m-0">Substitute the values into the equation.</p>
                            <div> {{ $value['expression_1'] }} + {{ $value['expression_2'] }} +
                                {{ $value['expression_3'] }} = {{ $value['anwser'] }} </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 d-flex mt-2 justify-content-end">
                    <a href="{{ route('store') }}" class="btn btn-sm btn-primary float-right">Save data to database</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
