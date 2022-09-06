jQuery(function($) {
    var templateUrl = "https://buildingtrades.ca";
    $('#canada-map').JSMaps({
        map: 'canada',
        onStateClick: function(dataMap) {
            
            $.ajax({
                type : "POST",
                //  dataType : "json",
                url : templateUrl+"/wp-admin/admin-ajax.php",
                data : {action: "map_selection",
                    mapid: dataMap['id']},
                success: function(response) {
                    console.log(response)
                    $('.map-description').html("<h4>"+dataMap['name']+"</h4><p>"+response+"</p>");
                }
            });

        }
    });
    
    $('.jsmaps-select').insertAfter('#by-location-label');
    console.log('Running...');
});