<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string()=='')?"":"collapsed"?>" href=".">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li> 

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string()=='keranjang')?"":"collapsed"?>" href="<?php echo base_url()?>keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <?php if (session()->get('role') == 'Admin') { ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string()=='user-management')?"":"collapsed"?>" href="<?php echo base_url()?>user-management">
                    <i class="bi bi-people"></i>
                    <span>User-management</span>
                </a>
            </li>
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string()=='produk')?"":"collapsed"?>" href="<?php echo base_url()?>produk">
                <i class="bi bi-receipt"></i>
                <span>Produk</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar -->
