<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title></title>
  
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="/css/font.css" type="text/css" />
  <link rel="stylesheet" href="/css/app.css" type="text/css" />
</head>
<body>
	<div class="app">
	<? $file = isset($page->template->template->file); ?>
	@if( isset($page->template) )
		<? if(isset($page->template->settings)){
				$templateSettings = json_decode($page->template->settings);
			}
		?>
		@include('site.templates.'.$page->template->template->file)
	@else
	
		@if(sizeof($page->blocks) != 0)
			@foreach ($page->blocks as $pageblock)
				<? if(isset($pageblock->settings)){
						$settings = json_decode($pageblock->settings);
					}
				?>
				
				@include('site.blocks.'.$pageblock->getBlock->template)
				
			@endforeach
		@else
			<div>
				Geen blokken.
			</div>
		@endif
		
	@endif
	</div>
</body>
</html>