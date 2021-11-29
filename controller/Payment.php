<?php

namespace Controller;

/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Payment extends \Controller\Controller
{
    public function index()
    {
        is_login();
        
        $data = $_POST;
        if (!isset($_SESSION['cart_total']) || $_SESSION['cart_total'] == 0){
            View("", ['msg' => "Giỏ hàng của bạn hiện đang trống. Vui lòng chọn món trước khi thanh toán!"], 400);
            return;
        }
        $total = $_SESSION['cart_total'];
        $data["user_id"] = $_SESSION['id'];
        $data["total"] = $total;
        $data['payment_method'] = (int)$data['payment_method'];
        $data["voucher"] = $data['voucher'] != "" ? $data['voucher'] : null;

        $ORDER_Model = Model('ORDER_Model');
        $_SESSION["tan"] = $data;
        $code = $ORDER_Model->create($data);
        
        if ($data['payment_method'] == 2) {
            $this->processMomo($code, $total);
        }
        $ORDER_ITEM_Model = Model('ORDER_ITEM_Model');
        foreach ($_SESSION["cart"] as $product_id => $item){
            $ORDER_ITEM_Model->create($code, $product_id, $item);
        }
        unset($_SESSION["cart"]);
        unset($_SESSION["cart_total"]);
        View("", ['msg' => $code]);
    }

    private function processCart()
    {
        $total = 1000;
        return $total;
    }

    private function processMomo($code, $total)
    {
        header('Content-type: text/html; charset=utf-8');

        $config = '{
            "partnerCode": "MOMO0NLV20200803",
            "accessKey": "9TfTRtjIuJVrt5pq",
            "secretKey": "N5rgKECTBRbbANXpmrLP2arqaeq9Hnym"
        }';
        $array = json_decode($config, true);
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = $array["partnerCode"];
        $accessKey = $array["accessKey"];
        $secretKey = $array["secretKey"];
        $orderInfo = "Thanh toán đơn hàng " . $code;
        $amount = "{$total}";
        $orderId = $code;
        $returnUrl = site_url("member/invoice");
        $notifyurl = site_url("member/invoice");
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $extraData = "merchantName=Smart Food Court System - Đại học Bách Khoa";

        $requestId = time() . "";
        $requestType = "captureMoMoWallet";
        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there

        header('Location: ' . $jsonResult['payUrl']);
    }

    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
