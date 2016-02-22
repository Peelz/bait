<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text"><a href="{{ url('/admin') }}">หน้าแรก</a></li>

      <li class="has-submenu">
        <a href="{{ action('Admin\ProductController@index')}}">จัดการสินค้า</a>
        <ul class="submenu menu vertical" data-submenu>
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
          <li><a href="#">Three</a></li>
        </ul>
      </li>
      <li><a href="{{ url('admin/category') }}">จัดการแบรน</a></li>
      <li><a href="{{ url('admin/cart') }}">ตะกร้าสินค้า</a></li>
      <li><a href="{{ url('admin/invoice') }}">ใบแจ้งหนี้</a></li>

      <li><a href="{{ url('admin/checkpayment') }}">ยืนยันการสั่งซื้อ</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="dropdown menu" data-dropdown-menu>
      <li><a href="{{ url('admin/logout') }}">ออกจากระบบ</a></li>
    </ul>

  </div>
</div>
