<?php 
class AuthController{
    function login(){
       $email = $_POST['email'];
       $password = $_POST['password'];
       $customerRepository = new CustomerRepository();
       $customer = $customerRepository->findEmail($email);
       if(!$customer){
        $_SESSION['error'] = 'error: email không tồn tại';
        header('location:/');
        exit;
       }

       if(!password_verify($password, $customer -> getPassword())){
        $_SESSION['error'] = 'error: sai mật khẩu';
        header('location:/');
        exit;
       }

       if (!$customer->getIsActive()){
        $_SESSION['error'] = 'tài khoản chưa kích hoạt';
        header('location:/');
        exit;
       }

       // đăng nhập thành công (đúng email và password)
       $_SESSION['email'] = $email;
       $_SESSION['name'] = $customer->getName();
       header('location:?c=customer&a=show');
    }

    function logout(){
        //hủy session nghĩa là array $_SESSION sẽ empty
        session_destroy();
        header('location:/');
    }
}
?>