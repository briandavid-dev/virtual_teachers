<?php 
	
	$codigo   = (isset($codigo)) ? $codigo : "";
	$codigoRecuperacion   = (isset($codigoRecuperacion)) ? $codigoRecuperacion : "";
	 $visitenos = (isset($visitenos)) ? $visitenos : "";
	
	

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
								
		                        <h4 style="text-align: center;"><strong><?php print $codigoRecuperacion." ".$codigo?></strong></h4>
		                    </td>
		                </tr>
		                <tr>

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