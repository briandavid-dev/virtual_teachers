<?php 
$theme = $this->theme;
    $mensajeContact = (isset($mensajeContact)) ? $mensajeContact : "";
    $visitenos = (isset($visitenos)) ? $visitenos : "";
    $name = (isset($name)) ? $name : "";
    $email = (isset($email)) ? $email : "";
    $website = (isset($website)) ? $website : "";
    $message = (isset($message)) ? $message : "";

?>
		
		<table class="body-wrap">
		    <tr>
		        <td class="container">
		            <!-- Message start -->
		            <table align="center">
		                <tr>
		                    <td align="center" class="masthead">
		                        <img src='https://nextouchonline.com/nuevaweb/themes/nexttouch/img/logo/logoingles.png' alt='NEXTOUCH' title='NEXTOUCH' height="80" />
		                    </td>
		                </tr>
		                <tr>
		                    <td class="content">
								
		                        <h4 style="text-align: center;"><?php print $mensajeContact;?></h4>
		                    </td>
		                </tr>
		                <tr>
                        <td class="content">
                            <strong>Name:</strong>: <?php print $name; ?><br>
                            <strong>E-Mail</strong>: <?php print $email; ?><br>
                            <strong>Web</strong>: <?php print $website; ?><br>
                            <strong>Message</strong>: <?php print $message; ?>

   

<div>&nbsp;</div>



</td>
					                </tr>
					                <tr>
					           </tr>
		           			 </table>
		        </td>
		    </tr>
		    <tr>
		        <td class="container">
				<div>&nbsp;</div>
		            <!-- Message start -->
		            <table align="center" style="background: #313131 !important; color: #ffffff;">
		                <tr>
		                    <td class="content footer" align="center" style="background: #313131 !important;">
		                    	<p>NEXTOUCH</p>
                            	<p><a href="https://nextouchonline.com/"><?php print $visitenos;?></a></p>
		                    </td>

		                </tr>
		            </table>
		
		        </td>
		    </tr>
		</table>