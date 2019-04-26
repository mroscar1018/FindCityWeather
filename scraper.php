<?php 
	
	$city = $_GET["city"];

	$city = str_replace("台","臺",$city);

//	$city ="新竹市";
	
	$apiKey ="CWB-2F5A1FBF-BE06-4FD0-A2B8-741492C5F412";

	$contents = file_get_contents("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?locationName=".$city."&Authorization=".$apiKey."&offset=0&format=JSON");
	

	$contents = json_decode($contents, true);

	

	$cityname = $contents["records"]["locations"][0]["location"][0]["locationName"];
	
	$description = $contents["records"]["locations"][0]["location"][0]["weatherElement"][1]["time"][8]["elementValue"][0]["value"];
	$temperature = $contents["records"]["locations"][0]["location"][0]["weatherElement"][3]["time"][8]["elementValue"][0]["value"];

//    print_r($cityname);

	$result = "城市: ".$cityname.",天氣狀況: ".$description.",溫度: ".$temperature."C";

	if ($cityname != ""){
		
		echo $result;
	}

?>
