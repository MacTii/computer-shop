// $('[class="btn btn-primary btn-sm"]').click(function(){
//     $(this).closest('tr').remove()
//  })

$('[class="btn btn-outline-primary js-btn-plus"]').on("click input", function(){
    sum(this);
 })
 
 function sum(element){
    var selectors = $(element).closest('tr');

    var sum = parseFloat(selectors.find('.cost').text()) + parseFloat(selectors.find('.total').text());
    selectors.find('.total').text(sum)
 }

$('[class="btn btn-outline-primary js-btn-minus"]').on("click input", function(){
    subtraction(this);
 })

 function subtraction(element){
    var selectors = $(element).closest('tr');

    var subtraction = parseFloat(selectors.find('.total').text()) - parseFloat(selectors.find('.cost').text()); //.total == td:eq(4) .cost == td:eq(2)
    if(subtraction < 0)
        return;
    // console.log(subtraction)
    selectors.find('.total').text(subtraction)
    // console.log(selectors.find('.total').text())
}

$('[class="text-black"]').ready(function(){
    calculateTotal();
 })

function calculateTotal() {
    //Calculate sum of price
    var sum = 0;
    $('tr').each(function() {
        var item_price = parseFloat($(this).find('.total').text());
        
        //Check for NaN & add.
        sum += item_price ? item_price : 0;
        // console.log(item_price)
    });

    //console.log(sum);
    //Display to div
    $("#cart_total").text("$" + sum);
}

// $(".js-btn-minus , .js-btn-plus").on("click input", function() {
//     var selectors = $(this).closest('tr'); //get closest tr
//     var quan = selectors.find('.quantity').val(); //get qty
//     if (!quan || quan < 0)
//       return;
//     var cost = parseFloat(selectors.find('.cost').text());
//     var total = (cost * quan).toFixed(2);
//     selectors.find('.total').text(total); //add total 
  
//   })