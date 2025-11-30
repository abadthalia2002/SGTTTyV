<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid #000; padding: 4px; }
        .center { text-align: center; font-weight: bold; }
        .no-border { border: none !important; }
        .signature-cell { height: 60px; vertical-align: bottom; }
    </style>
</head>

<body>

    <div style="text-align:center; font-weight:bold;">
        MUNICIPALIDAD DISTRITAL VEINTISÉIS DE OCTUBRE <br>
        SUBGERENCIA DE TRANSPORTE, TRÁNSITO Y VIALIDAD <br><br>
        <span style="font-size:18px;">ACTA DE CONTROL</span>
    </div>

    <br>

    <!-- TABLA COMPLETA -->
    <table>

        <!-- Fila Transportista / Conductor -->
        <tr>
            <td class="center">TRANSPORTISTA</td>
            <td class="center">CONDUCTOR</td>
        </tr>

        <!-- FECHA / HORA / LUGAR -->
        <tr>
            <td colspan="2">
                FECHA: {{ $record->date ?? '' }} &nbsp;&nbsp;&nbsp;
                HORA: {{ $record->time ?? '' }} &nbsp;&nbsp;&nbsp;
                LUGAR DE INTERVENCIÓN: {{ $record->intervention_place ?? '' }}
            </td>
        </tr>

        <!-- Razón social -->
        <tr>
            <td colspan="2">
                NOMBRE O RAZÓN SOCIAL: {{ $record->name ?? '' }}
            </td>
        </tr>

        <!-- Habilitación / Placa -->
        <tr>
            <td>
                N° DE HABILITACIÓN VEHICULAR: {{ $record->vehicle_authorization_number ?? '' }}
            </td>
            <td>
                PLACA DEL VEHÍCULO: {{ $record->vehicle_plate ?? '' }}
            </td>
        </tr>

        <!-- Modalidad -->
        <tr>
            <td colspan="2">
                MODALIDAD DEL SERVICIO: {{ $record->service_mode ?? '' }}
            </td>
        </tr>

        <!-- Ruta / Destino -->
        <tr>
            <td>
                RUTA ORIGEN: {{ $record->route_origin ?? '' }}
            </td>
            <td>
                DESTINO: {{ $record->route_destination ?? '' }}
            </td>
        </tr>

        <!-- Datos conductor -->
        <tr>
            <td colspan="2" class="center">DATOS DEL CONDUCTOR AL VOLANTE</td>
        </tr>

        <!-- Nombre conductor -->
        <tr>
            <td colspan="2">
                NOMBRE Y APELLIDO: {{ $record->driver->name ?? '' }}
            </td>
        </tr>

        <!-- Licencia / DNI -->
        <tr>
            <td>
                N° DE LICENCIA: {{ $record->driver->license_number ?? '' }}
            </td>
            <td>
                D.N.I: {{ $record->driver->document_number ?? '' }}
            </td>
        </tr>

        <!-- Clase / Categoría -->
        <tr>
            <td colspan="2">
                CLASE Y CATEGORÍA: {{ $record->driver_license_class ?? '' }}
            </td>
           <!--  <td>
                CATEGORÍA: {{ $record->driver_license_category ?? '' }}
            </td> -->
        </tr>

        <!-- Cod. infracción -->
        <tr>
            <td colspan="2">
                CÓDIGO DE INFRACCIÓN DETECTADO: <br><br>
                {{ $record->infraction_code_detected ?? '' }}
            </td>
        </tr>

        <!-- Cod. incumplimiento -->
        <tr>
            <td colspan="2">
                CÓDIGO DE INCUMPLIMIENTO DETECTADO: <br><br>
                {{ $record->detected_non_compliance_code ?? '' }}
            </td>
        </tr>

        <!-- Producto de la verificación -->
        <tr>
            <td colspan="2">
                PRODUCTO DE LA VERIFICACIÓN SE DETECTÓ LO SIGUIENTE: <br><br><br>
                {{ $record->verification_findings ?? '' }}
            </td>
        </tr>

        <!-- Descripción -->
        <tr>
            <td colspan="2">
                DESCRIPCIÓN Y UBICACIÓN DEL LOCAL: <br><br><br>
                {{ $record->infraction_description_location ?? '' }}
            </td>
        </tr>

        <!-- Manifestación -->
        <tr>
            <td colspan="2">
                MANIFESTACIÓN DEL ADMINISTRADO: <br><br><br>
                {{ $record->admin_statement ?? '' }}
            </td>
        </tr>

    </table>

    <br><br>

    <!-- FIRMAS -->
    <table style="width:100%; border:none;">
        <tr class="no-border">
            <td class="signature-cell" style="text-align:center;">
                <br>
                <br>
                ________________________ <br>
                FIRMA DEL INSPECTOR <br>
                <br>
                Nombres y Apellidos:<br><br>
                ________________________<br><br>
                ________________________ <br><br>
                N° de Código: ____________
            </td>

            <td class="signature-cell" style="text-align:center;">
                <br>
                <br>
                ________________________ <br>
                FIRMA DEL PNP <br>
                 <br>
                Nombres y Apellidos:<br><br>
                ________________________<br><br>
                ________________________ <br><br>
                N° del CIP: ____________
            </td>

            <td class="signature-cell" style="text-align:center;">
                <br>
                <br>
                ________________________ <br>
                FIRMA DEL CONDUCTOR <br>
                 <br>
                Nombres y Apellidos:<br><br>
                ________________________<br><br>
                ________________________ <br><br>
                N° del DNI: ____________
            </td>
        </tr>
    </table>

</body>
</html>
