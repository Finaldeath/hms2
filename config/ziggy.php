<?php

return [
    /*
    |----------------------------------------------------------------------------
    | Ziggy route filtering
    |----------------------------------------------------------------------------
    | Either `only` or `except` never both
    */
    // 'only' => ['home', 'api.*'],
    'except' => [
        'debugbar.*',
        'ignition.*',
        'passport.*',
        'horizon.*',
        'telescope*',
        'pretty-routes.*',
        'blv.*', // log-viewer
        'livewire.*',
        'client.*',
    ],
];
