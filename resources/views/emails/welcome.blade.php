
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> <!-- utf-8 works for most cases -->
  <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
  <title>{!! $title !!}</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

  <!-- Web Font / @font-face : BEGIN -->
  <!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->

  <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
<!--[if mso]>
<style>
* {
font-family: sans-serif !important;
}
</style>
<![endif]-->

<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
<!--[if !mso]><!-->
<style type="text/css">

  /* STYLE RESET */
  body              { margin: 0 auto !important; padding: 0 !important; width: 100% !important; min-width: 100%; font-family: Arial, 'Helvetica', sans-serif;  -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }
  div[style*="margin: 16px 0"]  { margin: 0 !important;}
  img, a img            { border:0; outline:none; text-decoration:none; }

  /* EMAIL CLIENT RESET */
  .ReadMsgBody          { width:100%;} 
  .ExternalClass          { width:100%; } 
  .ExternalClass *        { line-height:100%; } 
  table, td             { mso-table-lspace:0pt; mso-table-rspace:0pt; } 
  img               { -ms-interpolation-mode: bicubic; } 
  body, table, td         { -ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;} 
  a[x-apple-data-detectors]       { color: inherit !important; text-decoration: none !important; 
    font-size: inherit !important; font-family: inherit !important; 
    font-weight: inherit !important; line-height: inherit !important; }
    th                { font-weight: normal; }
    .iosLink a            { color: #525355 !important; text-decoration: none !important; }
    .iosLinkWhite a         { color: #ffffff !important; text-decoration: none !important; }
    .iosLinkBule a            { color: #0084d4 !important; text-decoration: none !important; }
    /* CUSTOM STYLES */
    sup                             { font-size: 0.6em; vertical-align: 0.5em; line-height: 1em; }
    .preheader                      { display:none !important; visibility:hidden; opacity:0; color:transparent;                                           height:0; width:0; }  
    /* PAGE STYLE */
    @media only screen and (max-width: 599px) {
      u ~ div #fw-container       { min-width: 100vw !important; }
      .email-container        { width: 100% !important; height: auto !important; }  
      .stack              { display: block !important; width: 100% !important; 
        text-align: center !important; padding: 0px !important;}
        .fluid, img.fluid         { width: 100% !important; height: auto !important; }
        .fluid2, img.fluid2       { width: 96% !important; height: auto !important; }
        .hide               { display: none !important; }
        .show               { display: block!important; width: 100% !important; 
          height: auto !important; }
          .align-center           { text-align: center !important; }
          .border-x-none          { border-left: none !important; border-right: none !important;}
          .border-bottom          { border-right: none !important; 
            border-bottom: 1px solid #C8C9C7 !important; }
            .m-p-15             { padding: 15px !important; }
            .m-px-20            { padding-left: 20px !important; padding-right: 20px !important; }
            .m-px-0             { padding-left: 0px !important; padding-right: 0px !important; }
            .height-auto          { height: auto !important; }
            .h-40             { height: 40px !important; }
            .h-20             { height: 20px !important; }
            .wd-auto            { width: 100% !important; }
            .wd-20              { width: 20px !important; }
            /* CUSTOM STYLES */
            .bg-img             { width: 100%!important; height: auto !important; background-size: cover !important;}
          }
        </style>
        <!--<![endif]-->

        <!-- Web Font / @font-face : END -->

        <!-- CSS Reset -->
        <style>

          /* What it does: Remove spaces around the email design added by some email clients. */
          /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
          html,
          body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
          }

          /* What it does: Stops email clients resizing small text. */
          * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
          }

          /* What is does: Centers email on Android 4.4 */
          div[style*="margin: 16px 0"] {
            margin:0 !important;
          }

          /* What it does: Stops Outlook from adding extra spacing to tables. */
          table,
          td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
          }

          /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
          table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
          }
          table table table {
            table-layout: auto; 
          }

          /* What it does: Uses a better rendering method when resizing images in IE. */
          img {
            -ms-interpolation-mode:bicubic;
          }
          .backgroundImg {
            background-image: url("https://clients.in-uat.com/demo/artbug/edms/images/bg.png");
            background-repeat: repeat-y;
            background-color: #2C3A87;
            background-position: top center;
            background-size: 100%;     
          }       
          .mobileOnly{display:none;max-height:0px;overflow:hidden; width: 0;}
          .mobile-hide { display: block}  
          .not-for-outlook { mso-hide:all;}
          /* What it does: A work-around for iOS meddling in triggered links. */
          .mobile-link--footer a,
          a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
          }
          a:hover {

          }
        </style>
        <!-- Progressive Enhancements -->
        <style>

          /* What it does: Hover styles for buttons */
          .button-td,
          .button-a {
            transition: all 100ms ease-in;
          }
          .button-td:hover,
          .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
          }

          /* Media Queries */
          @media screen and (max-width: 600px) {
            *[class].email-container {
              clear: both !important;
              min-width: 100vw !important;
              width: 100% !important;
            }
            .email-container {
              min-width: 100vw !important;
              margin: auto !important;
            }

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid,
            .fluid-centered {
              max-width: 100% !important;
              height: auto !important;
              margin-left: auto !important;
              margin-right: auto !important;
            }
            /* And center justify these ones. */
            .fluid-centered {
              margin-left: auto !important;
              margin-right: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
              display: block !important;
              width: 100% !important;
              max-width: 100% !important;
              direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
              text-align: center !important;
            }

            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
              text-align: center !important;
              display: block !important;
              margin-left: auto !important;
              margin-right: auto !important;
              float: none !important;
            }
            table.center-on-narrow {
              display: inline-block !important;
            }
            /* What it does: show hide for desktop and mobile */  
            .mobileOnly { display: block !important;max-height: none !important;width: auto !important;  }  
            .mobile-hide{display: none!important;max-height: 0!important;min-height: 0!important} 

          }

          /* Media query for mobile*/
          @media only screen and (max-width: 480px) {
            .mobile-line-break {
              display: block;
            }
            .full {
              display:block;
              width:100% !important;
              padding: 0 0px 18px !important;
            }
            .full-center {
              width:100% !important;
            }
            .social-center {
              width: 130px!important;
            }
            .mpt-10 {
              padding-top: 10px!important;
            }
            .mpt-20 {
              padding-top: 20px!important;
            }
            .mpb-20 {
              padding-bottom: 20px!important;
            }
            .width-57 {
              width: 57%!important;
            }
            .width-43 {
              width: 43%!important;
            }
            .mobile-image {
              display:inline-block;
              width:50%;
              height: auto;
            }
            .mobile-image-100p {
              display:inline-block;
              width:100%;
              height: auto;
            }
            .force-center {
              text-align: center !important;
              width: 100%;
              float: none;
            }
            .mobile-tabbed-table {
              padding-left: 20px !important;
              padding-right: 20px !important;
            }
            .mobile-blue-box {
              height: auto !important;
              padding: 0 20px !important;
            }

            /* Target: gmail app specific */
            u + .gmail-app .col-3-side {
              display: table-cell !important;
              width: 31.182795698924731% !important;
            }

            u + .gmail-app .col-3-mid {
              display: table-cell !important;
              width: 37.634408602150538% !important;
            }

            u + .gmail-app .col-3-mid .mobile-image-100p-height {
              max-height: 50px !important;
            }

            u + .gmail-app .col-3-mid .table-padding-30pd {
              padding: 0 30px !important;
            }

            u + .gmail-app .col-3-mid .table-padding-21pd {
              padding: 0 21px !important;
            }

            u + .gmail-app .col-2-left {
              display: table-cell !important;
              width: 48.387096774193548% !important;
            }

            u + .gmail-app .col-2-right {
              display: table-cell !important;
              width: 51.612903225806452% !important;
            }  

          }

        </style>
      </head>

      <body text="#525355" link="#0473ea" vlink="#0473ea" alink="#424242" width="100%" bgcolor="#ffffff" style="margin: 0; mso-line-height-rule: exactly; background: #ffffff;">
        <span class="preheader" style="color:#ffffff; display:none !important; height:0; opacity:0; visibility:hidden; width:0">&nbsp;</span>

        <!-- Email Body : BEGIN -->
        <table role="presentation" class="email-container" width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border:#dddddd solid 1px;border-bottom: 0;">
          <tbody>
            <tr>
              <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                  <!-- Start Heading -->
                  <tr>
                    <td style="background-color: #FF3840;padding: 42px 41px 0;" class="mobile-tabbed-table mpt-20">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tbody>
                          <tr>
                            <td style="background-color: #FFFFFF; padding: 20px; text-align: center;" class="mobile-tabbed-table">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td style="text-align: center;"><img src="https://clients.in-uat.com/demo/artbug/edms/images/orca.png" width="156" height="77" /></td>
                                </tr>
                                <tr>
                                  <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 500;font-size: 24px;line-height: 33px;color: #5A6E79;padding: 20px 0 5px 0;" class="mpt-10">Hi Jean,</td>
                                </tr>
                                <tr>
                                  <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 27px;line-height: 39px;color: #454545; padding-top: 5px;">
                                    You have a review!
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <!-- End Heading -->
                  <!-- Start body -->
                  <tr>
                    <td style="background-color: #E5E5E5;padding: 0 41px;" class="mobile-tabbed-table">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tbody>
                          <tr>
                            <td style="background-color: #FFFFFF; text-align: left; padding: 30px 42px 30px;" class="mobile-tabbed-table mpt-20 mbt-20">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tbody>
                                  <tr>
                                    <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 14px;line-height: 20px;color: #5A6E79;">{!! $message !!} 
                                  </tr>
                                  <tr>
                                    <td style="height:50px; line-height:50px;font-size: 0">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 18px;line-height: 24px;color: #454545;">
                                      Ren has wrote
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="height:10px; line-height:10px;font-size: 0">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="padding: 15px 12px; border: 1px solid #D1D1D1;font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 500;font-size: 14px;line-height: 20px;color: #454545;">
                                      &quot; Jean is a great teacher. Her lessons are easy to understand and my children really enjoy attending her classes.&quot;
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="height:30px; line-height:30px;font-size: 0">&nbsp;</td>
                                  </tr>
                                  
                                  <tr>
                                    <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: normal;font-size: 12px;line-height: 15px;color: #454545;">
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="height:30px; line-height:30px;font-size: 0">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: normal;font-size: 10px;line-height: 18px;text-align: center;color: #454545;"><a href="#" target="_blank" style="text-decoration-line: underline;color: #FF3840;">Unsubscribe</a> email notification for reviews</td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <!-- End body -->
                  <!-- Start footer -->
                   <tr>
                    <td style="background-color: #E5E5E5;padding: 25px 41px 20px;" class="mobile-tabbed-table footer-wrap">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                        <tbody>
                          <tr>
                            <td>
                              <table width="70%" border="0" cellspacing="0" cellpadding="0" align="left" class="full">
                                <tbody>
                                  <tr>
                                    <td>
                                      <table width="50%" border="0" cellspacing="0" cellpadding="0" align="left" class="width-57">
                                        <tbody>
                                          <tr>
                                            <td width="26"  valign="top"><img src="https://clients.in-uat.com/demo/artbug/edms/images/map.png" width="15" height="14" /></td>
                                            <td valign="top" style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 10px;line-height: 16px;color: #454545; padding-right: 5px;">We are located at:<br>
                                              12 Hoy Fatt Road #04-01,<br>
                                            Singapore 159506</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <table width="50%" border="0" cellspacing="0" cellpadding="0" align="left" class="width-43">
                                        <tbody>
                                          <tr>
                                            <td width="26" valign="middle"><img src="https://clients.in-uat.com/demo/artbug/edms/images/telephone.png" width="15" height="14" /></td>
                                            <td valign="middle" style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 10px;line-height: 14px;color: #454545;">
                                              <a href="tel:+65 6338 1755"  style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 10px;line-height: 16px;color: #454545;text-decoration: none;padding-right: 5px;">+65 6338 1755</a>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="height:5px; line-height:5px;font-size: 0">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td width="26" valign="middle"><img src="https://clients.in-uat.com/demo/artbug/edms/images/mail.png" width="14" height="14" /></td>
                                            <td valign="middle" style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 10px;line-height: 16px;color: #454545;">
                                              <a href="mailto:enquiries@orcasg.com" style="font-family: Arial, 'Helvetica', sans-serif;font-style: normal;font-weight: 600;font-size: 10px;line-height: 14px;color: #454545; text-decoration: none;padding-right: 5px;">enquiries@orcasg.com</a>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table width="30%" border="0" cellspacing="0" cellpadding="0" valign="top" align="left" class="full-center">
                                <tbody>
                                  <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" valign="top" align="center" class="social-center">
                                      <tbody>
                                        <tr>
                                         <td align="right" style="padding:0; border-spacing:0px; border-collapse:collapse;"><a href="#" target="_blank"><img src="https://clients.in-uat.com/demo/artbug/edms/images/facebook.png" width="15" height="14" /></a></td>
                                         <td align="right" style="padding:0px 0px 0px 10px; border-spacing:0px; border-collapse:collapse;"><a href="#" target="_blank"><img src="https://clients.in-uat.com/demo/artbug/edms/images/youtube.png" width="15" height="14" /></a></td>
                                         <td align="right" style="padding:0px 0px 0px 10px; border-spacing:0px; border-collapse:collapse;"><a href="#" target="_blank"><img src="https://clients.in-uat.com/demo/artbug/edms/images/linkedin.png" width="15" height="14" /></a></td>
                                         <td align="right" style="padding:0px 0px 0px 10px; border-spacing:0px; border-collapse:collapse;"><a href="#" target="_blank"><img src="https://clients.in-uat.com/demo/artbug/edms/images/twitter.png" width="15" height="14" /></a></td>
                                         <td align="right" style="padding:0px 0px 0px 10px; border-spacing:0px; border-collapse:collapse;"><a href="#" target="_blank"><img src="https://clients.in-uat.com/demo/artbug/edms/images/instagram.png" width="15" height="14" /></a></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <!-- End footer -->
                </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- Email Body : End -->
</body>
</html>