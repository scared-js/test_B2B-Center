<?php
public function refraction_url(string $string)
{
    $explode = explode("?", $string);
    $url = $explode[0];
    $get_attributes = explode("&", $explode[1]);
    $array = [];
    foreach ($get_attributes as $item) {
        $item = explode("=", $item);
        array_push($array, $item);
    }

    $get_attributes = array_filter($array, function ($item) {
        return $item[1] !== '3';
    }, ARRAY_FILTER_USE_BOTH);

    uasort($get_attributes, function ($item, $item_next) {
        return $item[1] > $item_next[1];
    });

    $get_attributes = array_values($get_attributes);
    $url = explode("/", $url);
    $valid_url = $url[0] . '//' . $url [2] . '?';
    foreach ($get_attributes as $key => $item) {
        if ($key != 0) {
            $valid_url .= '&';
        }
        $valid_url .= $item[0];
        $valid_url .= '=';
        $valid_url .= $item[1];
    }

    $url = array_values(array_slice($url, 3));
    $valid_url .= '&url=';
    foreach ($url as $key => $item){
        if ($key != 0) {
            $valid_url .= '/';
        }
        $valid_url .= $item;
    }
    return $valid_url;
}
?>