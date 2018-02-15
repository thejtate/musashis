<?php $title = 'Home'; ?>
<?php include 'tpl/includes/head.inc'; ?>
<body class="page page-home">
<div class="outer-wrapper">
	<?php include 'tpl/layout/header.inc'; ?>
	<div class="inner-wrapper-top">
		<div class="content-wrapper with-sidebar clearfix">
			<div class="content-outer">
				<div class="content-inner">
          <figure class="image">
            <img src="images/tmp/content-samurais-home.png" alt="img">
          </figure>
					<div class="b-text">
						<p><span>Musashi’s</span>—named for legendary samurai swordsman Miyamoto Musashi—is Oklahoma City’s premier Japanese steakhouse. Our teppanyaki chefs will entertain and amaze you as they prepare your dinner right before your eyes. Enjoy entrées featuring prime Kobe beef, lobster and much more, treat yourself to fresh sushi, or sample our unique Japanese style tappas. Whatever you choose, we promise your experience at Musashi’s will be an unforgettable one! </p>
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
		<div class="cols">
			<div class="col col-a">
				<h3>Facebook</h3>
				<div class="col-wrapp">
					<img src="images/tmp/img-facebook.png" alt="img">

				</div>
        <div class="btn-wrapp">
          <a href="#" class="btn">VIEW CALENDAR</a>
        </div>
			</div>
			<div class="col col-b">
				<h3>Events</h3>
				<div class="col-wrapp">
					<div class="col-item">
						<h4>Sushi Class</h4>
						<div class="date">Sunday, June 23, 2013 • 2:00 – 4:00pm</div>
						<div class="item-text">
							Learn to roll your own sushi with chef instructor Jeab Chansaholee! Seating is limited. To reserve your spot or for more info, call 528-8862.
						</div>
					</div>
					<div class="col-item">
						<h4>Mondays For A Change</h4>
						<div class="date">Monday, July 1, 2013</div>
						<div class="item-text">
							Musashi’s and all our sister restaurants will be helping the Red Cross raise funds for disaster relief by donating 10% of our sales. Join us for great food and support a great cause!
						</div>
					</div>

				</div>
        <div class="btn-wrapp">
          <a href="#" class="btn">VIEW CALENDAR</a>
        </div>
			</div>
			<div class="col col-c">
				<h3>Newsletter</h3>
				<div class="form form-newsletter">
					<form action="#" method="post">
						<div class="field field-name">
							<div class="form-item form-type-text">
								<label>Your full name</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-address">
							<div class="form-item form-type-text">
								<label>Email address</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-email">
							<div class="form-item form-type-text">
								<label>Confirm email</label>
								<input type="text" class="form-text">
							</div>
						</div>
            <div class="width-form-180">
              <div class="form-item">
                <label>Birthday</label>
                <input type="text" class="form-text" placeholder="Month" />
              </div>
            </div>
            <div class="width-form-60 not-label">
              <div class="form-item">
                <input type="text" class="form-text" placeholder="Day" />
              </div>
            </div>
            <div class="width-form-82 not-label last-form">
              <div class="form-item">
                <input type="text" class="form-text" placeholder="Year" />
              </div>
            </div>
						<div class="field field-address">
							<div class="form-item form-type-text">
								<label>Address</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-city">
							<div class="form-item form-type-text">
								<label>City</label>
								<input type="text" class="form-text">
							</div>
						</div>
						<div class="field field-state">
							<div class="form-item form-type-select">
								<label>State</label>
								<select name="state" class="form-select">
									<option>ok</option>
									<option>or</option>
									<option>pn</option>
									<option>ri</option>
									<option>sc</option>
								</select>
							</div>
						</div>
						<div class="field field-zip">
							<div class="form-item form-type-text">
								<label>ZIP</label>
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
						<div class="btn-wrapp">
							<div class="submit-wrapper btn">
								<div class="ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div></div>
								<input class="form-submit" type="submit" name="op" value="Submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'tpl/layout/footer.inc'; ?>
</div>
</body>
</html>