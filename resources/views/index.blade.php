<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Coding Challenge </title>

</head>

<body>
    <div class="container">
        <div class="text-center">
            <h2>Data from database</h2>
        </div>
        <div>
            <a href="{{ route('create') }}" class="btn btn-sm btn-info">Calculate</a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="card-header text-center">
                    <strong>HIER + GIBT + ES = NEUES </strong>
                </div>
                @if (count($challenge_data) > 0)
                    @foreach ($challenge_data as $data_get)
                        <div class="col-12 mt-2 border">
                            <div class="p-2">
                                <strong>
                                    Solution {{ $data_get->id }}
                                </strong>
                                <p class="p-0 m-0">Substituting the value obtained from solving the equation into the
                                    variable, we get:</p>
                                <div>H = {{ $data_get->val_of_H }} , I = {{ $data_get->val_of_I }}, E =
                                    {{ $data_get->val_of_E }}, R =
                                    {{ $data_get->val_of_R }}, G = {{ $data_get->val_of_G }}, B =
                                    {{ $data_get->val_of_B }}, T =
                                    {{ $data_get->val_of_T }}, S = {{ $data_get->val_of_S }}, N =
                                    {{ $data_get->val_of_N }}, U =
                                    {{ $data_get->val_of_U }}</div>
                                <p class="p-0 m-0">Substitute the values into the equation.</p>
                                <div> {{ $data_get->expression_1 }} + {{ $data_get->expression_2 }} +
                                    {{ $data_get->expression_2 }} = {{ $data_get->anwser }} </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="text-center border">
                    There is no information in the database.
                </div>
                @endif
            </div>
        </div>

    </div>
</body>

</html>
