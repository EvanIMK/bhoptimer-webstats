<?php

function formattoseconds($time)
{
    $iTemp = floor($time);

    $iHours = 0;

    if ($iTemp > 3600) {
        $iHours = floor($iTemp / 3600.0);
        $iTemp %= 3600;
    }

    $sHours = $iHours;

    $iMinutes = 0;

    if ($iTemp >= 60) {
        $iMinutes = floor($iTemp / 60.0);
        $iTemp %= 60;
    }

    $sMinutes = '';

    $sMinutes = $iMinutes;

    $fSeconds = (($iTemp) + $time - floor($time));

    $sSeconds = number_format($fSeconds, 3);

    if ($iHours > 0) 
	{
        $newtime = $sHours.':'.$sMinutes.':'.$sSeconds.'h';
    } 
	elseif ($iMinutes > 0) 
	{
		if($sSeconds < 10)		
			$sSeconds = '0'.$sSeconds;
		if($sMinutes < 10)		
			$sMinutes = '0'.$sMinutes;
        $newtime = $sMinutes.':'.$sSeconds.'m';
    } 
	else {
        $newtime = number_format($fSeconds, 3).'s';
    }

    return $newtime;
}

function removeworkshop($mapname)
{
    if (strpos($mapname, 'workshop/') !== false) {
        $pieces = explode('/', $mapname);

        return $pieces[2];
    }

    return $mapname;
}

function trackname($trk)
{
    if ($trk == 0){
        $string = "Main";
    }
    else
    {
        $string = "Bonus ".$trk;
    }
    return $string;
}