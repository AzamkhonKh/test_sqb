<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency table</title>
    <style>
        table{
            border: 1px solid;
            text-align: center;
        }
        table tbody tr td {
            align-content: center;
            padding-bottom: 0.5em;
        }
        table tbody tr {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <div class="flex">
        <input type="date" name="when">
        <button type="submit">
            Взять по данной дате
        </button>
    </div>
    <table align="center" width="100%" >
        <thead>
            <th>
                ValuteId
            </th>
            <th>
                numCode
            </th>
            <th>
                charCode
            </th>
            <th>
                name
            </th>
            <th>
                value
            </th>
            <th>
                date
            </th>
        </thead>
        <tbody>
            @if (empty($currencies))
                    Похоже нету данных по данной дате :(
            @endif
            @foreach ($currencies as $cur)
                <tr>
                    <td>
                        {{$cur->valuteID}}
                    </td>
                    <td>
                        {{$cur->numCode}}
                    </td>
                    <td>
                        {{$cur->сharCode}}
                    </td>

                    <td>
                        {{$cur->name}}
                    </td>
                    <td>
                        {{$cur->value}}
                    </td>
                    <td>
                        {{$cur->when}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>