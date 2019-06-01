<?PHP
$id = intval($_GET['pass']);
$PASS = getenv("PHP_PASS");
if($id == $PASS){
include_once('dbconnect.php');
}
else{
  exit();
}
$payload = array (
  'endpoints' => 
  array ()
  );

$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
  $i=0;
  while($listdbtables[$i] != NULL){
  $currenttable = $listdbtables[$i];
  $i++;
  $sql = "SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM " .$currenttable; 
//$sql_bedroom = 'SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM bedroom_devices';
//$sql_livingroom = 'SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM livingroom_devices';
   //$retval_bedroom = mysqli_query($conn,$sql_bedroom);
   //$retval_livingroom = mysqli_query($conn,$sql_livingroom);
   $retval = mysqli_query($conn,$sql);
     
while($row = mysqli_fetch_assoc($retval)) {

    if($row['brightness_support'] == "No" && $row['color_support'] == "No"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
    );
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "No"){
      $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.BrightnessController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'brightness',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "Yes"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.BrightnessController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'brightness',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        3 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'color',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        4 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorTemperatureController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'colorTemperatureInKelvin',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    if($row['brightness_support'] == "No" && $row['color_support'] == "Yes"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'color',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        3 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorTemperatureController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'colorTemperatureInKelvin',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    array_push($payload["endpoints"], 
         array (
             'endpointId' => $row['endpointId'],
             'manufacturerName' => 'Chowdhury\'s Home',
             'friendlyName' => $row['friendlyName'],
             'description' => $row['description'],
             'displayCategories' => 
             array (
               0 => $row['device_category'],
             ),
             'cookie' => 
             array (
               'key1' => $row['Auth_Token'],
               'key2' => $row['Switch_Virtual_Key'],
               'key3' => $row['brightness_virtual_key'],
               'key4' => '',
             ),
             'capabilities' => $capabilities,
             
           ));
}

};

/*
while($row = mysqli_fetch_assoc($retval_livingroom)) {

    if($row['brightness_support'] == "No" && $row['color_support'] == "No"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
    );
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "No"){
      $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.BrightnessController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'brightness',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    if($row['brightness_support'] == "Yes" && $row['color_support'] == "Yes"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.BrightnessController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'brightness',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        3 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'color',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        4 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorTemperatureController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'colorTemperatureInKelvin',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    if($row['brightness_support'] == "No" && $row['color_support'] == "Yes"){
        $capabilities = array (
        0 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa',
          'version' => '3',
        ),
        1 => 
        array (
          'interface' => 'Alexa.PowerController',
          'version' => '3',
          'type' => 'AlexaInterface',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'powerState',
              ),
            ),
            'retrievable' => $row['retrievable'],
          ),
        ),
        2 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'color',
              ),
            ),
            'retrievable' => false,
          ),
        ),
        3 => 
        array (
          'type' => 'AlexaInterface',
          'interface' => 'Alexa.ColorTemperatureController',
          'version' => '3',
          'properties' => 
          array (
            'supported' => 
            array (
              0 => 
              array (
                'name' => 'colorTemperatureInKelvin',
              ),
            ),
            'retrievable' => false,
          ),
        ),
    );
}

    array_push($payload["endpoints"], 
         array (
             'endpointId' => $row['endpointId'],
             'manufacturerName' => 'Chowdhury\'s Home',
             'friendlyName' => $row['friendlyName'],
             'description' => $row['description'],
             'displayCategories' => 
             array (
               0 => $row['device_category'],
             ),
             'cookie' => 
             array (
               'key1' => $row['Auth_Token'],
               'key2' => $row['Switch_Virtual_Key'],
               'key3' => $row['brightness_virtual_key'],
               'key4' => '',
             ),
             'capabilities' => $capabilities,
             
           ));
}

*/

header('Content-Type: application/json');
echo json_encode($payload);