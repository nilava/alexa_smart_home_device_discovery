<?PHP
include_once('dbconnect.php');

$sql_bedroom = 'SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM bedroom_devices';
$sql_livingroom = 'SELECT endpointId,friendlyName,description,device_category,Auth_Token,Switch_Virtual_Key,brightness_support,brightness_virtual_key,color_support,retrievable FROM livingroom_devices';
   $retval_bedroom = mysqli_query($conn,$sql_bedroom);
   $retval_livingroom = mysqli_query($conn,$sql_livingroom);

     
$payload = array (
    'endpoints' => 
    array ()
    );



while($row = mysqli_fetch_assoc($retval_bedroom)) {

    if($row['brightness_support'] == "0" && $row['color_support'] == "0"){
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

    if($row['brightness_support'] == "1" && $row['color_support'] == "0"){
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

    if($row['brightness_support'] == "1" && $row['color_support'] == "1"){
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

    if($row['brightness_support'] == "0" && $row['color_support'] == "1"){
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


while($row = mysqli_fetch_assoc($retval_livingroom)) {

    if($row['brightness_support'] == "0" && $row['color_support'] == "0"){
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

    if($row['brightness_support'] == "1" && $row['color_support'] == "0"){
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

    if($row['brightness_support'] == "1" && $row['color_support'] == "1"){
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

    if($row['brightness_support'] == "0" && $row['color_support'] == "1"){
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



header('Content-Type: application/json');
echo json_encode($payload);