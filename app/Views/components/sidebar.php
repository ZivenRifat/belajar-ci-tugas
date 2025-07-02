<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= (uri_string() == '') ? '' : 'collapsed' ?>" href="<?= base_url('/') ?>">
        <i class="bi bi-grid"></i>
        <span>Home</span>
      </a>
    </li><!-- End Home Nav -->

    <li class="nav-item">
      <a class="nav-link <?= (uri_string() == 'keranjang') ? '' : 'collapsed' ?>" href="<?= base_url('keranjang') ?>">
        <i class="bi bi-cart-check"></i>
        <span>Keranjang</span>
      </a>
    </li><!-- End Keranjang Nav -->

    <?php if (session()->get('role') == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'produk') ? '' : 'collapsed' ?>" href="<?= base_url('produk') ?>">
          <i class="bi bi-receipt"></i>
          <span>Produk</span>
        </a>
      </li><!-- End Produk Nav -->

      <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'diskon') ? '' : 'collapsed' ?>" href="<?= base_url('diskon') ?>">
          <i class="bi bi-receipt"></i>
          <span>Diskon</span>
        </a>
      </li><!-- End Diskon Nav -->

      <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'admin/pembelian') ? '' : 'collapsed' ?>" href="<?= base_url('admin/pembelian') ?>">
          <i class="bi bi-basket"></i>
          <span>Manajemen Pembelian</span>
        </a>
      </li><!-- End Pembelian Nav -->

      <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'product-category') ? '' : 'collapsed' ?>" href="<?= base_url('product-category') ?>">
          <i class="bi bi-receipt"></i>
          <span>Produk Category</span>
        </a>
      </li><!-- End Product Category Nav -->
    <?php endif; ?>

    <!-- Menu untuk semua user termasuk admin -->
    <li class="nav-item">
      <a class="nav-link <?= (uri_string() == 'profile') ? '' : 'collapsed' ?>" href="<?= base_url('profile') ?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Nav -->

    <li class="nav-item">
      <a class="nav-link <?= (uri_string() == 'faq') ? '' : 'collapsed' ?>" href="<?= base_url('faq') ?>">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Nav -->

    <li class="nav-item">
      <a class="nav-link <?= (uri_string() == 'contact') ? '' : 'collapsed' ?>" href="<?= base_url('contact') ?>">
        <i class="bi bi-person-lines-fill"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Nav -->

  </ul>

</aside><!-- End Sidebar -->
