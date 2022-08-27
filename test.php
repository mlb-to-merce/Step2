<?php

use RestClient\Request;

require __DIR__ . '/vendor/autoload.php';

try {
    $request = new Request('https://catfact.ninja/fact');
    $response = $request->setMethod(Request::METHODS['GET'])
        ->send()->getBody();
    echo "\nCats facts:\n";
    if (is_string($response)) {
        echo $response . "\n\n";
    } else {
        echo $response->fact . "\n\n";
    }

    $response = $request->setUrl('https://api.ipify.org/?format=json')
        ->send()->getBody();
    echo "Your IP:\n";
    if (is_string($response)) {
        echo $response . "\n\n";
    } else {
        echo $response->ip . "\n\n";
    }

} catch (Exception $e) {
    echo '!!! ' . $e->getMessage() . " !!!\n";
}