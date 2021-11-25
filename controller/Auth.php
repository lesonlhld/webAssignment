<?php

namespace Controller;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Auth extends \Controller\Controller
{
    public function login()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            redirect(site_url("home"));
        } else {
            $this->data["subview"] = "client/auth/login";
            View("client/main", $this->data);
        }
    }

    public function register()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            redirect(site_url("home"));
        } else {
            $this->data["subview"] = "client/auth/register";
            View("client/main", $this->data);
        }
    }

    public function forget_password()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            redirect(site_url("home"));
        } else {
            $this->data["subview"] = "client/auth/forget_password";
            View("client/main", $this->data);
        }
    }

    public function create_password()
    {
        if (isset($_GET["email"]) && $_GET["email"] != "" && isset($_GET["reset_token"]) && $_GET["reset_token"] != "") {
            $this->data['data']['email'] = $_GET["email"];
            $this->data['data']['reset_token'] = $_GET["reset_token"];
        } else {
            $this->data['data']['msg'] = 'Thông tin xác thực không hợp lệ';
        }
        $this->data["subview"] = "client/auth/create_password";
        View("client/main", $this->data);
    }

    public function logout()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            session_destroy();
        }
        redirect(site_url("auth/login"));
    }

    public function check_login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $USER_Model = Model('USER_Model');
        $user_login = $USER_Model->login($email, $password);
        if ($user_login == null) {
            View("", ['msg' => 'Sai email hoặc password'], 401);
        } else if ($user_login->role_id == 2) {
            View("", ['msg' => 'Bạn không có quyền truy cập'], 401);
        } else if ($user_login->publish == 0) {
            View("", ['msg' => 'Tài khoản của bạn hiện đang bị khóa'], 401);
        } else {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['lastname'] = $user_login->last_name;
            $_SESSION['role'] = $user_login->role_id;
            $_SESSION['id'] = $user_login->id;
        }
    }

    public function check_register()
    {
        $data = $_POST;

        if ($data["firstname"] == "") {
            View("", ['msg' => 'Họ không được để trống'], 401);
        } else if ($data["lastname"] == "") {
            View("", ['msg' => 'Tên không được để trống'], 401);
        } else if ($data["email"] == "") {
            View("", ['msg' => 'Email không được để trống'], 401);
        } else if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            View("", ['msg' => 'Email không hợp lệ'], 401);
        } else if ($data["password"] == "") {
            View("", ['msg' => 'Mật khẩu không được để trống'], 401);
        } else if (strlen($data["password"]) < 6) {
            View("", ['msg' => 'Mật khẩu bao gồm tối thiểu 6 ký tự'], 400);
        } else if ($data["passwordConfirm"] == "") {
            View("", ['msg' => 'Mật khẩu xác nhận không được để trống'], 401);
        } else if ($data["birthday"] == "") {
            View("", ['msg' => 'Ngày sinh không được để trống'], 401);
        } else if ($data["password"] != $data["passwordConfirm"]) {
            View("", ['msg' => 'Mật khẩu xác nhận không trùng khớp'], 401);
        } else {
            $USER_Model = Model('USER_Model');
            if ($USER_Model->check_exist_email($data['email']) > 0) {
                View("", ['msg' => 'Email đã tồn tại'], 401);
            } else {
                $id = $USER_Model->create($data);
                if ($id  > 0) {
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['lastname'] = $data["lastname"];
                    $_SESSION['role'] = 1;
                    $_SESSION['id'] = $id;
                } else {
                    View("", ['msg' => 'Có lỗi xảy ra'], 401);
                }
            }
        }
    }

    public function update_password()
    {
        $data = $_POST;
        if ($data["email"] == "" || $data["reset_token"] == "") {
            View("", ['msg' => 'Thông tin xác thực không hợp lệ'], 400);
        } else if ($data["password"] == "") {
            View("", ['msg' => 'Mật khẩu không được để trống'], 400);
        } else if (strlen($data["password"]) < 6) {
            View("", ['msg' => 'Mật khẩu bao gồm tối thiểu 6 ký tự'], 400);
        } else if ($data["passwordConfirm"] == "") {
            View("", ['msg' => 'Mật khẩu xác nhận không được để trống'], 400);
        } else if ($data["password"] != $data["passwordConfirm"]) {
            View("", ['msg' => 'Mật khẩu xác nhận không trùng khớp'], 400);
        } else {
            $USER_Model = Model('USER_Model');
            $member = $USER_Model->get_by_email($data['email']);

            if ($member == null) {
                View("", ['msg' => 'Không tồn tại email này!'], 400);
            } else {
                if ($member->token != $data["reset_token"]) {
                    View("", ['msg' => 'Token không hợp lệ'], 400);
                } else {
                    $USER_Model->update_token($data["email"], null);
                    $USER_Model->update_password($member->id, $data["password"]);
                    View("", ['msg' => 'Tạo lại mật khẩu thành công. Vui lòng đăng nhập lại']);
                }
            }
        }
    }

    public function check_forget()
    {
        if (isset($_POST["email"]) && $_POST["email"] != "") {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                View("", ['msg' => 'Email không hợp lệ'], 400);
            } else {
                $email = $_POST["email"];

                $USER_Model = Model('USER_Model');
                $member = $USER_Model->get_by_email($email);

                if ($member == null) {
                    View("", ['msg' => 'Không tồn tại email này!'], 400);
                } else {
                    $reset_token = time() . md5($email);
                    $USER_Model->update_token($email, $reset_token);

                    $message = '<p>Chào ' . $member->last_name . ',</p><p>Vui lòng click vào <a href="' . site_url("auth/create_password?email=$email&reset_token=$reset_token") . '" target="_blank"><strong style="color:#F00">đây</strong></a> để khôi phục mật khẩu của bạn.</p>';

                    $this->send_mail($email, "Reset password", $message);
                }
            }
        } else {
            View("", ['msg' => 'Email không được để trống'], 400);
        }
    }

    private function send_mail($to, $subject, $message)
    {
        $mail = new PHPMailer();

        try {
            //Server settings

            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com;'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'leson0310@gmail.com'; // SMTP username
            $mail->Password = 'leson1606'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to

            $mail->setFrom('leson0310@gmail.com');
            //Recipients
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->Send()) {
                View("", ['msg' => 'Vui lòng kiểm tra email của bạn để khôi phục mật khẩu!']);
            } else {
                View("", ['msg' => 'Không thể gửi email khôi phục mật khẩu!'], 400);
            }
        } catch (Exception $e) {
            View("", ['msg' => 'Có lỗi xảy ra!']);
        }
    }
}
