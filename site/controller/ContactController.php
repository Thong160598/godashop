<?php

class ContactController
{
    //hiển thị giao diện trang liên hệ
    public function form()
    {
        require 'view/contact/form.php';
    }

    //gửi mail đến chủ cửa hàng
    public function sendEmail()
    {
        $emailService = new EMailService();
        $to = SHOP_OWNER;
        $subject = "Godashop: khách hàng liên hệ";
        $name = $_POST['fullname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $message = $_POST['content'];
        $reply = $email;

        $content = "
       xin chào chủ shop, <br>
       dưới đây là thông tin khách hàng liên hệ: <br>
       tên: $name <br>
       SDT: $mobile <br>
       email: $email <br>
       nội dung: $message <br>
       sent from: godashop.com
       ";
        $emailService->send($to, $subject, $content, $reply);
    }
}
