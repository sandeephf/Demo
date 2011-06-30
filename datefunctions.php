<?php
//script to generate date range
function returnDateInfo($type){
        $fmt = 'Y-m-d';   //format in which you need the date returned
    
        $curr_time = time();
        
        $month = date('n',$curr_time);
        $year = date('Y',$curr_time);
        $day = date('j',$curr_time);            
        $weekday = date('w',$curr_time);        //Numeric representation of the day of the week
        $todaysDate = date($fmt, $curr_time);    //set to today date
        
    
    switch($type){
        
        case    "Today"    :
                                $startDate  = $todaysDate;
                                $endDate    = $todaysDate;
                                break;
        
        case    "Yesterday":        
                                
                                $startDate = date($fmt,  strtotime( '-1 day' , $curr_time));
                                $endDate = $startDate;    
                                break;
      
        case    "This Week":
                                $startDate = date($fmt,mktime(0,0,0,$month, $day-$weekday, $year));
                                $endDate = $todaysDate;
                                break;
    
        case    "This Month":
        
                                $startDate = date($fmt,mktime(0,0,0,$month, 1, $year));
                                $endDate = $todaysDate;
                                break;
    
        case    "This Year":
        
                                $startDate = date($fmt,mktime(0,0,0,1, 1, $year));
                                $endDate = $todaysDate;
                                break;
            
       case     "Last Week":
                                $lastweekStartDays = $weekday+7;
                                $lastweekendDays = $weekday+1;
                                $startDate = date($fmt,mktime(0,0,0,$month, $day-$lastweekStartDays, $year));
                                $endDate = date($fmt,mktime(0,0,0,$month, $day-$lastweekendDays, $year));
                                break;
        case    "Last Month":
                                //check for january condition
                                if ($month == 1)
                                    {
                                        $month = 12;
                                        $year = $year-1;
                                    }
                                else
                                    {
                                        $month = $month -1;
                                    }
                                $startDate = date($fmt,mktime(0,0,0,$month, 1, $year));//1st of last month
                                $lastdayofthemonth = date('t',mktime(0,0,0,$month, 1, $year)); //no of days last month
                                $endDate = date($fmt,mktime(0,0,0,$month, $lastdayofthemonth, $year));
                                
                                break;

       case     "Last Year":
                                $startDate = date($fmt,mktime(0,0,0,1, 1, $year-1));//jan 1 of last year
                                $endDate = date($fmt,mktime(0,0,0,12, 31, $year-1));//dec 31st of last year
                                break;

        case    "Last 7 Days":
        
                               $startDate = date($fmt,  strtotime( '-7 day' , $curr_time));
                               $endDate = $todaysDate; 
                                break;

        case    "Last 30 Days":
        
                                $startDate = date($fmt,  strtotime( '-30 day' , $curr_time));
                                $endDate = $todaysDate;
                                break;
    }

    $dateArray =  array(
        'start'     => $startDate,
        'end'       =>  $endDate
    );

    return $dateArray;
}


//get and display date 

echo "<br>today";
$dateArray =  returnDateInfo("Today");
print_r($dateArray);

echo "<br>Yesterday";
$dateArray =  returnDateInfo("Yesterday");
print_r($dateArray);

echo "<br>This Week";
$dateArray =  returnDateInfo("This Week");
print_r($dateArray);

echo "<br>This Month";
$dateArray =  returnDateInfo("This Month");
print_r($dateArray);

echo "<br>This Year";
$dateArray =  returnDateInfo("This Year");
print_r($dateArray);

echo "<br>Last Week";
$dateArray =  returnDateInfo("Last Week");
print_r($dateArray);

echo "<br>Last Month";
$dateArray =  returnDateInfo("Last Month");
print_r($dateArray);


echo "<br>Last Year";
$dateArray =  returnDateInfo("Last Year");
print_r($dateArray);

echo "<br>Last 7 Days";
$dateArray =  returnDateInfo("Last 7 Days");
print_r($dateArray);


echo "<br>Last 30 Days";
$dateArray =  returnDateInfo("Last 30 Days");
print_r($dateArray);

?>