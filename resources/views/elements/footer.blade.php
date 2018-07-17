<footer class="">
  <div class="container">
    <div class="row">
      <div class="col xl3 l3 m3 s12 footer_logo_wrapper">
        <a href="{{ PAGE == 'home' ? '#start' : RS.LANG }}" class="footer_logo">
          <img src="{{ IMG.'logo_grey.svg' }}" alt="Logo" class="responsive-img" />
        </a>
      </div>
      <div class="col xl9 l9 m9 s12 footer_nav_wrapper">
        <ul class="footer_nav">
          <li class=""><a href="{{ PAGE == 'home' ? '#about' : RS.LANG.'#about' }}">{{ $t->find(1)->text }}</a></li>
          <li class=""><a href="{{ PAGE == 'home' ? '#services' : RS.LANG.'#services' }}">{{ $t->find(2)->text }}</a></li>
          <li class=""><a href="{{ PAGE == 'home' ? '#projects' : RS.LANG.'#projects' }}">{{ $t->find(3)->text }}</a></li>
          @foreach($top_nav as $nav_item)
            @if($nav_item->alias != 'home')
              <?php 
              $path = RS.LANG.$nav_item->alias.'/';
              $active = $nav_item->alias == FA ? 'active' : '';
              ?>
              <li class="{{ $active }} not_anchor"><a href="{{ $path }}">{{$nav_item->name}}</a></li>
            @endif            
          @endforeach
          <li class="copyright">{{ $config->copyright }} | <a href="https://kaminskiy-design.com.ua/" rel="me" target="_blank" title="Developed by KAM STUDIO, Kiev" class="dev_l" style="cursor: default;">KAM</a></li>
{{--           <li class="dev"></li> --}}
        </ul>
      </div>
    </div>
  </div>
</footer>