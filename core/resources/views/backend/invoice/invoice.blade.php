<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$cate->invoice_id}}</title>
    <link href="{{asset('assets/backend/invoice.css')}}" rel="stylesheet" type="text/css" />

</head>
<button id="printbtn" type="button" class="printbtn" style=" background-color: #008CBA;
    border: none;
    color: white;
    padding: 12px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin-left: 630px;
    font-size: 16px;">Print</button>
<div id="printInvoice">
    <body>
    <div class="invoice-box" >
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('assets/images/logo/'.$general->image)}}" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Invoice #: {{$cate->invoice_id}}<br>
                                Created: {{date('Y,M-d', strtotime($cate->date))}}<br>
                                Due: {{date('Y,M-d', strtotime($cate->updated_at))}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="9">
                    <table>
                        <tr>
                            <td>
                                {{$general->title}}.<br>
                                {{$general->mobile}}<br>
                                {{$general->email}}
                            </td>

                            <td>
                                {{$cate->company->office_name}}.<br>
                                {{$cate->company->owner_name}}<br>
                                {{$cate->company->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td>

                </td>

                <td>
                    Amount
                </td>
            </tr>

            <tr class="details">
                <td>
                    @if($cate->payment == 0)
                        Due
                    @else
                        Paid
                    @endif
                </td>
                <td>

                </td>

                <td>
                    {{$cate->due_amount}} {{$general->currency}}
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Item PACKAGE:({{$cate->package->package_name}})
                </td>

                <td>
                    Quantity
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item">
                <td>
                    <ul>
                        @foreach($cate->package->food_item as $data)
                            <li>
                                {{$data->item}}
                            </li>
                        @endforeach
                    </ul>
                </td>

                <td>
                    {{$cate->quantity}}
                </td>

                <td>
                    {{$cate->package->package_price}} {{$general->currency}}

                </td>
            </tr>

            <tr class="total">
                <td></td>
                <td></td>

                <td style="">
                    <b>Total: {{$cate->package->package_price * $cate->quantity}} {{$general->currency}}</b>
                </td>
            </tr>


        </table>
        <footer style="width: 100%">
            <table class="pranto" style="width: 100%">
                <p style="width: 100%">{!! $cate->description !!}</p>
            </table>
        </footer>

    </div>
</div>
<a href="{{url('admin/catering/system')}}">Go Back</a>
<script src="https://code.jquery.com/jquery-3.2.1.slim.js" integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
        crossorigin="anonymous"></script>


<script>
    jQuery(document).ready(function() {
        $("#printbtn").click(function () {

            var contents = $("#printInvoice").html();

            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title>Invoice</title>');
            frameDoc.document.write('</head><body>');
            //Append the external CSS file.
            frameDoc.document.write('<link href="{{asset('assets/backend/invoice.css')}}" rel="stylesheet" type="text/css" />');
//
            //alert(frameDoc);
            //Append the DIV contents.
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
            }, 500);
        });
    });
</script>
</body>

</html>


