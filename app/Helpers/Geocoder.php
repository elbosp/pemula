<?php

namespace App\Helpers;

class Geocoder
{
  public static function addressToLongLat($alamat_lengkap)
  {
    $alamat_lengkap = str_replace (" ", "+", urlencode($alamat_lengkap));
    $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $alamat_lengkap . "&key=AIzaSyAlbzplcAq6-pWhIWkDbbtE4x3w7dHuUHA";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = json_decode(curl_exec($ch), true);

    // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
    if ($response['status'] != 'OK') {
      return null;
    }

    print_r($response);
    $geometry = $response['results'][0]['geometry'];

    $longitude = $geometry['location']['lat'];
    $latitude = $geometry['location']['lng'];

    $array = array(
      'latitude' => $geometry['location']['lng'],
      'longitude' => $geometry['location']['lat'],
      'location_type' => $geometry['location_type'],
    );

    return $array;
  }
}
?>
