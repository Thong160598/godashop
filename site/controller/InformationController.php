<?php 
class InformationController {
    //chính sách đổi trả
    function returnPolicy(){
        require 'view/information/returnPolicy.php';
    }

    //chính sách thanh toán
    function paymentPolicy()
{
    require 'view/information/paymentPolicy.php';
}

//chính sách giao hàng
function deliverypolicy()
{
    require 'view/information/deliveryPolicy.php';
}

}
?>