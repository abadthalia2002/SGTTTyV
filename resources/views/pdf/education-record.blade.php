<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .title {
            text-align: center;
            margin-bottom: 5px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .section-title {
            font-weight: bold;
            margin-top: 10px;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }

        .box {
            width: 14px;
            height: 14px;
            border: 1px solid #000;
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
            text-align: center;
            font-weight: bold;
        }




        .label-small {
            font-size: 11px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="title">
        MUNICIPALIDAD DISTRITAL VEINTISÉIS DE OCTUBRE <br>
        SUBGERENCIA DE TRANSPORTE, TRÁNSITO Y VIALIDAD
    </div>

    <div class="title">
        ACTA DE CONTROL EDUCATIVA 202 / MDVO
    </div>

    <!-- DATOS GENERALES -->

    <table border="1">
        <tr class="section-title">
            <td colspan="6">DATOS GENERALES</td>
        </tr>

        <tr>
            <td>FECHA:</td>
            <td><span class="line">{{ $record->date }}</span></td>

            <td>HORA:</td>
            <td><span class="line">{{ $record->time }}</span></td>

            <td>LUGAR:</td>
            <td><span class="line">{{ $record->location }}</span></td>
        </tr>
    </table>


    <!-- DATOS DEL CONDUCTOR -->

    <table border="1">
        <tr class="section-title">
            <td colspan="2">DATOS DEL CONDUCTOR</td>
        </tr>

        <tr>
            <td>NOMBRE Y APELLIDOS:</td>
            <td>
                {{ $record->driver_name }}
            </td>
        </tr>
        <tr>
            <td>DOMICILIO:<br><span class="line"></td>
            <td>
                {{ $record->driver_address }}
            </td>
        </tr>
        <tr>
            <td>DNI N°::<br><span class="line"></td>
            <td>
                {{ $record->driver_document_number }}
            </td>
        </tr>
    </table>

    <!-- LICENCIA -->
    <table border="1">
        <tr class="section-title">
            <td colspan="4">LICENCIA DE CONDUCIR</td>
        </tr>

        <tr>
            <td>CLASE - CATEGORÍA:</td>

            <td>
                {{ $record->license_class }}
            </td>

            <td>NÚMERO:</td>
            <td>
                {{ $record->license_number }}
            </td>
        </tr>
    </table>

    <!-- DATOS DEL VEHÍCULO -->
    <table border="1">
        <tr class="section-title">
            <td colspan="4">DATOS DEL VEHÍCULO</td>
        </tr>

        <tr>
            <td>PLACA:<br><span class="line">{{ $record->vehicle_plate }}</span></td>
            <td>N° DE MOTOR:<br><span class="line">{{ $record->engine_number }}</span></td>
            <td>CLASE:<br><span class="line">{{ $record->vehicle_class }}</span></td>
            <td>MARCA:<br><span class="line">{{ $record->vehicle_brand }}</span></td>
        </tr>

        <tr>
            <td>N° DE TARJETA:<br><span class="line">{{ $record->vehicle_registration_number }}</span></td>
            <td>COLOR:<br><span class="line">{{ $record->vehicle_color }}</span></td>
            <td>F. INSCRIP.:<br><span class="line">{{ $record->registration_date }}</span></td>
            <td></td>
        </tr>
    </table>


    <!-- PROPIETARIO -->
    <table border="1">
        <tr class="section-title">
            <td colspan="2">DATOS DEL PROPIETARIO</td>
        </tr>

        <tr>
            <td>NOMBRE / RAZÓN SOCIAL:</td>
            <td>
                {{ $record->partner_name }}
            </td>
        </tr>
        <tr>
            <td>DOMICILIO:</td>
            <td>
                {{ $record->partner_address }}
            </td>
        </tr>
        <tr>
            <td>DNI N°:</td>
            <td>
                {{ $record->partner_document_number }}
            </td>
        </tr>
    </table>

    <!-- INFRACCIONES -->
    <div class="section-title">DE LA INFRACCIÓN</div>
    <table border="1">
        <tr>
            <td>
                <div class="box">@if($record->law_27181) X @endif</div> LEY 27181
            </td>
            <td>
                <div class="box">@if($record->ds_017_09_mtc) X @endif</div> DS 017-09-MTC
            </td>
            <td>
                O.M. N°:<br> <span class="line">{{ $record->om_number_1 }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <div class="box">@if($record->law_27189) X @endif</div> LEY 27189
            </td>
            <td>
                <div class="box">@if($record->ds_055_10_mtc) X @endif</div> DS 055-10-MTC
            </td>
            <td>
                O.M. N°:<br> <span class="line">{{ $record->om_number_2 }}</span>
            </td>
        </tr>
    </table>

    <!-- INFORMACIÓN ADICIONAL -->
    <div class="section-title">INFORMACIÓN ADICIONAL</div>
    <table border="1">
        <tr>
            <td>
                <br>
                {{ $record->additional_information }}
                <br>
            </td>
        </tr>
    </table>

    <!-- OBSERVACIONES -->
    <div class="section-title">OBSERVACIONES DEL CONDUCTOR</div>
    <table border="1">
        <tr>
            <td>
                <br>

                {{ $record->driver_observations }}
                <br>
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
                FIRMA DEL INTERVENIDO <br>
                <br>
                Nombres y Apellidos:<br><br>
                ________________________<br><br>
                ________________________ <br><br>
                N° del DNI: ____________
            </td>
        </tr>
    </table>

    <!--   <table class="sign-table">
        <tr>
            <td>
                <div class="sign-line"></div>
                <span class="label-small">FIRMA DEL INSPECTOR</span><br>
                CÓDIGO: <span class="line"></span>
            </td>

            <td>
                <div class="sign-line"></div>
                <span class="label-small">FIRMA DEL INTERVENIDO</span><br>
                DNI N°: <span class="line"></span>
            </td>

            <td>
                <div class="sign-line"></div>
                <span class="label-small">FIRMA DEL EFECTIVO PNP</span><br>
                CIP: <span class="line"></span>
            </td>
        </tr>
    </table>
 -->
</body>

</html>