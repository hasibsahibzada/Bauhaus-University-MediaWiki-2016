<div id="wrapper">

		<div class="navbar navbar-default navbar-fixed-top <?php echo $wgNavBarClasses; ?>" role="navigation">
				<div class="container">
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<div class="navbar-header">
						<button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>" title="<?php echo $wgSitename ?>"><?php echo isset( $wgLogo2 ) && $wgLogo2 ? "<img src='{$wgLogo2}' alt='Logo'/> " : ''; echo $wgSitenameshort ?: $wgSitename; ?></a>
					</div>

					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li>
							<!--<a href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>">Home</a>-->
							<?php echo $this->nav( $this->get_page_links( 'Navigations:Topmenu' ) ); ?>
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
							<?php echo Linker::linkKnown( SpecialPage::getTitleFor( 'Userlogin' ), wfMsg( 'login' ) ); ?>
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
		</div><!-- topbar -->
		<?php
		if( $subnav_links = $this->get_page_links('Bootstrap:Subnav') ) {
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
							                     	Departments
							                </li>
							             		<?php echo $this->nav( $this->get_page_links( 'Navigations:Sidebar ' ) ); ?>
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
									
									<div>

										<a  href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>" title="<?php echo $wgSitename ?>"><?php echo isset( $wgLogo2 ) && $wgLogo2 ? "<img src='{$wgLogo2}' alt='Logo'/> " : ''; ?></a>
										<br>

										<a href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>"> <?php echo $wgSitenameshort ?: $wgSitename; ?> </a>

									</div>


									I am here



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
				<?php $this->includePage('Bootstrap:Footer'); ?>
				<footer>
					<p>&copy; <?php echo date('Y'); ?> by <a href="<?php echo (isset($wgCopyrightLink) ? $wgCopyrightLink : 'http://borkweb.com'); ?>"><?php echo (isset($wgCopyright) ? $wgCopyright : 'BorkWeb'); ?></a>
						&bull; Powered by <a href="http://mediawiki.org">MediaWiki</a>
					</p>
				</footer>
			</div><!-- container -->
		</div><!-- bottom -->