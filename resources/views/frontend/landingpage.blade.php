@include('frontend.includes.header')
@include('frontend.includes.slider')

<style>
    .floating{
        position: fixed;
        top: 50%;
        right: 0;
        z-index: 999;
        
    }
</style>

<section id="main-container">
    <div class="container">
        <!-- Section 1 -->
        <div class="row">
            <div class="col-md-12">
                <div class="article-list" id="widget-menu">
                    <div class="panel panel-default panel-theme">
                        <div class="panel-heading">
                            <h2 class="heading-center" style="width: 60%;height: 60px;line-height: 45px;">Komisi Pemilihan Umum Kabupaten Bantaeng</h2>
                        </div>
                        <div class="panel-body">
                            <ul id="menu">
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/sejarahkpu'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Sejarah Pemilu</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/profile_anggota'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Profil Anggota KPU</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/profile_seketariat'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Agenda</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/visi_misi'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Visi Misi</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/hukum'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Hukum</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/list_berita'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Berita</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/list_pengumuman'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Pengumuman</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/dokumen'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Dokumen</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/kontak'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Gallery</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/cekdps'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Cek Data Pemilih</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/cekdps'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Informasi Hasil Perhitungan Suara</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/cekdps'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon.png" class="menu-icon">
                                        <span>Pemilu Pilkada</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <a href="<?php echo url('/home'); ?>"><h2 class="heading-center" style="width: 40%;height: 60px;line-height: 45px;">Masuk Website Utama</h2></a>
                        </div>
                    </div>
                    <ul class="floating">
                        <li style="list-style:none">
                            <a class="icon-layanan-perizinan " href="<?php echo url('/sejarahkpu'); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="uploads/menu/icon.png" class="menu-icon"><br><center>testing</center>
                            </a>
                            <br>
                            <a class="icon-layanan-perizinan " href="<?php echo url('/sejarahkpu'); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="uploads/menu/icon.png" class="menu-icon"><br><center>testing</center>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Main -->
<!-- /Main -->
@include('frontend.includes.footer')
