<aside class="menu column is-one-quarter" id="sidebar">
    @if (Auth::user()->user_role == 'owner')
        <p class="menu-label">
            User
        </p>
        <ul class="menu-list">
            <li><a @if (isset($page_now) && $page_now == 'user/view') class='is-active' @endif href="/owner/user/view">Manajemen User</a></li>
        </ul>
        <p class="menu-label">
            Barang
        </p>
        <ul class="menu-list">
            <li ><a @if (isset($page_now) && $page_now == 'barang/add') class='is-active' @endif href="/owner/barang/add">Tambah Barang</a></li>
            <li><a @if (isset($page_now) && $page_now == 'barang/view') class='is-active' @endif href="/owner/barang/view">List Barang</a></li>
        </ul>
        <p class="menu-label">
            Transaksi
        </p>
        <ul class="menu-list">
            <li><a @if (isset($page_now) && $page_now == 'stok') class='is-active' @endif href="/owner/stok/">Tambah Stok Barang</a></li>
            <li><a @if (isset($page_now) && $page_now == 'kasir') class='is-active' @endif href="/owner/kasir">Input Transaksi Pelanggan</a></li>
            {{-- <li><a>Kasir</a></li> --}}
        </ul>
    @endif

    @if (Auth::user()->user_role == 'admin')
        <p class="menu-label">
            Barang
        </p>
        <ul class="menu-list">
            <li><a @if (isset($page_now) && $page_now == 'barang/add') class='is-active' @endif href="/admin/barang/add">Tambah Barang</a></li>
            <li><a @if (isset($page_now) && $page_now == 'barang/view') class='is-active' @endif href="/admin/barang/view">List Barang</a></li>
        </ul>
        <p class="menu-label">
            Transaksi
        </p>
        <ul class="menu-list">
            <li><a @if (isset($page_now) && $page_now == 'stok') class='is-active' @endif href="/admin/stok">Tambah Stok Barang</a></li>
            <li><a @if (isset($page_now) && $page_now == 'kasir') class='is-active' @endif href="/admin/kasir">Input Transaksi Pelanggan</a></li>
            {{-- <li><a>Kasir</a></li> --}}
        </ul>
    @endif

    @if (Auth::user()->user_role == 'karyawan')
        <p class="menu-label">
            Transaksi
        </p>
        <ul class="menu-list">
            <li><a @if (isset($page_now) && $page_now == 'stok') class='is-active' @endif href="/karyawan/stok">Tambah Stok Barang</a></li>
            <li><a @if (isset($page_now) && $page_now == 'kasir') class='is-active' @endif href="/karyawan/kasir">Input Transaksi Pelanggan</a></li>
            {{-- <li><a>Kasir</a></li> --}}
        </ul>
    @endif
</aside>