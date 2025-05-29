<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="index.html" class="sidebar-logo">
      <img src="{{asset('images/logo.png')}}" alt="site logo" class="light-logo">
      <img src="{{asset('images/logo-light.png')}}" alt="site logo" class="dark-logo">
      <img src="{{asset('images/logo-icon.png')}}" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>Dashboard</span>
        </a>
        
      </li>
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>MANAGE HOME SETTING</span>
        </a>
        <ul class="sidebar-submenu">
        <li>
            <a href="{{route('slideradd')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>ADD HOME SLIDER </a>
          </li>
         
          <li>
            <a href="{{ route('sliderlist') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> HOME SLIDER LIST</a>
          </li>

    </ul>
      </li>
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>MANAGE PRODUCT</span>
        </a>
        <ul class="sidebar-submenu">
        <li>
            <a href="{{route('categoryadd')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>CATEGORY ADD </a>
          </li>
         
          <li>
            <a href="{{ route('categoryList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>CATEGORY LIST</a>
          </li>

          <li>
            <a href="{{ route('subcategoryadd') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>SUBCATEGORY ADD</a>
          </li>
          
          <li>
            <a href="{{ route('subcategoryList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>SUBCATEGORY LIST</a>
          </li>


          <li>
            <a href="{{ route('productadd') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>PRODUCT ADD</a>
          </li>
          
          <li>
            <a href="{{ route('productList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>PRODUCT LIST</a>
          </li>
        </ul>
      </li>
  </ul>
  </div>
</aside>
