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
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Email</strong></td>
                        <td width='20%' bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Phone</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Status</strong></td>
                    </tr>
                    <tr style="display:none;">
                        <td colspan="*">
                    @foreach ($all as $data)
                    <tr>
                        <td valign='top' style='font-size:12px;'>{{ $data->name }}</td>
                        <td valign='top' style='font-size:12px;'>{{ $data->email }}</td>
                        <td valign='top' style='font-size:12px;'>{{ $data->phone }}</td>
                        <td valign='top' style='font-size:12px;'>
                        @if ($data->active == 1)
                            Active
                        @else
                            Deactive
                        @endif
                        </td>
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
