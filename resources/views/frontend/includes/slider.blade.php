<!-- Main Slider -->
<div id="main-slider">
    <div class="slide-container">
        <div class="row">
            <div class="col-md-12">
                <ul class="main-bxslider">
                    @if(!empty($slider))
                    @foreach ($slider as $row) 
                    @if($row->type == 'video')
                    <li>
                        <iframe width="100%" height="100%" src="" data-video="{{ $row->value }}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </li>
                @else
                    <li><img src="<?php echo e(asset('storage/')); ?>/{{$row->value}}" alt="{{ $row->title }}"></li>
                    @endif
                    @endforeach
                    @endif

                </ul>

                <div id="bx-pagers" class="slider-nav">
                        @if(!empty($slider))
                    @foreach ($slider as $row_menu) 
                    @php
                    $index_id = $row_menu->order - 1;
                    $title = strtoupper($row_menu->title);
                    @endphp
                    <a data-slide-index="{{ $index_id }}"  href="#">{{ $title }}</a>
                    

                    @endforeach
                    @else 
                    <div class="alert alert-info">
                        Data Belum Ada 
                    </div>
                    @endif

        </div>
    </div>
</div>
</div>
</div>

<ul style="list-style: none;">
    <div class="col-md-12">
        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="#" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/1.png" class="menu-icon" style="width: 250px; height: 150px">
                <!--<span>Sejarah Pemilu</span>-->
            <!--</a>-->
        </li>
        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="http://localhost/kpu/public/profile_anggota" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/2.png" class="menu-icon" style="width: 250px; height: 150px">
            <!--<span>Profil Anggota KPU</span>-->
            <!--</a>-->
        </li>

        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="http://localhost/kpu/public/list_agenda" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/3.png" class="menu-icon" style="width: 250px; height: 150px">
            <!--<span>Agenda</span>-->
            <!--</a>-->
        </li>

        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="http://localhost/kpu/public/visi_misi" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/4.jpg" class="menu-icon" style="width: 250px; height: 150px">
            <!--<span>Visi Misi</span>-->
            <!--</a>-->
        </li>

        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="http://jdih.kpu.go.id/" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/5.png" class="menu-icon" style="width: 250px; height: 150px">
            <!--<span>Hukum</span>-->
            <!--</a>-->
        </li>
        <li class="menubar col-md-2">
            <!--<a class="icon-layanan-perizinan " href="http://jdih.kpu.go.id/" target="_blank" rel="noopener noreferrer">-->
            <img src="uploads/logo/6.png" class="menu-icon" style="width: 250px; height: 150px">
            <!--<span>Hukum</span>-->
            <!--</a>-->
        </li>

    </div>

</ul>

<!-- /Main Slider -->
