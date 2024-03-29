<?php
function emailTemplate($path)
{

    $template = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head>
<title>
</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta name='viewport' content='width=device-width'>
<style type='text/css'>body, html {
  margin: 0px;
  padding: 0px;
  -webkit-font-smoothing: antialiased;
  text-size-adjust: none;
  width: 100% !important;
}
  table td, table {
  }
  #outlook a {
    padding: 0px;
  }
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
    line-height: 100%;
  }
  .ExternalClass {
    width: 100%;
  }
  @media only screen and (max-width: 480px) {
     table tr td table.edsocialfollowcontainer {width: auto !important;} table, table tr td, table td {
      width: 100% !important;
    }
    img {
      width: inherit;
    }
    .layer_2 {
      max-width: 100% !important;
    }
    .edsocialfollowcontainer table {
      max-width: 25% !important;
    }
    .edsocialfollowcontainer table td {
      padding: 10px !important;
    }
  }
</style>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css'>
</head><body style='padding:0; margin: 0;background: #efefef'>
<table style='height: 100%; width: 100%; background-color: #efefef;' align='center'>
  <tbody>
    <tr>
      <td valign='top' id='dbody' data-version='2.31' style='width: 100%; height: 100%; padding-top: 30px; padding-bottom: 30px; background-color: #efefef;'>
        <!--[if (gte mso 9)|(IE)]><table align='center' style='max-width:600px' width='600' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
        <table class='layer_1' align='center' border='0' cellpadding='0' cellspacing='0' style='max-width: 600px; box-sizing: border-box; width: 100%; margin: 0px auto;'>
          <tbody>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 300px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'>
                          <p style='text-align: left; font-size: 9px; margin: 0px; padding: 0px;'>This text will show up next to the subject line in some email clients.
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 300px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'>
                          <p style='text-align: right; font-size: 9px; margin: 0px; padding: 0px;'> Unable to view? Read it 
                            <a href='{view}' style='font-size: 9px; color: #828282; font-family: Helvetica, Arial, sans-serif; text-decoration: none;'>Online</a></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' cellpadding='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edimg' style='padding: 20px; box-sizing: border-box; text-align: center;'>
                          <img src='https://api.elasticemail.com/userfile/12301ee9-d04b-4adb-84db-0e43666eaa22/shapes_logo.png' alt='Image' width='177' style='border-width: 0px; border-style: none; max-width: 177px; width: 100%;'>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' cellpadding='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='emptycell' style='padding: 10px;'>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'><p style='margin: 0px; padding: 0px;'>
                          </p><p class='style1' style='margin: 0px; padding: 0px; color: #616262; font-size: 28px; font-family: Helvetica, Arial, sans-serif;'>Account password recovery:&nbsp;<font color='#05a49a'>Acc_Name</font></p>
                          <p style='margin: 0px; padding: 0px;'>Consectetur adipiscing elit. Mauris at pulvinar urna, ac porta dolor. Morbi fringilla lorem nec ante lacinia molestie. Donec volutpat pharetra orci ut tincidunt</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td><td valign='top'><![endif]-->
                
                <!--[if (gte mso 9)|(IE)]></td><td valign='top'><![endif]-->
                
                <!--[if (gte mso 9)|(IE)]></td><td valign='top'><![endif]-->
                
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr><tr><td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'><!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]--><div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'>
                          <p class='style1 text-center' style='text-align: center; margin: 0px; padding: 0px; color: #616262; font-size: 28px; font-family: Helvetica, Arial, sans-serif;'><span style='color: #8f202a; font-size: 30px;'><a href='<?=$path?>'>Click Here</a></span></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' cellpadding='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edimg' style='padding: 0px; box-sizing: border-box; text-align: center;'>
                          <img src='https://api.elasticemail.com/userfile/12301ee9-d04b-4adb-84db-0e43666eaa22/shapes_header1.png' alt='Image' width='600' style='border-width: 0px; border-style: none; max-width: 600px; width: 100%;'>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' cellpadding='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edimg' style='padding: 0px; box-sizing: border-box; text-align: center;'>
                          <img src='https://api.elasticemail.com/userfile/12301ee9-d04b-4adb-84db-0e43666eaa22/shapes_header2.png' alt='Image' width='600' style='border-width: 0px; border-style: none; max-width: 600px; width: 100%;'>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'>
                          <p class='style1 text-center' style='text-align: center; margin: 0px; padding: 0px; color: #616262; font-size: 28px; font-family: Helvetica, Arial, sans-serif;'>Lorem ipsum dolor 
                            <span style='color: #8f202a;'>sit amet</span>
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            
            
            
            
            
            
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edsocialfollow' style='padding: 20px;'>
                          <table align='center' style='margin:0 auto' class='edsocialfollowcontainer' cellpadding='0' border='0' cellspacing='0'>
                            <tbody>
                              <tr>
                                <td>
                                  <!--[if mso]><table align='center' border='0' cellspacing='0' cellpadding='0'><tr><td align='center' valign='top'><![endif]-->
                                  <table align='left' border='0' cellpadding='0' cellspacing='0' data-service='facebook'>
                                    <tbody>
                                      <tr>
                                        <td align='center' valign='middle' style='padding: 10px;'>
                                          <a href='https://www.facebook.com' target='_blank' style='color: #828282; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;'><img src='https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/sq_out_co_32_facebook.png' style='display:block;max-width:32px;width:32px;border:none' alt='Facebook'></a></td>
                                      </tr>f
                                    </tbody>
                                  </table><!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <table align='left' border='0' cellpadding='0' cellspacing='0' data-service='twitter'>
                                    <tbody>
                                      <tr>
                                        <td align='center' valign='middle' style='padding: 10px;'>
                                          <a href='https://www.twitter.com/' target='_blank' style='color: #828282; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;'><img src='https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/sq_out_co_32_twitter.png' style='display:block;max-width:32px;width:32px;border:none' alt='Twitter'></a></td>
                                      </tr>
                                    </tbody>
                                  </table><!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <!--[if mso]></td><td align='center' valign='top'><![endif]-->
                                  <table align='left' border='0' cellpadding='0' cellspacing='0' data-service='googleplus'>
                                    <tbody>
                                      <tr>
                                        <td align='center' valign='middle' style='padding: 10px; width: 32px;'>
                                          <a href='https://plus.google.com' target='_blank' style='color: #828282; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;'><img src='https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/sq_out_co_32_googleplus.png' style='display:block;max-width:32px;width:32px;border:none' alt='Google+'></a></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
            <tr>
              <td class='drow' valign='top' align='center' style='background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;'>
                <!--[if (gte mso 9)|(IE)]><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'><tr><td valign='top'><![endif]-->
                <div class='layer_2' style='max-width: 600px; display: inline-block; vertical-align: top; width: 100%;'>
                  <table border='0' cellspacing='0' class='edcontent' style='border-collapse: collapse;width:100%'>
                    <tbody>
                      <tr>
                        <td valign='top' class='edtext' style='padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;'>
                          <p style='text-align: center; font-size: 10px; margin: 0px; padding: 0px;'>If you no longer wish to receive mail from us, you can 
                            <a href='{unsubscribe}' style='background-color: initial; font-size: 10px; color: #828282; font-family: Helvetica, Arial, sans-serif; text-decoration: none;'>Unsubscribe</a> 
                            <br>{accountaddress}
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>";

    return $template;
}

?>