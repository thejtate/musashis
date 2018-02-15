<?php $title = 'Contact'; ?>
<?php include 'tpl/includes/head.inc'; ?>
<body class="page page-contact">
<div class="outer-wrapper">
	<?php include 'tpl/layout/header.inc'; ?>
	<div class="inner-wrapper-top">
		<div class="content-wrapper with-sidebar clearfix">
			<div class="content-outer">
				<div class="content-inner">
					<div class="content-item clearfix">
						<div class="b-map">
							<div class="frame-inner">
								<div class="frame-wrapp">
									<div class="f-top-left"></div>
									<div class="f-top-right"></div>
									<div class="f-center-left"></div>
									<div class="f-center-right"></div>
									<div class="f-bot-left"></div>
									<div class="f-bot-right"></div>
									<div class="f-center-top"></div>
									<div class="f-center-bot"></div>
									<div class="f-border"></div>
								</div>
								<div class="map-wrapper">
									<img src="images/tmp/img-map.jpg" alt="map">
								</div>
							</div>
						</div>
						<div class="title-wrapp">
							<h2>Address</h2>
						</div>
						<div class="b-text">
							<p>4315 N. Western Avenue</p>
							<p>Oklahoma City, Oklahoma 73118</p>
							<p><span>TEL:</span> (405) 602-5623</p>
							<p><span>FAX:</span> (405) 602-5574</p>
							<div class="btn-wrapp">
								<a href="#" class="btn">MAKE RESERVATIONS</a>
							</div>
						</div>
						<div class="title-wrapp">
							<h2>Hours</h2>
						</div>
						<div class="b-text">
							<p><span>TUESDAY–THURDAY:</span> 11 am – 11 pm</p>
							<p><span>FRIDAY:</span> 11 am till Midnight</p>
							<p><span>SATURDAY:</span> 12 pm till Midnight</p>
							<p>Closed Mondays</p>
						</div>
					</div>
				</div>
			</div>
			<aside class="sidebar">
				<div class="sb-header">
					<div class="sidebar-menu">
						<ul class="menu">
							<li><a href="#">Order Online</a></li>
							<li><a href="#">Reservations</a></li>
							<li><a href="#">Rewards Members</a></li>
							<li><a href="#">Gift Cards</a></li>
							<li><a href="#">Progresive Dinner</a></li>
						</ul>
					</div>
					<div class="share-wrapp">
						<ul class="list-share">
							<li class="item-facebook"><a href="#">facebook</a></li>
							<li class="item-twitter"><a href="#">twitter</a></li>
							<li class="item-mail"><a href="#">mail</a></li>
						</ul>
					</div>
				</div>
				<div class="sb-footer"></div>
			</aside>
		</div>
	</div>
	<div class="inner-wrapper-bottom">
		<h3>Email us</h3>
		<div class="form form-email-us">
			<form action="#" method="post">
				<div class="cols">
					<div class="col">
						<div class="field field-name">
							<div class="form-item form-type-text">
								<label>Your Name</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-address">
							<div class="form-item form-type-text">
								<label>Email Address</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-confirm-email">
							<div class="form-item form-type-text">
								<label>Confirm Email</label>
								<input type="text" class="form-text">
							</div>
						</div>
            <div class="capcha-wrapper clear-left">
              <div class="captcha">

                <img src="images/tmp/c.jpg" width="180" height="60" alt="Funnel CAPTCHA" title="Funnel CAPTCHA">

                <div class="reload-captcha-wrapper">
                  <a href="#" class="funnel-reload-captcha">Generate a
                    new captcha</a></div>
                <div class="form-item form-type-textfield form-item-captcha-response">
                  <label for="edit-captcha-response">Enter the characters shown in the image.
                    <span class="form-required">*</span></label>
                  <input type="text" size="15" maxlength="128" class="form-text required">


                </div>
              </div>
            </div>
					</div>
					<div class="col">
						<div class="field field-comments">
							<div class="form-item form-type-textarea">
								<label>Comments</label>
								<textarea rows="10"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-wrapp">
					<div class="submit-wrapper btn">
						<div class="ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div></div>
						<input class="form-submit" type="submit" name="op" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include 'tpl/layout/footer.inc'; ?>
</div>
</body>
</html>