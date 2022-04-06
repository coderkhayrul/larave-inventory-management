<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>
<body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:842px; width:595px;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center'
                                style='font-size: 20px; font-weight: bold; background:#1282eb; color:#FFFFFF'>Customer
                                List </div>
                        </td>
                    </tr>
                </table>
                <table width='100%' cellspacing='0' cellpadding='2' border='1' bordercolor='#CCCCCC'>
                    <tr>
                        <td width='15%' bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Name
                            </strong></td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Phone</strong></td>
                        <td width='20%' bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Company</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Address</strong></td>
                    </tr>
                    <tr style="display:none;">
                        <td colspan="*">
                    @foreach ($all as $data)
                    <tr>
                        <td valign='top' style='font-size:12px;'>{{ $data->supplier_name }}</td>
                        <td valign='top' style='font-size:12px;'>{{ $data->supplier_phone }}</td>
                        <td valign='top' style='font-size:12px;'>{{ $data->supplier_company }}</td>
                        <td valign='top' style='font-size:12px;'>{{ $data->supplier_address }}</td>
                    </tr>
                    @endforeach
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>
