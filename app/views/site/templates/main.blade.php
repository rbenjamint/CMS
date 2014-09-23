	<div  class="app-header navbar bg-black">
      <!-- navbar header -->
      <div class="navbar-header">
        <!-- brand -->
        <a href="/" class="navbar-brand text-lt">
          <span class="hidden-folded">{{ $settings->text }}</span>
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->
	</div>
	<!-- / navbar collapse -->
	
	@if(sizeof($page->blocks) != 0)
		@foreach ($page->blocks as $pageblock)
			<? if(isset($pageblock->settings)){
					$settings = $pageblock->settings;
				}
			?>
			
			@include('site.blocks.'.$pageblock->block->template)
			
		@endforeach
	@else
		<div>
			Geen blokken.
		</div>
	@endif