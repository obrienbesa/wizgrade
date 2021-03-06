<?php

/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	wizGrade V 1.2 (Formerly SDOSMS) is Designed & Developed by Igweze Ebele Mark | https://www.iem.wizgrade.com
	https://www.wizgrade.com
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	Copyright 2014 - 2020 c wizGrade | IGWEZE EBELE MARK 
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

		http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
	wizGrade School App is Dedicated To Almighty God, My Amazing Parents ENGR Mr & Mrs Igweze Okwudili Godwin, 
	To My Fabulous and Supporting Wife Mrs Igweze Nkiruka Jennifer
	and To My Inestimable Sons Osinachi Michael, Ifechukwu Othniel and Naetochukwu Ryan.  
	
	WEBSITE 					PHONES												EMAILS
	https://www.wizgrade.com	+234 - 80 - 30 716 751, +234 - 80 - 22 000 490 		info@wizgrade.com	
	
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Page/Code Explanation~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	This script handle school club 
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

if(!session_id()){
    session_start();
}

     define('wizGrade', 'igweze');  /* define a check for wrong access of file */

			require 'configINwizGrade.php';  /* load wizGrade configuration files */
		 		 
		 
			try {
		 

  				$clubArray = studentsClubArrays($conn);  /* school clubs array */
								
				$clubCount = count($clubArray);
				if($clubCount == 30){ $moreClub = ''; }
				if($clubCount < 30){ $moreClub = (30 - $clubCount); }
				
				
			}catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
			}
		
		
		
?>		
				<!-- row -->	
				<div class="row"> 						
                    <div class="col-lg-7">
						<section class="panel">
							<header class="panel-heading">                              
							  <i class="fa fa-wrench fa-lg"></i> School Club
								<span class="tools pull-right">
									<a href="javascript:;" class="fa fa-chevron-down"></a>
									<a href="javascript:;" class="fa fa-times"></a>
								</span>
							</header>
							<div class="panel-body wizGrade-line">
							<center><img src="loading.gif" alt="Loading >>>>>" class="configLoading" 
									  style="cursor:pointer; display:none; margin-bottom:5px;" /> </center>
							<div class="msgBoxSettings paginateSim"></div>
                             		
							<script type='text/javascript'> 
							
									$('.wizGradeTable').DataTable( {
								
										dom: 'lBfrtip', 
										"scrollX": true,							 
										buttons: [
											
											{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o fa-lg"></i> Excel', "className": 'btn btn-danger btn-datable' },	
											{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o fa-lg"></i> PDF', "className": 'btn btn-danger btn-datable' },
											{ "extend": 'print', "text":'<i class="fa fa-print fa-lg"></i> Print', "className": 'btn btn-danger btn-datable' },
											{ "extend": 'colvis', "text":'<i class="fa fa-toggle-on fa-lg"></i> Col. Toggle', "className": 'btn btn-danger btn-datable' }							
											 
										]
									} );
									
							</script>  			
							
							<!-- table -->
							<table  class='table table-hover style-table wizGradeTable' width='100%'>
				
							<thead><tr><th class='text-left'>S/N</th> <th class='text-left'>Student's Organization</th>
							<th class='text-left'>Tasks</th></tr></thead> <tbody>

        <?php

							if($clubCount > $fiVal){  /* check array is empty */		
								
								for($i = $fiVal; $i <= $clubCount; $i++){  /* loop array */	
								
									$ClubsTeacher = $clubArray[$i]["name"];
									$ClubsID = $clubArray[$i]["id"];
									$serial_no = $foreal++;	
									$clubUpdate = 'Update-'.$ClubsID;
									$clubEdit = 'Edit-'.$ClubsID;
									$clubRemove = 'Remove-'.$ClubsID;
									$clubEditDiv = 'editDiv-'.$ClubsID;
									$clubRow = 'DivRow-'.$ClubsID;
									$frmLoader= 'frmloader-'.$ClubsID;
									$msgBox = 'msgBoxDiv-'.$ClubsID;
								

$club =<<<IGWEZE
        
									<tr id='$clubRow'><td class='text-left'>$serial_no  </td> <td class='text-left'> 
									<center><img src="loading.gif" alt="Loading >>>>>" id="$frmLoader" 
									style="cursor:pointer; display:none; margin-bottom:5px;" /> </center><!-- loading image-->
									<div id='$msgBox'>	</div>						  
									<div id='$clubEditDiv'><i class="fa fa-users"></i>
									$ClubsTeacher </div> </td>
									
									<td class='text-left'> 
									
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right">
												<li>
												<a href='javascript:;' id='$clubUpdate' class ='clubUpdate' style="display:none;">
												<button class="btn btn-success btn-xs">
												<i class="fa fa-save"></i></button> Update </a>
												</li>
												
												<li>
												<a href='javascript:;' id='$clubEdit' class ='clubEdit'> <button class="btn btn-primary btn-xs">
												<i class="fa fa-edit"></i></button> Edit </a>					
												</li>
												<li class="divider"></li>
												<li>
												<a href='javascript:;' id='$clubRemove' class ='clubRemove demoDisenable'> <button class="btn btn-danger btn-xs">
												<i class="fa fa-times"></i></button> Delete </a>						
												</li>
											</ul>		
														
														
									</div><!-- /btn-group -->
									
									</td> 
									</tr>
		
IGWEZE;
                               
									echo $club;

		                        }
							}



							if($clubCount != $i_false){  /* is count false */		
								
								for($i = $fiVal; $i <= $moreClub; $i++){  /* loop array */ 
						
									$serial_no = $foreal++;	
									$clubSave = 'Save-'.$serial_no;
									$clubEdit = 'Edit-'.$serial_no;
									$clubUpdate = 'Update-'.$serial_no;
									$clubRemove = 'Remove-'.$serial_no;
									$clubEditDiv = 'editDiv-'.$serial_no;
									$clubRow = 'DivRow-'.$serial_no;
									$frmClub= 'frmClub-'.$serial_no;
									$frmLoader= 'frmloader-'.$serial_no;
									$msgBox = 'msgBoxDiv-'.$serial_no;
								

$clubMore =<<<IGWEZE
        
									<tr id='$clubRow'><td class='text-left'>$serial_no  </td> <td class='text-left'> 
									<center><img src="loading.gif" alt="Loading >>>>>" id="$frmLoader" 
									style="cursor:pointer; display:none; margin-bottom:5px;" /> </center>	<!-- loading image-->				  
									<div id='$msgBox'>	</div>						  
									<div id='$clubEditDiv'> <div class="iconic-input">
									<i class="fa fa-users"></i>
									<input type="text" class="form-control" id="$frmClub" 
									name="$frmClub" />
									</div>
									</div> </td>
									<td class='text-left'>  
									
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right">
												<li>
												<a href='javascript:;' id='$clubUpdate' class ='clubUpdate' style="display:none;">
												<button class="btn btn-success btn-xs">
												<i class="fa fa-save"></i></button> Update </a>
												</li>
												
												<li>
												<a href='javascript:;' id='$clubSave' class ='clubSave'>
												<button class="btn btn-success btn-xs">
												<i class="fa fa-save"></i></button> Save </a>
												</li>
												
												<li>
												<a href='javascript:;' id='$clubEdit' class ='clubEdit' style="display:none;"> <button class="btn btn-primary btn-xs">
												<i class="fa fa-edit"></i></button> Edit </a>					
												</li>
												<li class="divider"></li>
												<li>
												<a href='javascript:;' id='$clubRemove' class ='clubRemove' style="display:none;"> <button class="btn btn-danger btn-xs">
												<i class="fa fa-times"></i></button> Delete </a>						
												</li>
											</ul>	 	
														
									</div><!-- /btn-group --> 
									
									</td> 
											
									</tr>
		
IGWEZE;
                               
									echo $clubMore;

		                        }
							}
          ?>
                        
                        </tbody>
						
						</table>
                        <!-- / table -->            
                                    
                                      
                          </div>
                      </section>
                  </div>
              
 				</div>
				<!-- / row -->                                 
              