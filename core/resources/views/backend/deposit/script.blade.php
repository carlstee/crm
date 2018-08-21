
<script>
    $(document).ready(function(){
        /**==========================
         Upload Image Preview
         =========================**/
        $.uploadPreview({
            input_field: "#paypal_picture",
            preview_box: "#preview-box"
        });
        $.uploadPreview({
            input_field: "#perfect_money_picture",
            preview_box: "#preview-box_perfect_picture"
        });
        $.uploadPreview({
            input_field: "#btc_picture",
            preview_box: "#preview-box-btc-picture"
        });
        $.uploadPreview({
            input_field: "#stripe_picture",
            preview_box: "#preview-box-stripe"
        });
    });
    /**==========================
     Form Preloader
     =========================**/
    $(document).on('submit','#perfect_money_from',function(){
        $('#perfect_money_from').ploading({
            action: "show"
        })
        return true;
    });
    $(document).on('submit','#paypal_from',function(){
        $('#paypal_from').ploading({
            action: "show"
        })
        return true;
    });
    $(document).on('submit','#btc_from',function(){
        $('#btc_from').ploading({
            action: "show"
        })
        return true;
    });
    $(document).on('submit','#stripe_from',function(){
        $('#stripe_from').ploading({
            action: "show"
        })
        return true;
    });

</script>