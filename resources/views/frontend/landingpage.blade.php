@include('frontend.includes.header')
@include('frontend.includes.slider')

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
                                        <img src="uploads/menu/icon-sejarah.png" class="menu-icon">
                                        <span>Sejarah Pemilu</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/profile_anggota'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-profil.png" class="menu-icon">
                                        <span>Profil Anggota KPU</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/profile_seketariat'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-agenda.png" class="menu-icon">
                                        <span>Agenda</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/visi_misi'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-goal.png" class="menu-icon">
                                        <span>Visi Misi</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="http://jdih.kpu.go.id/" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-hukum.png" class="menu-icon">
                                        <span>Hukum</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/list_berita'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-berita.png" class="menu-icon">
                                        <span>Berita</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/list_pengumuman'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-pengumuman.png" class="menu-icon">
                                        <span>Pengumuman</span>
                                    </a>
                                </li>

                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="#" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-dokumen.png" class="menu-icon">
                                        <span>Dokumen</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/list_gallery'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-gallery.png" class="menu-icon">
                                        <span>Gallery</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="<?php echo url('/cekdps'); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-cekDP.png" class="menu-icon">
                                        <span>Cek Data Pemilih</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="https://pilkada2015.kpu.go.id/" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-infohasil.png" class="menu-icon">
                                        <span>Informasi Hasil Perhitungan Suara</span>
                                    </a>
                                </li>
                                <li class="menubar">
                                    <a class="icon-layanan-perizinan " href="#" target="_blank" rel="noopener noreferrer">
                                        <img src="uploads/menu/icon-pemilu.png" class="menu-icon">
                                        <span>Pemilu Pilkada</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <a href="<?php echo url('/home'); ?>"><h2 class="heading-center" style="width: 40%;height: 60px;line-height: 45px;">Masuk Website Utama</h2></a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Main -->
<!-- /Main -->
@include('frontend.includes.footer')
