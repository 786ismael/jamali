<!DOCTYPE html>
<html>
  <head>
    <title>Jamali</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Dating, partner" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,500i&display=swap"
      rel="stylesheet"
    />
    <!--css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('public/landing')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/responsive.css" />
    <link rel="shortcut icon" href="{{asset('public/landing')}}/images/favicon.ico" type="image/x-icon">
    <!--font awesome 4-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('public/landing')}}/font-awesome/css/font-awesome.min.css"
    />
  </head>
<body>
	<header class="custom-header">
		<div class="top-bg inner-page">
			<div  class="container">
				<div class="top-nav clearfix">
					<div class="logo">
						<a href="{{route('index')}}"><img src="{{asset('public/landing')}}/images/logo.png" alt="Logo"></a>
					</div>
					<nav>
						<ul>
							<li><a href="{{ route('index')}}?lang={{Request::get('lang')}}">Home</a></li>
							<li>
								<a href="{{route('term.condition')}}?lang={{Request::get('lang')}}">Terms and conditions</a>
							  </li>
							  <li><a href="{{route('support')}}?lang={{Request::get('lang')}}">Support</a></li>
							  <li><a href="{{route('privacy.policy')}}?lang={{Request::get('lang')}}">Privacy and policy</a></li>
						</ul>
						<div class="select-language">
							<select onchange="location = this.options[this.selectedIndex].value;">
                <option value="{{route('index')}}?lang=en">English</option>
                <option value="{{route('index')}}?lang=ar" @if(Request::get('lang') == 'ar') selected @endif>Arabic</option>
							</select>​
						</div>
					</nav>
				</div>
				<div class="mobile-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</header>

	<section class="term_condition">
		<div class="container">
			<div class="body">
                <h1>Terms and conditions</h1>
                <p>These terms and conditions (Agreement) set for the general terms and conditions of your use of the Jamali mobile application (Mobile Application or Service) and any of its related products and services (collectively, Services). This Agreement is legally binding between you (User, you or your) and ALMOTELQ INC (ALMOTELQ INC, we, us or our). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms User, you or your shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Mobile Application and Services. You acknowledge that this Agreement is a contract between you and ALMOTELQ INC, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.</p>
                <h2>Accounts and membership</h2>
                <p>You must be at least 16 years of age to use the Mobile Application and Services. By using the Mobile Application and Services and by agreeing to this Agreement you warrant and represent that you are at least 16 years of age.</p>
                <p>If you create an account in the Mobile Application, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may, but have no obligation to, monitor and review new accounts before you may sign in and start using the Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security. We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions. We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration.</p>
                <h2>User content</h2>
                <p>We do not own any data, information or material (collectively, Content) that you submit in the Mobile Application in the course of using the Service. You shall have sole responsibility for the accuracy, quality, integrity, legality, reliability, appropriateness, and intellectual property ownership or right to use of all submitted Content. We may, but have no obligation to, monitor and review the Content in the Mobile Application submitted or created using our Services by you. You grant us permission to access, copy, distribute, store, transmit, reformat, display and perform the Content of your user account solely as required for the purpose of providing the Services to you. Without limiting any of those representations or warranties, we have the right, though not the obligation, to, in our own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any of our policies or is in any way harmful or objectionable. You also grant us the license to use, reproduce, adapt, modify, publish or distribute the Content created by you or stored in your user account for commercial, marketing or any similar purpose.</p>
                <h2>Billing and payments</h2>
                <p>You shall pay all fees or charges to your account in accordance with the fees, charges, and billing terms in effect at the time a fee or charge is due and payable. Sensitive and private data exchange happens over a SSL secured communication channel and is encrypted and protected with digital signatures, and the Mobile Application and Services are also in compliance with PCI vulnerability standards in order to create as secure of an environment as possible for Users. Scans for malware are performed on a regular basis for additional security and protection. If, in our judgment, your purchase constitutes a high-risk transaction, we will require you to provide us with a copy of your valid government-issued photo identification, and possibly a copy of a recent bank statement for the credit or debit card used for the purchase. We reserve the right to change products and product pricing at any time. We also reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made.</p>
                <h2>Accuracy of information</h2>
                <p>Occasionally there may be information in the Mobile Application that contains typographical errors, inaccuracies or omissions that may relate to promotions and offers. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Mobile Application or Services is inaccurate at any time without prior notice (including after you have submitted your order). We undertake no obligation to update, amend or clarify information in the Mobile Application including, without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Mobile Application should be taken to indicate that all information in the Mobile Application or Services has been modified or updated.</p>
                <h2>Third party services</h2>
                <p>If you decide to enable, access or use third party services, be advised that your access and use of such other services are governed solely by the terms and conditions of such other services, and we do not endorse, are not responsible or liable for, and make no representations as to any aspect of such other services, including, without limitation, their content or the manner in which they handle data (including your data) or any interaction between you and the provider of such other services. You irrevocably waive any claim against ALMOTELQ INC with respect to such other services. ALMOTELQ INC is not liable for any damage or loss caused or alleged to be caused by or in connection with your enablement, access or use of any such other services, or your reliance on the privacy practices, data security processes or other policies of such other services. You may be required to register for or log into such other services on their respective platforms. By enabling any other services, you are expressly permitting ALMOTELQ INC to disclose your data as necessary to facilitate the use or enablement of such other service.</p>
                <h2>Uptime guarantee</h2>
                <p>We offer a Service uptime guarantee of 99% of available time per month. If we fail to maintain this service uptime guarantee in a particular month (as solely determined by us), you may contact us and request a credit off your Service fee for that month. The credit may be used only for the purchase of further products and services from us, and is exclusive of any applicable taxes. The service uptime guarantee does not apply to service interruptions caused by: (1) periodic scheduled maintenance or repairs we may undertake from time to time; (2) interruptions caused by you or your activities; (3) outages that do not affect core Service functionality; (4) causes beyond our control or that are not reasonably foreseeable; and (5) outages related to the reliability of certain programming environments.</p>
                <h2>Backups</h2>
                <p>We perform regular backups of the Content and will do our best to ensure completeness and accuracy of these backups. In the event of the hardware failure or data loss we will restore backups automatically to minimize the impact and downtime.</p>
                <h2>Advertisements</h2>
                <p>During your use of the Mobile Application and Services, you may enter into correspondence with or participate in promotions of advertisers or sponsors showing their goods or services through the Mobile Application and Services. Any such activity, and any terms, conditions, warranties or representations associated with such activity, is solely between you and the applicable third party. We shall have no liability, obligation or responsibility for any such correspondence, purchase or promotion between you and any such third party.</p>
                <h2>Links to other resources</h2>
                <p>Although the Mobile Application and Services may link to other resources (such as websites, mobile applications, etc.), we are not, directly or indirectly, implying any approval, association, sponsorship, endorsement, or affiliation with any linked resource, unless specifically stated herein. Some of the links in the Mobile Application may be affiliate links. This means if you click on the link and purchase an item, ALMOTELQ INC will receive an affiliate commission. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any businesses or individuals or the content of their resources. We do not assume any responsibility or liability for the actions, products, services, and content of any other third parties. You should carefully review the legal statements and other conditions of use of any resource which you access through a link in the Mobile Application and Services. Your linking to any other off-site resources is at your own risk.</p>
                <h2>Prohibited uses</h2>
                <p>In addition to other terms as set forth in the Agreement, you are prohibited from using the Mobile Application and Services or Content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Mobile Application and Services, third party products and services, or the Internet; (h) to spam, phish, pharm, pretext, spider, crawl, or scrape; (i) for any obscene or immoral purpose; or (j) to interfere with or circumvent the security features of the Mobile Application and Services, third party products and services, or the Internet. We reserve the right to terminate your use of the Mobile Application and Services for violating any of the prohibited uses.</p>
                <h2>Intellectual property rights</h2>
                <p>Intellectual Property Rights means all present and future rights conferred by statute, common law or equity in or in relation to any copyright and related rights, trademarks, designs, patents, inventions, goodwill and the right to sue for passing off, rights to inventions, rights to use, and all other intellectual property rights, in each case whether registered or unregistered and including all applications and rights to apply for and be granted, rights to claim priority from, such rights and all similar or equivalent rights or forms of protection and any other results of intellectual activity which subsist or will subsist now or in the future in any part of the world. This Agreement does not transfer to you any intellectual property owned by ALMOTELQ INC or third parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with ALMOTELQ INC. All trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services, are trademarks or registered trademarks of ALMOTELQ INC or its licensors. Other trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services may be the trademarks of other third parties. Your use of the Mobile Application and Services grants you no right or license to reproduce or otherwise use any of ALMOTELQ INC or third party trademarks.</p>
                <h2>Disclaimer of warranty</h2>
                <p>You agree that such Service is provided on an as is and as available basis and that your use of the Mobile Application and Services is solely at your own risk. We expressly disclaim all warranties of any kind, whether express or implied, including but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. We make no warranty that the Services will meet your requirements, or that the Service will be uninterrupted, timely, secure, or error-free; nor do we make any warranty as to the results that may be obtained from the use of the Service or as to the accuracy or reliability of any information obtained through the Service or that defects in the Service will be corrected. You understand and agree that any material and/or data downloaded or otherwise obtained through the use of Service is done at your own discretion and risk and that you will be solely responsible for any damage or loss of data that results from the download of such material and/or data. We make no warranty regarding any goods or services purchased or obtained through the Service or any transactions entered into through the Service unless stated otherwise. No advice or information, whether oral or written, obtained by you from us or through the Service shall create any warranty not expressly made herein.</p>
                <h2>Limitation of liability</h2>
                <p>To the fullest extent permitted by applicable law, in no event will ALMOTELQ INC, its affiliates, directors, officers, employees, agents, suppliers or licensors be liable to any person for any indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business, business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach of statutory duty, negligence or otherwise, even if the liable party has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted by applicable law, the aggregate liability of ALMOTELQ INC and its affiliates, officers, employees, agents, suppliers and licensors relating to the services will be limited to an amount greater of one dollar or any amounts actually paid in cash by you to ALMOTELQ INC for the prior one month period prior to the first event or occurrence giving rise to such liability. The limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.</p>
                <h2>Indemnification</h2>
                <p>You agree to indemnify and hold ALMOTELQ INC and its affiliates, directors, officers, employees, agents, suppliers and licensors harmless from and against any liabilities, losses, damages or costs, including reasonable attorneys' fees, incurred in connection with or arising from any third party allegations, claims, actions, disputes, or demands asserted against any of them as a result of or relating to your Content, your use of the Mobile Application and Services or any willful misconduct on your part.</p>
                <h2>Severability</h2>
                <p>All rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.</p>
                <h2>Dispute resolution</h2>
                <p>The formation, interpretation, and performance of this Agreement and any disputes arising out of it shall be governed by the substantive and procedural laws of Saudi Arabia without regard to its rules on conflicts or choice of law and, to the extent applicable, the laws of Saudi Arabia. The exclusive jurisdiction and venue for actions related to the subject matter hereof shall be the courts located in Saudi Arabia, and you hereby submit to the personal jurisdiction of such courts. You hereby waive any right to a jury trial in any proceeding arising out of or related to this Agreement. The United Nations Convention on Contracts for the International Sale of Goods does not apply to this Agreement.</p>
                <h2>Assignment</h2>
                <p>You may not assign, resell, sub-license or otherwise transfer or delegate any of your rights or obligations hereunder, in whole or in part, without our prior written consent, which consent shall be at our own sole discretion and without obligation; any such assignment or transfer shall be null and void. We are free to assign any of its rights or obligations hereunder, in whole or in part, to any third party as part of the sale of all or substantially all of its assets or stock or as part of a merger.</p>
                <h2>Changes and amendments</h2>
                <p>We reserve the right to modify this Agreement or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Agreement in the Mobile Application. When we do, we will revise the updated date at the bottom of this page. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such changes.</p>
                <h2>Acceptance of these terms</h2>
                <p>You acknowledge that you have read this Agreement and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Agreement. If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Mobile Application and Services.</p>
                <h2>Contacting us</h2>
                <p>If you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it, you may do so via the <a target="_blank" rel="nofollow" href="{{asset('public/landing')}}/https://www.almotelq.com/contact">contact form</a>, send an email to <a href="{{asset('public/landing')}}/mailto:Jamali_support@almotelq.com">Jamali_support@almotelq.com</a> or write a letter to Saudi Arabia, Aljumooh bin Othman 7529</p>
                <p>This document was last updated on December 21, 2020</p>
            </div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="footer-body">
				<h4 class="heading">Follow us on</h4>
				<ul>
					<li>
						<a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
				</ul>
				<!-- <h5>The purpose of lorem ipsumcreate natural text looking block of text </h5>
				<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is.</p> -->
			</div>
		</div>
	</footer>
    <!--script-->
    <script type="text/javascript" src="{{asset('public/landing')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/custom.js"></script>
</body>
</html>