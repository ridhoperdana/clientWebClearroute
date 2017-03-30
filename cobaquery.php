<?php 
  function randomFloat($min = 0, $max = 1) {
      return $min + mt_rand() / mt_getrandmax() * ($max - $min);
  }

  function randomLatitude($latitude)
  {
    $number_asli = $latitude;
    $number = $number_asli*-1;
    $int_number = floor($number);
    $decimal = $number - $int_number;
    if(mt_rand(1,10)>5)
    {
      $decimal_batas_baru = $decimal*1.1;
      echo 'lat lebih: '.$decimal_batas_baru.'</br>';
      $batas_baru = ($int_number+$decimal_batas_baru)*-1;
    }
    else
    {
      $decimal_batas_baru = $decimal*1.1;
      $decimal_batas_baru = $decimal_batas_baru - $decimal;
      echo 'lat kurang: '.$decimal_batas_baru.'</br>';
      $batas_baru = ($int_number+($decimal-$decimal_batas_baru))*-1;
    }

    return $batas_baru;
  }

  function finalLatitude($latitude_awal, $latitude_akhir)
  {
    return randomFloat($latitude_awal, randomLatitude($latitude_akhir));
  }

  function finalLongitude($longitude_awal, $longitude_akhir)
  {
    return randomFloat($longitude_awal, randomLongitude($longitude_akhir));
  }  

  function randomLongitude($longitude)
  {
    $number_asli = $longitude;
    $number = $number_asli;
    $int_number = floor($number);
    $decimal = $number - $int_number;
    if(mt_rand(1,10)>5)
    {
      $decimal_batas_baru = $decimal*1.005;
      echo 'long lebih: '.$decimal_batas_baru.'</br>';
      $batas_baru = ($int_number+$decimal_batas_baru);
    }
    else
    {
      $decimal_batas_baru = $decimal*1.1;
      $decimal_batas_baru = $decimal_batas_baru - $decimal;
      echo 'long kurang: '.$decimal_batas_baru.'</br>';
      $batas_baru = ($int_number+($decimal-$decimal_batas_baru));
    }

    return $batas_baru;
  }
  

  // var_dump(finalLongitude(112.76069140, 112.7977632));
  // echo '</br>';
  // var_dump(finalLatitude(-7.27064930, -7.280136));
?>