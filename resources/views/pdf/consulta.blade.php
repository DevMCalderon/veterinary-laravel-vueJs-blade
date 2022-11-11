<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <style>
        .text-center {
            text-align: center;
        }

        * {
            margin-top: 0px;
            margin-bottom: 5px;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .mt-0 {}

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding-left: 5px;
        }

        table {
            width: 100%;
        }

        table.no-border,
        table.no-border th,
        table.no-border td {
            border: 0px solid white;
            border-collapse: collapse;
        }

        td.border {
            border: 1px dotted black !important;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <table class="no-border">
        <tr>
            <td style="width: 70px;height: 60px" class="text-center border">
                LOGO
            </td>

            <td style="border: 0px solid #FFF">
                <h3 class="text-center"><b>Nombre de la empresa</b></h3>
                <p class="text-center">Historia clinica</p>
            </td>
            <td style="width: 70px;height: 60px" class="text-center border">
            LOGO
            </td>
        </tr>

    </table>

    <br>
    <br>

    <table>
        <tr>
            <td colspan="2" style="background: #eee;">
                <p class="text-center"><b>Datos del paciente</b></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p><b>Nombre:</b> {{ $consulta->pet->name }}</p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%;">
                <p><b>Especie:</b> {{ @$consulta->pet->tipoMascota->name }}</p>
            </td>
            <td>
                <p><b>Raza:</b> {{ @$consulta->pet->tipoRaza->name }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Color:</b> {{ $consulta->pet->color }}</p>
            </td>
            <td>
                <p><b>Edad:</b> {{ $consulta->pet->edad() }}</p>
            </td>
        </tr>
    </table>

    <br>
    <br>
    <table>
        <tr>
            <td colspan="2" style="background: #eee;">
                <p class="text-center"><b>Datos del propietario</p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%;">
                <p><b>Nombre:</b> {{ $client->name }}</p>
            </td>
            <td>
                <p><b>Teléfono:</b> {{ $client->phone }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Correo electronico:</b> {{ $client->email }}</p>
            </td>
            <td>
                <p><b>Dirección:</b> {{ $client->ciudad->name }}, {{ $client->address }}</p>
            </td>
        </tr>
    </table>

    <br>
    <br>
    <table>
        <tr>
            <td colspan="2" style="background: #eee;">
                <p class="text-center"><b>Datos de la consulta</b></p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%;">
                <p><b>Peso:</b> {{ $consulta->peso }}</p>
            </td>
            <td>
                <p><b>Temperatura:</b> {{ $consulta->temp }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Mucosas:</b> {{ $consulta->mucosas }}</p>
            </td>
            <td>
                <p><b>Palpitacion Abdominal:</b> {{ $consulta->palpitacion_abdominal }}</p>
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td style="background: #eee;">
                <p class="text-center"><b>Sintomas</b> </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $consulta->sintomas }}</p>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td style="background: #eee;">
                <p class="text-center"><b>Diagnostico</b> </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $consulta->diagnostico }}</p>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td style="background: #eee;">
                <p class="text-center"><b>Receta</b></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $consulta->receta }}</p>
            </td>
        </tr>
    </table>

</body>

</html>
