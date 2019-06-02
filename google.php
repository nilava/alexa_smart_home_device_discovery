<?PHP
include_once('dbconnect.php');

$payload = array (
  "agentUserId" => "1836.15267389",
  'devices' => 
  array ()
  );

$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
  $i=0;
  while($listdbtables[$i] != NULL) {
  $currenttable = $listdbtables[$i];
  $i++;
  $sql = "SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM " .$currenttable; 

  $retval = mysqli_query($conn,$sql);
     
while($row = mysqli_fetch_assoc($retval)) {

    if($row['brightness_support'] == "No" && $row['color_support'] == "No"){
      $traits = array (
        0 => 'action.devices.traits.OnOff',
      );
    
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "No"){
      $traits = array (
        0 => 'action.devices.traits.OnOff',
      );
  
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "Yes"){
      $traits = array (
        0 => 'action.devices.traits.OnOff',
      );
  
}

    if($row['brightness_support'] == "No" && $row['color_support'] == "Yes"){
      $traits = array (
        0 => 'action.devices.traits.OnOff',
      );
  
}

    if($row['device_category'] == 'SWITCH'){
      $type = 'action.devices.types.OUTLET';
    }
    if($row['device_category'] == 'LIGHT'){
      $type = 'action.devices.types.LIGHT';
    }


    array_push($payload["devices"], 
         array (
          'id' => $row['endpointId'],
          'type' => $type,
          'traits' => $traits,
          'name' => 
          array (
            'defaultNames' => 
            array (
              0 => $row['description'],
            ),
            'name' => $row['friendlyName'],
            'nicknames' => 
            array (
              0 => $row['friendlyName'],
            ),
          ),
          'willReportState' => $row['retrievable'],
          'roomHint' => $currenttable,
          'deviceInfo' => 
          array (
            'manufacturer' => 'ownLab',
            'model' => 'ownLabV1',
            'hwVersion' => '1.0',
            'swVersion' => '1.0',
          ),
          'customData' => 
          array (
            'key1' => $row['Auth_Token'],
            'key2' => $row['Switch_Virtual_Key'],
            'key3' => $row['brightness_virtual_key'],
            'key4' => '',
          ),
          ));
}

};


header('Content-Type: application/json');
echo json_encode($payload);