<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedMethods' => [ 'POST', 'PUT',  'DELETE'],
    'exposedHeaders' => ['DAV', 'content-length', 'Allow'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
