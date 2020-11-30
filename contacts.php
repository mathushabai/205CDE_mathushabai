<html>
<head>
	<title>Tangled Thoughts</title>
	
	<?php include 'head.html'; 
	?>
	
	<?php include 'header.html'; 
	?>
	
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("homeNav").className = "nav-item enabled";
			document.getElementById("aboutNav").className = "nav-item enabled";
			document.getElementById("contactNav").className = "nav-item disabled";
			document.getElementById("doctorNav").className = "nav-item enabled";
			document.getElementById("quizNav").className = "nav-item enabled";
		}
	</script>
	
	<div class="cards bg-dark text-white my-5" id="contact-img">
		<img src="img/ban6.jpg" class="cards-img" alt="banner">
	</div>
	
	<div class="col-lg-6 col-12" id="con-col">
		<div class="contact-wrapper py-3 my-5" id="con-wrapper">
			<h1>Help & Support</h1>
			<p class="subhead">If you ever feel as though you need someone to talk to, seek advise from or simply to distract you from dark thoughts, feel free to reach these 24-hour hotlines</p>
			
			<hr class="featurette-divider">
			
			<div class="row featurette">
			  <div class="col-md-7">
				<h2 class="featurette-heading" id="left-conh">Befrienders</h2>
				<p class="lead" id="left-con">Befrienders is a non-profit organisation providing emotional support 24 hours a day, 7 days a week, to people who are lonely, in distress, in despair, and having suicidal thoughts - without charge.</p>
				<ul class="details" id="left-con">
					<label>Hotline Contacts</label>
					<li>KL: 03-7956 8145 (24 hours)</li>
					<li>Ipoh: 05-547 7933 (4pm to 11pm)</li>
					<li>Penang: 04-281 5161 (3pm to midnight)</li>
					<label>Email</label>
					<li>sam@befrienders.org.my</li>
				</ul>
			  </div>
			  <div class="col-md-5">
				<image src="img/befrienders.jpg" height=400px width=400px>
			  </div>
			</div>

			<hr class="featurette-divider">

			<div class="row featurette">
			
			  <div class="col-md-7 order-md-2">
				<h2 class="featurette-heading" id="right-conh">MALAYSIAN MENTAL HEALTH ASSOCIATION (MMHA)</h2>
				<p class="lead" id="right-con">Malaysian Mental Health Association provides support via their phone line on any mental health issues. MMHA also has qualified mental health professionals ie. clinical psychologist, and counselors providing psychological support services. Financial subsidies are readily available to ensure that necessary therapy and support is given to anyone who needs it.</p>
				<ul class="details" id="right-con">
					<label>Hotline Contact</label>
					<li>03-2780 6803</li>
					<label>Email</label>
					<li>admin@mmha.org.my</li>
					<label>Website</label>
					<li>https://mmha.org.my/</li>
				</ul>
			  </div>
			  <div class="col-md-5 order-md-1">
				<image src="img/mmha.png" height=400px width=400px style="margin-top:30px">
			  </div>
			</div>

			<hr class="featurette-divider">

			<div class="row featurette">
			  <div class="col-md-7">
				<h2 class="featurette-heading" id="left-conh">WOMEN’S AID ORGANIZATION (WAO)</h2>
				<p class="lead" id="left-con">WAO provides free and confidential services to survivors of domestic violence, rape, and other forms of violence. </p>
				<ul class="details" id="left-con">
					<label>Hotline Contacts</label>
					<li>WAO Hotline: +603 7956 3488</li>
					<li>WAO SMS/WhatsApp line, TINA : +6018 988 8058</li>
					<li>General Enquiries: 03 7957 5636 / 0636 </li>
					<label>Email</label>
					<li>info@wao.org.my</li>
					<label>Website</label>
					<li>https://wao.org.my/</li>
				</ul>
			  </div>
			  <div class="col-md-5">
				<image src="img/wao.png" height=400px width=400px>
			  </div>
			</div>

			<hr class="featurette-divider">
		</div>
	</div>
</body>
