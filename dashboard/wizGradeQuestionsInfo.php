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
	This script handle student exam questions information
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

if(!session_id()){
    session_start();
}

     define('wizGrade', 'igweze');  /* define a check for wrong access of file */

         require 'configwizGrade.php';  /* load wizGrade configuration files */
		 
		 if($eID == "") { $eID = preg_replace("/[^0-9-]/", "", $_REQUEST['eID']); }
		 
		 try {
		 
				$examQuestionsArr = examQuestions($conn, $eID);  /* online exam question array */	
				$examQuestionsCount = count($examQuestionsArr);
				
		 }catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
		 }		
		 

		 
?>

				<div id="paginate-page"> </div>
				<script type='text/javascript'> $('#paginate-page').trigger('click');  /*  paginate table using Jquery dataTable */ </script>
				<!-- table -->
				<table  class='table table-hover style-table' id='wizGradeTBPage'>
                              <thead>							  
							  <tr>
                                  <th class="text-left">SN</th>
                                  <th class="text-left">Exam Question </th>
                                  <th class="text-left"> Options </th>
                                  <th class="text-left"> Answer </th>
								  <th class="text-left"> Mark </th>
								  <th class="text-left"> Tasks </th>
                              </tr>
							  </thead>
							  <tbody>
							  

        <?php
						
							if($examQuestionsCount >= $fiVal){  /* check array is empty */		
														
								
								for($i = $fiVal; $i <= $examQuestionsCount; $i++){  /* loop array */	
								
									$qID = $examQuestionsArr[$i]["qID"];
									$eID = $examQuestionsArr[$i]["eID"];
									$question = htmlspecialchars_decode($examQuestionsArr[$i]["question"]);
									$qOptions = htmlspecialchars_decode($examQuestionsArr[$i]["qOptions"]);
									$qAnswer = htmlspecialchars_decode($examQuestionsArr[$i]["qAnswer"]);
									$qMark = $examQuestionsArr[$i]["qMark"];
									
									//$questionS = substr($question, 0, 30);
									//$questionS = $questionS.' . . .';
									$questionS = nl2br($questionS);
									
						
									$serailNo++;
								

$examQuestions =<<<IGWEZE
        							  
									<tr id="row-$qID" >
									<td class='text-left' width="3%">$serailNo</td> 
									<td class='' style="text-align:justify !important;" width="43%"> $question </td> 
									<td class='text-left' width="30%"> $qOptions</td> 		
									 
									<td class='text-left' width="14%"> <span class="badge bg-important">$qAnswer</span></td> 
									
									<td class='text-left' width="5%"> $qMark </td> 
									
									<td  class='text-left' width="5%"> 
									
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right"> 
													<li>
														<a href='javascript:;' id='$qID' class ='viewQuestion'>
														<button class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></button> View</a>
													</li>
													<li class="divider"></li>						
													<li>					
													<a href='javascript:;' id='wizGrade-$qID-$eID' class ='editQuestion'>
													<button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button> Edit</a>
													</li>
													<li class="divider"></li>
													<li>
													<a href='javascript:;' id='wizGrade-$qID-$questionS' class ='removeQuestion'> 
													<button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button> Remove</a>			
													</li> 
											</ul>        
													
									</div><!-- /btn-group -->
									
									
									</td>
									</tr>
		
IGWEZE;
                               
									echo $examQuestions; 

		                        }
								
							} 

?>                   
                        
				</tbody>
				</table>
				<!-- / table --> 