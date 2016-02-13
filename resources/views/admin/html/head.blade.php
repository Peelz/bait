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
      <li><a href="{{ url('admin/category') }}">จัดการหมวดหมู่</a></li>
      <li><a href="#">ตรวจสอบคำสั่งซื้อ</a></li>
    </ul>
  </div>
</div>
