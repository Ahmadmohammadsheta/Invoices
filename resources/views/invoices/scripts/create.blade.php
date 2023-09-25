
<script>
//-----------------------------------------------------------------------------------------------------------
// AMA. date picker
    var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
//__________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
// AMA. related product section ajax
// working
    $(document).ready(function() {
        $('select[name="section_id"]').on('change', function() {
            var sectionId = $(this).val();
            if (sectionId) {
                $.ajax({
                    url: "{{ URL::to('products/get_products') }}/" + sectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="product_id"]').empty();
                        $.each(data, function(index, value) {
                            $('select[name="product_id"]').append('<option value="' +
                            value.id + '">' + value.name + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
//__________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
// AMA. related product price ajax
// working
    // $(document).ready(function() {
    //     $('select[name="product"]').on('change', function() {
    //         var productId = $(this).val();
    //         if (productId) {
    //             $.ajax({
    //                 url: "{{ URL::to('products/get_product') }}/" + productId,
    //                 type: "GET",
    //                 dataType: "json",
    //                 success: function(data) {
    //                     $('input[name="price"]').empty();
    //                     $('input[name="price"]').val(data.price);
    //                 },
    //             });

    //         } else {
    //             console.log('AJAX load did not work');
    //         }
    //     });

    // });
//__________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
// AMA.
    // function tax() {

    //     var price = parseFloat(document.getElementById("price").value);
    //     var discount = parseFloat(document.getElementById("discount").value);
    //     var rate_vat = parseFloat(document.getElementById("rate_vat").value);
    //     var value_vat = parseFloat(document.getElementById("value_vat").value);

    //     var amount_commission2 = price - (discount / 100);

    //     if (typeof price === 'undefined' || !price) {

    //         alert('يرجي ادخال السعر ');

    //     } else {
    //         var intResults = amount_commission2 * rate_vat / 100;

    //         var intResults2 = parseFloat(intResults + amount_commission2);

    //         sumq = parseFloat(intResults).toFixed(2);

    //         sumt = parseFloat(intResults2).toFixed(2);

    //         document.getElementById("value_vat").value = sumq;

    //         document.getElementById("total").value = sumt;

    //     }

    // }

//__________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
// AMA.
    function myFunction() {

        var amount_commission = parseFloat(document.getElementById("amount_commission").value);
        var discount = parseFloat(document.getElementById("discount").value);
        var rate_vat = parseFloat(document.getElementById("rate_vat").value);
        var value_vat = parseFloat(document.getElementById("value_vat").value);

        var amount_commission2 = amount_commission - discount;


        if (typeof amount_commission === 'undefined' || !amount_commission) {

            alert('يرجي ادخال مبلغ العمولة ');

        } else {
            var intResults = amount_commission2 * rate_vat / 100;

            var intResults2 = parseFloat(intResults + amount_commission2);

            sumq = parseFloat(intResults).toFixed(2);

            sumt = parseFloat(intResults2).toFixed(2);

            document.getElementById("value_vat").value = sumq;

            document.getElementById("total").value = sumt;

        }

    }

//__________________________________________________________________________________________________________

</script>
