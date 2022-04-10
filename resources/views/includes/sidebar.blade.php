<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-ecommerce">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.category.index') }}">Category</a></li>
                        <li><a href="#">Product List</a></li>
                        <li><a href="#">Add Product</a></li>
                        <li><a href="{{ route('product.type.index') }}">Product Type</a></li>
                        <li><a href="#">Print Barcode</a></li>
                        <li><a href="#">Adjustment List</a></li>
                        <li><a href="#">Add Adjustment</a></li>
                        <li><a href="#">Stock Count</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-credit-card"></i>
                        <span key="t-purchase">Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Purchase List</a></li>
                        <li><a href="#">Add Purchase</a></li>
                        <li><a href="#">Import Purchase By CSV</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cart-alt"></i>
                        <span key="t-purchase">Sale</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Sell List</a></li>
                        <li><a href="#">POS</a></li>
                        <li><a href="#">Import Sell By CSV</a></li>
                        <li><a href="#">Gift Card List</a></li>
                        <li><a href="#">Coupon List</a></li>
                        <li><a href="#">Delivery List</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wallet-alt"></i>
                        <span key="t-expense">Expense</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Expense Category</a></li>
                        <li><a href="#">Expense List</a></li>
                        <li><a href="#">Add Expense</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-quatation">Quatation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Quatation List</a></li>
                        <li><a href="#">Add Quatation</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share"></i>
                        <span key="t-transfer">Transfer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Transfer List</a></li>
                        <li><a href="#">Add Transfer</a></li>
                        <li><a href="#">Import Transfer By CSV</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-rotate-left"></i>
                        <span key="t-return">Return</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Sale</a></li>
                        <li><a href="#">Purchase</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-return">Accounting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Accounting List</a></li>
                        <li><a href="#">Add Accounting</a></li>
                        <li><a href="#">Money Transfer</a></li>
                        <li><a href="#">Balance Sheet</a></li>
                        <li><a href="#">Account Statement</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-user-group"></i>
                        <span key="t-return">HRM</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Department</a></li>
                        <li><a href="#">Employee</a></li>
                        <li><a href="#">Attendance</a></li>
                        <li><a href="#">Payroll</a></li>
                        <li><a href="#">Holiday</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user"></i>
                        <span key="t-return">People</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.index') }}">User List</a></li>
                        <li><a href="{{ route('user.create') }}">Add User</a></li>
                        <li><a href="{{ route('customer.index') }}">Customer List</a></li>
                        <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                        <li><a href="#">Biller List</a></li>
                        <li><a href="#">Add Biller</a></li>
                        <li><a href="{{ route('supplier.index') }}">Supplier List</a></li>
                        <li><a href="{{ route('supplier.create') }}">Add Supplier</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-return">Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Summary Report</a></li>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">Product Report</a></li>
                        <li><a href="#">Daily Sale</a></li>
                        <li><a href="#">Monthly Sale</a></li>
                        <li><a href="#">Daily Purchase</a></li>
                        <li><a href="#">Monthly Purchase</a></li>
                        <li><a href="#">Sale Report</a></li>
                        <li><a href="#">Payment Report</a></li>
                        <li><a href="#">Purchase Report</a></li>
                        <li><a href="#">Warehouse Report</a></li>
                        <li><a href="#">Warehouse Stock Chart</a></li>
                        <li><a href="#">Product Quatation Alert</a></li>
                        <li><a href="#">User Report</a></li>
                        <li><a href="#">Customer Report</a></li>
                        <li><a href="#">Supplier Report</a></li>
                        <li><a href="#">Due Report</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-cog"></i>
                        <span key="t-return">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Role Permission</a></li>
                        <li><a href="#">Descount Plan</a></li>
                        <li><a href="#">Discount</a></li>
                        <li><a href="#">Send Notification</a></li>
                        <li><a href="#">Warehouse</a></li>
                        <li><a href="{{ route('customer.group.index') }}">Customer Group</a></li>
                        <li><a href="{{ route('brand.index') }}">Brand</a></li>
                        <li><a href="{{ route('purchase.unit.index') }}">Purchase Unit</a></li>
                        <li><a href="{{ route('sell.unit.index') }}">Sell Unit</a></li>
                        <li><a href="#">Currency</a></li>
                        <li><a href="#">Tax</a></li>
                        <li><a href="#">User Profile</a></li>
                        <li><a href="#">Create SMS</a></li>
                        <li><a href="#">Backup Database</a></li>
                        <li><a href="#">General Setting</a></li>
                        <li><a href="#">Mail Setting</a></li>
                        <li><a href="#">Reward Point Setting</a></li>
                        <li><a href="#">SMS Setting</a></li>
                        <li><a href="#">POS Setting</a></li>
                        <li><a href="#">HRM Setting</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-in-circle text-danger"></i>
                        <span key="t-dashboards">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
