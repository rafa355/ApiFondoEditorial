@extends('email.base') @section('content')
<table width="400" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" object="drag-module-small">
    <tbody>
        <tr>
            <td width="100%" valign="middle" align="center">

                <table width="500" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                    <tbody>
                        <tr>
                            <td width="100%" height="40"></td>
                        </tr>
                        <tr>
                            <td valign="middle" width="100%" style="text-align: center; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 36px; color: #f1bc16; line-height: 40px; font-weight: 100;" class="fullCenter" mc:edit="2">
                                Nueva Notificación
                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>
</table>
<table width="500" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
    <!-- Image 42px - 3 -->
    <tbody>
        <tr>
            <td width="100%" height="35" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top" width="100%" class="image42">

                <table width="20" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="erase">
                    <tbody>
                        <tr>
                            <td width="100%" height="10" style="font-size: 1px; line-height: 1px;" class="erase">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                    <tbody>
                        <tr>
                            <td valign="middle" width="100%" height="40" style="text-align: left; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(50, 50, 50); font-size: 15px; font-weight: 300; line-height: 22px;" class="fullCenter" mc:edit="8">
                                <h3 style="color:#393a34;font-size:20px">Apreciado/a usuario, ha recibido la siguiente notificación desde el sistema de Planificación editorial de Fondo Editorial UNEG. </h3>
                                <p style="color: #7f8c8d;text-align: justify;font-size: 17px;">{{$notificacion}}</p>

                            </td>
                        </tr>
                        <tr>
                            <td width="100%" height="50" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
</table>
<tr>
    <td width="100%" height="35" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
</tr>
<tr>
    <td valign="top" width="100%" class="image42">

        <table width="20" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="erase">
            <tbody>
                <tr>
                    <td width="100%" height="10" style="font-size: 1px; line-height: 1px;" class="erase">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
            <tbody>
                <tr>
                    <td valign="middle" width="100%" height="40" style="text-align: center; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: rgb(50, 50, 50); font-size: 15px; font-weight: 500; line-height: 22px;" class="fullCenter" mc:edit="8">
                        <h4>Atentamente el equipo de Fondo Editorial Uneg</h4>
                    </td>
                </tr>
                <tr>
                    <td width="100%" height="5" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td width="100%" height="35" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
</tr>
<tr>
    <td valign="top" width="100%" class="image42">

        <table width="20" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="erase">
            <tbody>
                <tr>
                    <td width="100%" height="10" style="font-size: 1px; line-height: 1px;" class="erase">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td valign="top" width="100%" class="image42">

        <table width="20" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="erase">
            <tbody>
                <tr>
                    <td width="100%" height="10" style="font-size: 1px; line-height: 1px;" class="erase">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
</tbody>
</table>
@endsection