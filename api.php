<?php
   /** Get all leads with a limit of 500 results */
   $limit = 5;                                                                         
   $offset = 0;                                                                          
                                                                                          
   $method = 'getLeads';                                                                 
   $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
   $requestID = session_id();       
   $accountID = '432F520A4A72C527D49567E6DEEE00F8';
   $secretKey = '6E74AD5C4FCE79C4F82ED6ECAAD6D8C3';                                                     
   $data = array(                                                                                
       'method' => $method,                                                                      
       'params' => $params,                                                                      
       'id' => $requestID,                                                                       
   );                                                                                            
                                                                                                 
   $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
   $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                 
   $data = json_encode($data);                                                                   
   $ch = curl_init($url);                                                                        
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
       'Content-Type: application/json',                                                         
       'Content-Length: ' . strlen($data),
       'Expect: '                                                        
   ));                                                                                           
                                                                                                 
   $result = curl_exec($ch);                                                                     
   curl_close($ch);                                                                              
                                                                                                 
   echo $result;                                                                                 
  
?>
