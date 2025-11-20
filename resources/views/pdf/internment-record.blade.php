<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Acta de Internamiento</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
            margin: 20px;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sub-title {
            text-align: center;
            font-size: 13px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2px 3px;
            vertical-align: top;
        }

        .no-border td,
        .no-border th {
            border: none !important;
        }

        .section-title {
            font-weight: bold;
            background: #eaeaea;
            text-align: left;
            padding: 4px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .signature-box {
            width: 23%;
            display: inline-block;
            vertical-align: top;
            margin-top: 40px;
        }

        .signature-line {
            margin-top: 40px;
            border-top: 1px solid #000;
            width: 100%;
        }

        .signature-div {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
    </style>
</head>

<body>

    {{-- ENCABEZADO --}}
    <div class="title">MUNICIPALIDAD DISTRITAL VEINTISÉIS DE OCTUBRE</div>
    <div class="sub-title">SUBGERENCIA DE TRANSPORTE, TRÁNSITO Y VIALIDAD</div>

    <div class="title">ACTA DE INTERNAMIENTO DE VEHÍCULO</div>

    {{-- DATOS GENERALES --}}
    <table>
        <tr>
            <th colspan="2" class="section-title">DATOS GENERALES</th>
        </tr>
        <tr>
            <td><strong>Propietario:</strong></td>
            <td>{{ $internmentRecord->partner_name }}</td>
        </tr>
        <tr>
            <td><strong>Conductor:</strong></td>
            <td>{{ $internmentRecord->driver_name }}</td>
        </tr>
        <tr>
            <td><strong>Placa:</strong></td>
            <td>{{ $internmentRecord->plate }}</td>
        </tr>
        <tr>
            <td><strong>Marca:</strong></td>
            <td>{{ $internmentRecord->brand }}</td>
        </tr>
        <tr>
            <td><strong>Clase:</strong></td>
            <td>{{ $internmentRecord->vehicle_class }}</td>
        </tr>
        <tr>
            <td><strong>Modelo:</strong></td>
            <td>{{ $internmentRecord->model }}</td>
        </tr>
        <tr>
            <td><strong>Año:</strong></td>
            <td>{{ $internmentRecord->manufacturing_year }}</td>
        </tr>
        <tr>
            <td><strong>Color:</strong></td>
            <td>{{ $internmentRecord->color }}</td>
        </tr>
        <tr>
            <td><strong>Motor N°:</strong></td>
            <td>{{ $internmentRecord->engine_number }}</td>
        </tr>
        <tr>
            <td><strong>Serie N°:</strong></td>
            <td>{{ $internmentRecord->serial_number }}</td>
        </tr>
        <tr>
            <td><strong>Papeleta PNP:</strong></td>
            <td>{{ $internmentRecord->pnp_ticket }}</td>
        </tr>
        <tr>
            <td><strong>Infracción:</strong></td>
            <td>{{ optional($internmentRecord->infraction)->code }}</td>
        </tr>
    </table>

    {{-- TABLAS (EXTERIOR - INTERIOR) --}}
    <div class="grid-2">

        {{-- ASPECTO EXTERIOR --}}
        <table>
            <tr>
                <th colspan="5" class="section-title">ASPECTO EXTERIOR</th>
            </tr>
            <tr>
                <th>Ítem</th>
                <th>B</th>
                <th>R</th>
                <th>D</th>
                <th>N/T</th>
            </tr>

            @foreach($internmentRecord->exteriorItems as $item)
            <tr>
                <td>{{ $item->item }}</td>
                <td>{{ $item->status->value == 'B' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'R' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'D' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'N/T' ? 'x' : '' }}</td>
            </tr>
            @endforeach

        </table>

        {{-- ASPECTO INTERIOR --}}
        <table>
            <tr>
                <th colspan="5" class="section-title">ASPECTO INTERIOR</th>
            </tr>
            <tr>
                <th>Ítem</th>
                <th>B</th>
                <th>R</th>
                <th>D</th>
                <th>N/T</th>
            </tr>

            @foreach($internmentRecord->interiorItems as $item)
            <tr>
                <td>{{ $item->item }}</td>
                <td>{{ $item->status->value == 'B' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'R' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'D' ? 'x' : '' }}</td>
                <td>{{ $item->status->value == 'N/T' ? 'x' : '' }}</td>
            </tr>
            @endforeach
        </table>

    </div>

    {{-- SISTEMA ELÉCTRICO --}}
    <table>
        <tr>
            <th colspan="5" class="section-title">SISTEMA ELÉCTRICO</th>
        </tr>
        <tr>
            <th>Ítem</th>
            <th>B</th>
            <th>R</th>
            <th>D</th>
            <th>N/T</th>
        </tr>

        @foreach($internmentRecord->electricalSystemsItems as $item)
        <tr>
            <td>{{ $item->item }}</td>
            <td>{{ $item->status->value == 'B' ? 'x' : '' }}</td>
            <td>{{ $item->status->value == 'R' ? 'x' : '' }}</td>
            <td>{{ $item->status->value == 'D' ? 'x' : '' }}</td>
            <td>{{ $item->status->value == 'N/T' ? 'x' : '' }}</td>
        </tr>
        @endforeach

    </table>

    {{-- OBSERVACIÓN --}}
    <table>
        <tr>
            <th class="section-title">OBSERVACIÓN</th>
        </tr>
        <tr>
            <td style="height:70px;">{{ $internmentRecord->observation }}</td>
        </tr>
    </table>

    {{-- FIRMAS --}}
    <div style="margin-top:40px;" class="signature-div">
        <div class="signature-box">
            <div class="signature-line"></div>
            <div>FIRMA DEL INSPECTOR</div>
        </div>

        <div class="signature-box">
            <div class="signature-line"></div>
            <div>FIRMA DEL PNP</div>
        </div>

        <div class="signature-box">
            <div class="signature-line"></div>
            <div>FIRMA DEL CONDUCTOR</div>
        </div>
    </div>

</body>

</html>