<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Dashboard");
dashboard_helper::nav();
?>
<main>
	<div>
		<div id="chart-dashboard">
			<div class="row">
				<div class="col col-sm-12 col-md-6">
					<div id="liveclock" class="outer_face">
						<div class="marker oneseven"></div>
						<div class="marker twoeight"></div>
						<div class="marker fourten"></div>
						<div class="marker fiveeleven"></div>

						<div class="inner_face">
							<div class="hand hour"></div>
							<div class="hand minute"></div>
							<div class="hand second"></div>
						</div>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<div id="clockdate">
						<div class="clockdate-wrapper">
							<div id="clock"></div>
							<div id="date"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
dashboard_helper::footer('reloj.js');
?>