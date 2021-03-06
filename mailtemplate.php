<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>.body-wrap,body{background-color:#f6f6f6}.content,.content-wrap{padding:20px}.aligncenter,.btn-primary{text-align:center}*{margin:0;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px}img{max-width:100%}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%;line-height:1.6em}table td{vertical-align:top}.body-wrap{width:100%}.container{display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important}.clear,.footer{clear:both}.content{max-width:600px;margin:0 auto;display:block}.main{background-color:#fff;border:1px solid #e9e9e9;border-radius:3px}.content-block{padding:0 0 20px}.header{width:100%;margin-bottom:20px}.footer{width:100%;color:#999;padding:20px}.footer a,.footer p,.footer td{color:#999;font-size:12px}h1,h2,h3{font-family:"Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;color:#000;margin:40px 0 0;line-height:1.2em;font-weight:400}h1{font-size:32px;font-weight:500}h2{font-size:24px}h3{font-size:18px}h4{font-size:14px;font-weight:600}ol,p,ul{margin-bottom:10px;font-weight:400}ol li,p li,ul li{margin-left:5px;list-style-position:inside}a{color:#348eda;text-decoration:underline}.btn-primary{text-decoration:none;color:#FFF;background-color:#348eda;border:solid #348eda;border-width:10px 20px;line-height:2em;font-weight:700;cursor:pointer;display:inline-block;border-radius:5px;text-transform:capitalize}.last{margin-bottom:0}.first{margin-top:0}.alignright{text-align:right}.alignleft{text-align:left}@media only screen and (max-width:640px){.container,.content,body{padding:0!important}.container,.invoice{width:100%!important}h1,h2,h3,h4{font-weight:800!important;margin:20px 0 5px!important}h1{font-size:22px!important}h2{font-size:18px!important}h3{font-size:16px!important}.content-wrap{padding:10px!important}}</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction">
                    <tr>
                        <td class="content-wrap">
                            <meta itemprop="name" content="Reset Password"/>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        You got a mail from {{name}} <{{email}}><br/>
                                        {{subject}} with Phone: {{tel}}<br /><br />
                                        Message: {{message}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <br /><br />
                                        We may need to send you critical information, So please don't share this email with others.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        &mdash; MarketCircle Support
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">Follow <a href="http://twitter.com/codeworks">@Codeworks</a> on Twitter.</td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>
<?php include "hubspot.php" ?>
</body>
</html>
