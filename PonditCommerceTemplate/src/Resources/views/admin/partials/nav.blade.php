<nav id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('/') }}vendor/ponditcommercetemplate/assets/admin/images/logo.png" height="70px" width="180px" alt="">
        <strong>PC</strong>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ url('/admin') }}" style="font-size: 12px;">
                &nbsp; <i class="fas fa-tachometer-alt"></i>
                &nbsp; Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/banner') }}" style="font-size: 12px;">
                &nbsp; <i class="fas fa-images"></i>
                &nbsp; Banner
            </a>
        </li>
        <li>
            <a style="font-size: 12px;" href="#salesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-hand-holding-usd"></i>
                &nbsp; Sales
            </a>
            <ul class="collapse list-unstyled" id="salesSubmenu">
                <li>
                    <a href="#">Orders</a>
                </li>
                <li>
                    <a href="#">Invoices </a>
                </li>
                </li>
                <li>
                    <a href="#">Shipments </a>
                </li>
                </li>
                <li>
                    <a href="#">Credit Memos </a>
                </li>
                </li>
                <li>
                    <a href="#">Returns </a>
                </li>
                </li>
                <li>
                    <a href="#">Billing Agreements </a>
                </li>
                </li>
                <li>
                    <a href="#">Transactions </a>
                </li>
                </li>
                <li>
                    <a href="#">Braintree Virtual Terminal </a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#catalogSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i class="fas fa-box"></i>
                &nbsp; Catalog
            </a>
            <ul class="collapse list-unstyled" id="catalogSubmenu">
                <li>
                    <a href="{{ url('/admin/product') }}">Products</a>
                </li>
                <li>
                    <a href="{{ url('/admin/category') }}">Categories </a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#customersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-users"></i>
                &nbsp; Customers
            </a>
            <ul class="collapse list-unstyled" id="customersSubmenu">
                <li>
                    <a href="#">All Customers</a>
                </li>
                <li>
                    <a href="#">Now Online Customers </a>
                </li>
                <li>
                    <a href="#">Customer Segments </a>
                </li>
                <li>
                    <a href="#">Customer Groups </a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#marketingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-bullhorn"></i>
                &nbsp; Marketing
            </a>
            <ul class="collapse list-unstyled" id="marketingSubmenu">
                <li>
                    <a href="#">Promotions</a>
                </li>
                <li>
                    <a href="#">Communications</a>
                </li>
                <li>
                    <a href="#">User Content</a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#contentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-newspaper"></i>
                &nbsp; Content
            </a>
            <ul class="collapse list-unstyled" id="contentSubmenu">
                <li>
                    <a href="#">Elements</a>
                </li>
                <li>
                    <a href="#">Content Staging</a>
                </li>
                <li>
                    <a href="#">Design</a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#reportsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-chart-bar"></i>
                &nbsp; Reports
            </a>
            <ul class="collapse list-unstyled" id="reportsSubmenu">
                <li>
                    <a href="#">Marketing</a>
                </li>
                <li>
                    <a href="#">Sales</a>
                </li>
                <li>
                    <a href="#">Customers</a>
                </li>
                <li>
                    <a href="#">Private Sales</a>
                </li>
                <li>
                    <a href="#">Customer Engagement</a>
                </li>
                <li>
                    <a href="#">Reviews</a>
                </li>
                <li>
                    <a href="#">Products</a>
                </li>
                <li>
                    <a href="#">Business Intelligence</a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#storesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-store"></i>
                &nbsp; Stores
            </a>
            <ul class="collapse list-unstyled" id="storesSubmenu">
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Currency</a>
                </li>
                <li>
                    <a href="#">Inventory</a>
                </li>
                <li>
                    <a href="#">Taxes</a>
                </li>
                <li>
                    <a href="#">Attributes</a>
                </li>
                <li>
                    <a href="#">Other Settings</a>
                </li>
            </ul>
        </li>
        <li>
            <a style="font-size: 12px;" href="#systemSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                &nbsp; <i style="font-size: 15px;" class="fas fa-cog"></i>
                &nbsp; System
            </a>
            <ul class="collapse list-unstyled" id="systemSubmenu">
                <li>
                    <a href="#">Data Transfer</a>
                </li>
                <li>
                    <a href="#">Extensions</a>
                </li>
                <li>
                    <a href="#">Tools</a>
                </li>
                <li>
                    <a href="#">Support</a>
                </li>
                <li>
                    <a href="#">Permissions</a>
                </li>
                <li>
                    <a href="#">Action Logs</a>
                </li>
                <li>
                    <a href="#">Other Settings</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>