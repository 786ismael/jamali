<!DOCTYPE html>
<html>
<head>
    <title>Shive  Email Template</title>
</head>
<body>
    <div id="wrapper" dir="ltr" style="background-color: #ffffff; padding: 70px 0 70px 0; width: 100%; padding-top: 0px; padding-bottom: 0px; -webkit-text-size-adjust: none; margin: 0 auto;">
       <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
          <tbody>
             <tr>
                <td align="center" valign="top">
                   <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color: #ffffff; overflow: hidden; border-style: solid; max-width: 660px; border-top-width: 5px; border-bottom-width: 5px; border-color: #17164b; border-radius: 0px; border-right: 0px solid #ffffff; border-left: 0px solid #ffffff; box-shadow: 0 1px 20px 5px rgba(0,0,0,0.1); width: 100%; min-width: 320px;">
                      <tbody>
                         <tr>
                            <td align="center" valign="top">
                               <div id="template_header_image_container" style="">
                                  <div id="template_header_image" style="max-width: 700px; width: 100%; min-width: 320px;">
                                     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header_image_table">
                                        <tbody>
                                           <tr>
                                              <td align="center" valign="middle" style="text-align: center; padding-top: 5px; padding-bottom:0;border-bottom: 1px solid #ddd;">

                                                 <p style="margin-bottom: 0; margin-top: 0;"><a href="{{url('/')}}"><img src="{{ asset('public/admin_assets/images/nav-logo.png') }}" alt="AlmotelQ-Jamali Service" width="170" style="border: none; display: inline; font-weight: bold; height: auto; outline: none; text-decoration: none; text-transform: capitalize; font-size: 14px; line-height: 25px; width: 100%; max-width: 170px;"></a></p>
                                              </td>
                                           </tr>
                                        </tbody>
                                     </table>
                                  </div>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td align="center" valign="top">
                               <!-- Body -->
                               <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body" style="max-width: 700px; width: 100%; min-width: 320px;">
                                  <tbody>
                                     <tr>
                                        <td valign="top" id="body_content" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 15px;">
                                           <!-- Content -->
                                           <table border="0" cellpadding="20" cellspacing="0" width="100%" border="0">
                                              <tbody>
                                                 <tr>
                                                    <td valign="top" style="padding: 0px 48px 0; padding-left: 20px; padding-right: 20px;">
                                                       <div id="body_content_inner" style="color: #3d3d3d; text-align: left; font-size: 14px; line-height: 25px; font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-weight: 400;">
                                                          <p style="margin: 0;">Hello! Admin,</p>
                                                          <p style="margin: 0; padding: 15px 0">Welcome and thanks to to be a part of AlmotelQ-Jamali Family.</p>
                                                          <div style="clear: both; height: 20px;"></div>
                                                        </div>  
                                                        <div id="body_content_inner" style="color: #3d3d3d; text-align: left; font-size: 14px; line-height: 25px; font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-weight: 400;text-align: center;">
                                                            
                                                            <table border="1">
                                                               <tr><td align="left">Name</td><td align="left">{{$data['user_name']}}</td></tr>
                                                               <tr><td align="left">Email</td><td align="left">{{$data['email']}}</td></tr>
                                                               <tr><td align="left">Phone</td><td align="left">{{$data['phone_number']}}</td></tr>
                                                               <tr><td align="left">Support Type</td><td align="left">{{$data['support_type']}}</td></tr>
                                                               <tr><td align="left">Message</td><td align="left">{{$data['message']}}</td></tr>
                                                            </table>

                                                          <div style="clear: both; height: 20px;"></div>
                                                       </div>

                                                       <div id="body_content_inner" style="color: #3d3d3d; text-align: left; font-size: 14px; line-height: 25px; font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-weight: 400;">
                                                          <p style="margin: 0; padding: 15px 0"></p>
                                                          <div style="clear: both; height: 1px;"></div>
                                                       </div> 

                                                        <div id="body_content_inner" style="color: #3d3d3d; text-align: left; font-size: 14px; line-height: 25px; font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-weight: 400;">
                                                          <p style="margin: 0; padding: 15px 0">
                                                            Regards,<br>
                                                               AlmotelQ-Jamali Support Team
                                                          </p>
                                                          <div style="clear: both; height: 1px;"></div>
                                                        </div> 
                                                    </td>
                                                 </tr>
                                              </tbody>
                                           </table>
                                           <!-- End Content -->
                                        </td>
                                     </tr>
                                  </tbody>
                               </table>
                               <!-- End Body -->
                            </td>
                         </tr>
                      </tbody>
                   </table>
                   <!-- End template container -->
                </td>
             </tr>
          </tbody>
       </table>
    </div>
</body>
</html>