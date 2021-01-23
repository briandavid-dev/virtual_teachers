<?php 
$theme = $this->theme;
    $mensajeContact = (isset($mensajeContact)) ? $mensajeContact : "";
    $visitenos = (isset($visitenos)) ? $visitenos : "";
    $tipoOrden = (isset($tipoOrden)) ? $tipoOrden : "";
    $informacion = (isset($informacion)) ? $informacion : "";
    $estatusPedido = (isset($estatusPedido)) ? $estatusPedido : "";
 

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

		                        <h4 style="text-align: center;"><?php print $estatusPedido;?></h4>
		                        <br>
                        	<h4 style="text-align: center;"><?php print $tipoOrden;?></h4>
                        	<h5 style="text-align: center;"><?php print $informacion;?></h5>
                        

   

<div>&nbsp;</div>



</td>
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