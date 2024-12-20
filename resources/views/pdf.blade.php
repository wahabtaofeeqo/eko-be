<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* font-size: 14px;
            line-height: 1.6; */
            margin: 0;
            padding: 0;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr {
            width: 100%;
            height: 93.12px;
            margin-bottom: -20px;
        }
        
        td {
            /* vertical-align: top;
            padding: 10px; */
            position: relative;
            width: 50%;
            height: 75.12px;
            margin-bottom: -30px;
            /* height: 60px; */
            /* background: red; */
        }

        .qr {
            position: absolute;
            top: 0px;
            right: 105px;
        }

        .text {
            position: absolute;
            top: 55px;
            font-size: 10px;
            /* top: 200px; */
            right: 105px
        }

        .container {
            width: 100%;
            padding: 20px;
        }
     
        .columns {
            display: table;
            width: 100%;
            height: 60px;
            overflow: hidden;
            margin: auto;
            margin-bottom: -8px;
        }

        .column {
            display: table-cell;
            /* vertical-align: top; */
            vertical-align: middle;
            width: 50%;
            height: 60px;
            position: absolute;
        }

        .m-10 {
            margin-bottom: -50px;
        }

        .br {
            margin-bottom: 100px;
        }

    </style>
</head>
<body>
<table>
    @php
        $counter = 0;
    @endphp;
    @for ($i = 0; $i < count($users); $i++)
        @php
            $user = $users[$counter];
            if($counter < 740) {
                $counter++;
            }
        @endphp;
        <tr class="mb-10">
            <td>
                <img src="hh.jpg" style="width: 300px;">
                <img src="{{$user['qr_path']}}" style="width: 60px;" class="qr">
                <small class="text">{{$user['code']}}</small>
            </td>

            @php
                if($counter < 740) {
                    $user = $users[$counter];
                    $counter ++;
                }

            @endphp;

            <td>
                <img src="hh.jpg" style="width: 300px">
                <img src="{{$user['qr_path']}}" style="width: 60px" class="qr">
                <small class="text">{{$user['code']}}</small>
            </td>
        </tr>
    @endfor
</table>


</body>
</html>