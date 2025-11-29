<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Permiso de Operación</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        td, th {
            border: 1px solid #000;
            padding: 4px 6px;
        }

        .section-title {
            background: #d9d9d9;
            font-weight: bold;
            text-transform: uppercase;
        }
        .no-border td {
            border: none !important;
        }

        .small { font-size: 11px; }
        .center { text-align: center; }
        .bold { font-weight: bold; }
    </style>
</head>

<body>

{{-- ======================= TÍTULO ======================= --}}
<h1>PERMISO DE OPERACIÓN Nº {{ $transportAssociation->code }} - UTT</h1>


{{-- ======================= I. INFORMACIÓN GENERAL ======================= --}}
<table>
    <tr class="section-title">
        <td colspan="2">I. INFORMACIÓN GENERAL</td>
    </tr>
    <tr>
        <td width="30%">RAZÓN SOCIAL</td>
        <td>{{ $transportAssociation->name }}</td>
    </tr>
    <tr>
        <td>RUC</td>
        <td>{{ $transportAssociation->document_number }}</td>
    </tr>
    <tr>
        <td>REPRESENTANTE LEGAL</td>
        <td>{{ $transportAssociation->partner?->name }}</td>
    </tr>
    <tr>
        <td>DOMICILIO LEGAL</td>
        <td>{{ $transportAssociation->location }}</td>
    </tr>
     <tr>
        <td>UBICACIÓN DEL PARADERO</td>
        <td>{{ $transportAssociation->location }}</td>
    </tr>
</table>


{{-- ======================= II. SOCIOS ======================= --}}
<table>
    <tr class="section-title">
        <td colspan="3">II. SOCIOS</td>
    </tr>
    <tr>
        <th width="5%">#</th>
        <th>Nombres y Apellidos</th>
        <th width="18%">DNI</th>
       <!--  <th>Otra Info</th> -->
    </tr>

    @foreach($transportAssociation->partners as $index => $partner)
        <tr>
            <td class="center">{{ $index + 1 }}</td>
            <td>{{ $partner->name }}</td>
            <td class="center">{{ $partner->document_number }}</td>
            <!-- <td>{{ $partner->extra ?? '' }}</td> -->
        </tr>
    @endforeach
</table>


{{-- ======================= III. FLOTA VEHICULAR ======================= --}}
<table>
    <tr class="section-title">
        <td colspan="2">III. FLOTA VEHICULAR AUTORIZADA</td>
    </tr>
    <tr>
        <td width="40%">Total vehículos autorizados</td>
        <td>{{ $transportAssociation->vehicles_count ?? '—' }}</td>
    </tr>
</table>


{{-- ======================= IV. PROPIETARIOS ======================= --}}
<table>
    <tr class="section-title">
        <td colspan="4">IV. PROPIETARIOS</td>
    </tr>
    <tr>
        <th width="5%">#</th>
        <th>Placa</th>
        <th>Propietario</th>
        <th width="20%">Vigencia SOAT</th>
    </tr>

    @foreach($transportAssociation->vehicles ?? [] as $i => $vehicle)
        <tr>
            <td class="center">{{ $i + 1 }}</td>
            <td class="center">{{ $vehicle->plate }}</td>
            <td>{{ $vehicle->partner?->name }}</td>
            <td class="center">{{ $vehicle->soat_expiration }}</td>
        </tr>
    @endforeach
</table>


{{-- ======================= V. CONDUCTORES ======================= --}}
<table>
    <tr class="section-title">
        <td colspan="4">V. CONDUCTORES</td>
    </tr>
    <tr>
        <th width="5%">#</th>
        <th>Placa</th>
        <th>Conductor</th>
        <th width="20%">Licencia</th>
    </tr>

    @foreach($transportAssociation->drivers as $i => $driver)
        <tr>
            <td class="center">{{ $i + 1 }}</td>
            <td class="center">{{ $driver->vehicle?->plate }}</td>
            <td>{{ $driver->name }}</td>
            <td class="center">{{ $driver->license_number }}</td>
        </tr>
    @endforeach
</table>



{{-- ======================= VI. DISPOSICIONES ======================= --}}
<table>
    <tr class="section-title">
        <td>VI. DISPOSICIONES</td>
    </tr>
    <tr>
        <td class="small">
            1.- El presente permiso de operación se otorga conforme a las normas vigentes.<br>
            2.- Tiene vigencia hasta {{ now()->addYears(3)->format('d/m/Y') }}.<br>
            3.- Cualquier servicio no autorizado será sancionado.<br>
            4.- Se debe contar con la aceptación de los vecinos colindantes.<br>
        </td>
    </tr>
</table>


{{-- ======================= VII. FECHA  ======================= --}}
<table>
    <tr class="section-title">
        <td>VII. PERÍODO DE VIGENCIA</td>
    </tr>
    <tr>
        <td class="center">
            {{ now()->format('d-m-Y') }} &nbsp; HASTA &nbsp; {{ now()->addYears(3)->format('d-m-Y') }}
        </td>
    </tr>
</table>


{{-- ======================= VIII. AUTORIZADO ======================= --}}
<table>
    <tr class="section-title">
        <td>VIII. AUTORIZADO POR</td>
    </tr>
    <tr>
        <td class="center" style="padding: 20px;">
            ____________________________ <br>
            Dirección de Transporte Urbano
        </td>
    </tr>
</table>

</body>
</html>
