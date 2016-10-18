<?php

class RouteConfig
{
    private $routeConfig = [
        'test' => [
            'uri' => '',
            'action' => [
                'view' => 'view.phtml',
            ],
        ],
        'testRest' => [
            'uri' => '',
            'action' => [
                'rest_file' => 'RestTest.php',
                'rest_class' => 'RestTest',
            ],
        ],
        'testRoutes' => [
            'uri' => 'test.php',
            'sub_route' => [
                'test' => [
                    'uri' => 'test1.php',
                    'sub_route' => [
                        'test' => [
                            'uri' => 'test2.php',
                            'sub_route' => [
                                'test' => [
                                    'uri' => 'test3.php',
                                    'sub_route' => [
                                        'test' => [
                                            'uri' => 'test4.php',
                                        ],
                                        'test1' => [
                                            'uri' => 'test41.php',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
    function getRouteConfig(){
        return $this->routeConfig;
    }
}