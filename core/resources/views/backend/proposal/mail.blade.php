<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>News Letter</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top" bgcolor="#373737" style="background-color:#373737;">
            <br>
            <br>
            <table width="600" border="0" cellspacing="0" cellpadding="0">

                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0">

                            <tr>
                                <td align="center" valign="top" bgcolor="#d00062" style="background-color:#ffffff; padding-left:14px; padding-right:14px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="100%" align="left" valign="top" bgcolor="#ececec" style="background-color:#ececec; padding:7px;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#525252;">

                                                            <div style="font-size:28px; color:#525252;">{{$news->title}}</div>
                                                            <div><br>
                                                                {!! $news->detail !!}<br>
                                                                <br>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="left" valign="top" bgcolor="#d00062" style="background-color:#d00062; padding-left:10px; padding-right:10px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#ffffff; padding-left:10px;"><b>Hours:</b> {{date('g:ia \o\n l jS F Y',strtotime($news->created_at))}} <br>
                                                <b>Customer Support: </b>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->email}}<br>
                                                <b>Mobile:</b>{{$general->mobile}}<br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
            <br>
        </td>
    </tr>
</table>
</body>
</html>