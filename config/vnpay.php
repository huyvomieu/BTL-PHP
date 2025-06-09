<?php

return [
    'vnp_url' => env('VNPAY_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'),
    'vnp_tmncode' => env('VNPAY_TMN_CODE', 'CT9LT55Q'), //Mã định danh merchant kết nối (Terminal Id)
    'vnp_hashsecret' => env('VNPAY_HASH_SECRET', 'NTL2O7J297LUOWBQ1QSDLTXR03P6W2XD'),
    'vnp_returnurl' => env('VNPAY_RETURN_URL', 'http://localhost:8000/order/return-vnpay'),
    'apiUrl' => 'https://sandbox.vnpayment.vn/merchant_webapi/api/transaction'
];