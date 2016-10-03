<?php
/*
Bauhaus University Medien Wiki skin
Adapted By Hasibullah Sahibzada 

Contact: hasibullah@sahibzada.org
*/

?>


<div id="wrapper">

		<div class="navbar navbar-default navbar-fixed-top <?php echo $wgNavBarClasses; ?>" role="navigation">
				<div class="container">
					<div class="row">
					<div class="col-md-3">
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<div class="navbar-header">
						<button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="http://www.uni-weimar.de" title="Bauhaus-Universität Weimar"><img src="<?php echo  $myLogoPath . $myUniWortmarke; ?> " alt="Bauhaus-Universität Weimar"/> </a><br />
						<a href="<?php echo $myFakLink; ?>"><img src="<?php echo $myLogoPath . $myFakWortmarke; ?>" /></a>
					</div>
					</div>
					<div class="col-md-9">
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li>
							<!--<a href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>">Home</a>-->
							<?php echo $this->nav( $this->get_page_links( $Top_Menu ) ); ?>
							</li>
						</ul>
					
						
<?php
					if ( $wgUser->isLoggedIn() ) {
						if ( count( $this->data['personal_urls'] ) > 0 ) {
							$user_icon = '<span class="user-icon"><img src="https://secure.gravatar.com/avatar/'.md5(strtolower( $wgUser->getEmail())).'.jpg?s=20&r=g"/></span>';
							$name = strtolower( $wgUser->getName() );
							$user_nav = $this->get_array_links( $this->data['personal_urls'], $user_icon . $name, 'user' );
							?>
							<ul<?php $this->html('userlangattributes') ?> class="nav navbar-nav navbar-right">
								<?php echo $user_nav; ?>
							</ul>
							<?php
						}//end if

						if ( count( $this->data['content_actions']) > 0 ) {
							$content_nav = $this->get_array_links( $this->data['content_actions'], 'Page', 'page' );
							?>
							<ul class="nav navbar-nav navbar-right content-actions"><?php echo $content_nav; ?></ul>
							<?php
						}//end if
					} else {  // else if is logged in
						?>
						<ul class="nav navbar-nav navbar-right">
							<li>
							<?php echo Linker::linkKnown( SpecialPage::getTitleFor( 'Userlogin' ), wfMessage( 'login' ) ); ?>
							</li>
						</ul>
						<?php
					}
					?>

					<form class="navbar-search navbar-form navbar-right" action="<?php $this->text( 'wgScript' ) ?>" id="searchform" role="search">
						<div>
							<input class="form-control" type="search" name="search" placeholder="Search" title="Search <?php echo $wgSitename; ?> [ctrl-option-f]" accesskey="f" id="searchInput" autocomplete="off">
							<input type="hidden" name="title" value="Special:Search">
						</div>
					</form>
					
					</div>
					</div>
					</div>
					</div>
				</div>
		</div><!-- topbar -->
		<?php
		if( $subnav_links = $this->get_page_links($Top_Subvav_menu) ) {
			?>
			<div class="subnav subnav-fixed">
				<div class="container">
					<?php

					$subnav_select = $this->nav_select( $subnav_links );

					if ( trim( $subnav_select ) ) {

						?>
						<select id="subnav-select">
						<?php echo $subnav_select; ?>
						</select>
						<?php
					}//end if
					?>
					<ul class="nav nav-pills">
					<?php echo $this->nav( $subnav_links ); ?>
					</ul>
				</div>
			</div>
			<?php
		}//end if
		?>
		<div id="wiki-outer-body">
			<div id="wiki-body" class="container">
							<div class="row">
								<div class="col-md-3">
									<div id="sidebar-wrapper">
							            <ul class="sidebar-nav">
							                <li class="sidebar-brand">
							                     	<?php echo $Sidebar_title ?>
							                </li>
							             		<?php echo $this->nav( $this->get_page_links( $Sidebar_menu ) ); ?>
							            </ul>
									</div>
								</div>
								<div class="col-md-9">
									<?php
										if ( 'sidebar' == $wgTOCLocation ) {
											?>
											<div class="row">
												<section class="col-md-3 toc-sidebar"></section>
												<section class="col-md-9 wiki-body-section">
											<?php
										}//end if
									?>
									<?php if( $this->data['sitenotice'] ) { ?><div id="siteNotice" class="alert-message warning"><?php $this->html('sitenotice') ?></div><?php } ?>
									<?php if ( $this->data['undelete'] ): ?>
									<!-- undelete -->
									<div id="contentSub2"><?php $this->html( 'undelete' ) ?></div>
									<!-- /undelete -->
									<?php endif; ?>
									<?php if($this->data['newtalk'] ): ?>
									<!-- newtalk -->
									<div class="usermessage"><?php $this->html( 'newtalk' )  ?></div>
									<!-- /newtalk -->
									<?php endif; ?>
									
									<div class ="logo2">

										<a  href="<?php echo $myTitleLink; ?>" title="<?php echo $wgSitename ?>"><img src="<?php  echo  $myLogoPath .$myTitleLogo ?>" alt="<?php echo $myTitle; ?>" />  </a>
										<br>
										<a href="<?php echo $myHomeURL ?>"><?php echo $mySubtitle;?></a><!-- logo3 --> 
									</div>

									<div class="pagetitle page-header">
										<h1><?php $this->html( 'title' ) ?> <small><?php $this->html('subtitle') ?></small></h1>
									</div>

									<div class="body">
									<?php $this->html( 'bodytext' ) ?>
									</div>

									<?php if ( $this->data['catlinks'] ): ?>
									<div class="category-links">
									<!-- catlinks -->
									<?php $this->html( 'catlinks' ); ?>
									<!-- /catlinks -->
									</div>
									<?php endif; ?>
									<?php if ( $this->data['dataAfterContent'] ): ?>
									<div class="data-after-content">
									<!-- dataAfterContent -->
									<?php $this->html( 'dataAfterContent' ); ?>
									<!-- /dataAfterContent -->
									</div>
									<?php endif; ?>
									<?php
										if ( 'sidebar' == $wgTOCLocation ) {
											?>
											</section></section>
											<?php
										}//end if
									?>
								</div>
						</div><!-- row -->
				</div>
		</div><!-- container -->
		<div class="bottom">
			<div class="container">
				<!--<?php $this->includePage('MediaWiki:Footer'); ?> -->
				<footer>
					<p>&copy; <?php echo date('Y'); ?> Faculty of Media, Bauhaus-Universit&auml;t Weimar - except where stated otherwise / <a href="http://www.uni-weimar.de/cms/index.php?id=5" title="Kontaktseite">Contact</a> / <a href="http://www.uni-weimar.de/cms/index.php?id=49" title="zum Impressum">Imprint</a> / <a href ="/wiki/index.php/MediaWiki:Privacypage"> Privacy </a> <br/>If you suspect a copyright violation please contact the <a  href="mailto:mindaugas.gapsevicius@uni-weimar.de"> Wiki-Administrator</a> <br> 
						Wiki System Powered by <a href="http://mediawiki.org">MediaWiki</a>
						and Wiki Skin Powered by <a href="<?php echo (isset($wgCopyrightLink) ? $wgCopyrightLink : 'http://borkweb.com'); ?>"><?php echo (isset($wgCopyright) ? $wgCopyright : 'BorkWeb'); ?></a>
					</p>
				</footer>
			</div><!-- container -->
		</div><!-- bottom -->

		<?php
		$this->html('bottomscripts'); /* JS call to runBodyOnloadHook */
		$this->html('reporttime');

		if ( $this->data['debug'] ) {
			?>
			<!-- Debug output:
			<?php $this->text( 'debug' ); ?>
			-->
			<?php
		}//end if
		?>


		</body>
		</html>