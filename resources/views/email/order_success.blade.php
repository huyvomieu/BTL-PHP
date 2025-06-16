<h2>Chào {{ $order->order_receiver }}</h2>
<p>Cảm ơn bạn đã thanh toán đơn hàng thành công.</p>

<p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
<p><strong>Tổng tiền:</strong> {{ number_format($order->order_value) }}đ</p>

<p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất.</p>