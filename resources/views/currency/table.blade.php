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
    <div class="flex" align-content="center">
        <form action="" name="when_form">
            <input type="date" name="when" id="when_input">
            <button type="submit">
                Взять по данной дате
            </button>
        </form>
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

<script>
        function parse_query_string(query) {
            var vars = query.split("&");
            var query_string = {};
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                var key = decodeURIComponent(pair.shift());
                var value = decodeURIComponent(pair.join("="));
                // If first entry with this name
                if (typeof query_string[key] === "undefined") {
                query_string[key] = value;
                // If second entry with this name
                } else if (typeof query_string[key] === "string") {
                var arr = [query_string[key], value];
                query_string[key] = arr;
                // If third or later entry with this name
                } else {
                query_string[key].push(value);
                }
            }
            return query_string;
        }
        var query = window.location.search.substring(1);
        var qs = parse_query_string(query);
        if(typeof qs.when === 'string'){
            var els=document.getElementById('when_input');
            els.value = qs.when;
        }
    </script>
</html>