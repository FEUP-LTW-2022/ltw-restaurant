<?php

 require_once('./templates/elements.tpl.php');

 drawHeader() ?>

<script src='javascript/about-us.js'></script>

<div id="AboutUsPageInfo" class= "AboutUsPage">
	<div class = "AboutUsBox">
		<div class = "AboutUsTitle">
			About Us
		</div>
		<hr class = "AboutUsHR">
		<div id = "AboutUsInfo">
		We are a group of three students from FEUP that decided to create a website where restaurants can provide
		their menu so anyone can order food without leaving home with comfort and security.
		</div>
		<div class = "AboutUsDivButton">
			<div id = "AboutUsMembersButton" class = "AboutUsButton" onclick = "showMembersTeam('AboutUsPageInfo','AboutUsPageMembers')">
				More About Team
			</div>
		</div>
	</div>
</div>

	<div id = "AboutUsPageMembers" class ="AboutUsPage">
		<div class = "AboutUsBox">
			<div class = "AboutUsTitle">
				Our Developer's Team
			</div>
			<hr class = "AboutUsHR">
			<div id = "AboutUsTeamDiv">
				<div class = "AboutUsMemberSpace">
					<div class = "AboutUsMember">
						<div class = "AboutUsMemberName">
							Henrique Pinho
							<div class = "AboutUsMembersInfo">
								<div class = "AboutUsDivIcon">
									<i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
									<p class="userEmail AboutUsEmail"> up201805000@up.pt </p>
								</div>
								<div class = "AboutUsDivIcon">
									<i class="fas fa-briefcase iconUserPage AboutUsIcon"></i>
									<p class="AboutUsEmail"> FEUP </p>
								</div>
							</div>
						</div>
					</div>
					<div class = "AboutUsMemberPhoto">
						<img src = "/images/avatars/Henrique.jpg" alt= "Henrique" class = "AboutUsPhoto" id = "tempProfilePhoto1">
					</div>
				</div>

				<div class = "AboutUsMemberSpace">
					<div class = "AboutUsMemberPhoto">
						<img src = "/images/avatars/Ricardo.png" alt= "Ricardo" class = "AboutUsPhoto" id = "tempProfilePhoto2">
					</div>

					<div class = "AboutUsMember">
						<div class = "AboutUsMemberName">
							Ricardo Cruz
							<div class = "AboutUsMembersInfo">
								<div class = "AboutUsDivIcon">
									<i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
									<p class="userEmail AboutUsEmail"> up202008789@up.pt </p>
								</div>
								<div class = "AboutUsDivIcon">
									<i class="fas fa-briefcase iconUserPage AboutUsIcon"></i>
									<p class="AboutUsEmail"> FEUP </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class = "AboutUsMemberSpace">
					<div class = "AboutUsMember">
						<div class = "AboutUsMemberName">
							Tiago Pires
							<div class = "AboutUsMembersInfo">
								<div class = "AboutUsDivIcon">
									<i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
									<p class="userEmail AboutUsEmail"> up202008790@up.pt </p>
								</div>
								<div class = "AboutUsDivIcon">
									<i class="fas fa-briefcase iconUserPage AboutUsIcon" ></i>
									<p class="AboutUsEmail"> FEUP </p>
								</div>
							</div>
						</div>
					</div>
					<div class = "AboutUsMemberPhoto">
						<img src =  "/images/avatars/Tiago.jpg" alt= "Tiago" class = "AboutUsPhoto" id = "tempProfilePhoto3">
					</div>
				</div>
			</div>

			<div class = "AboutUsDivButton">
				<div id = "AboutUsGoBackButton" class = "AboutUsButton" onclick = "goBack('AboutUsPageInfo','AboutUsPageMembers')">
					Back To About Us Page
				</div>
			</div>
		</div>
	</div>
<?php
 drawFooter();
?>
   