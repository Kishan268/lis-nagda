@include('frontend-layouts.main')

<div class="rev-slider">
	<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
						
				<article id="post-1639" class="post-1639 page type-page status-publish hentry" align="center">
					<header class="entry-header">
					 <h1 class="entry-title">Committees</h1>	</header><!-- .entry-header -->
				      @foreach($committeesDatas as $committeesData)
						<div class="entry-content">
					    	<h2 style="text-align: ;"><strong>{{$committeesData->commitees_title}}</strong></h2>
							<style>
							table, th, td {
							  border: 1px solid black;
							}
							</style>
							<P>
								{!!$committeesData->commitees_des!!}
								
							</P>
							<h3><img class="wp-image-1729 " src="{{asset('storage/'.$committeesData->commitees_image)}}" alt="" width="725" height="29" srcset="{{asset('storage/'.$committeesData->commitees_image)}} 300w, {{asset('storage/'.$committeesData->commitees_image)}}, {{asset('storage/'.$committeesData->commitees_image)}} 1024w, {{asset('storage/'.$committeesData->commitees_image)}} 360w" sizes="(max-width: 725px) 100vw, 725px" /></h3>
							<h2>&nbsp;</h2>
					
					</div><!-- .entry-content -->
				@endforeach

			</article><!-- #post-## -->					
		</main><!-- #main -->
	</div><!-- #primary -->

<div id="sidebar-primary" class="widget-area" role="complementary">
</div><!-- #sidebar-primary -->


</div><!-- .inner-wrapper -->
</div><!-- .container -->
</div><!-- #content -->


@include('frontend-layouts.footer')
