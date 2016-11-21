<?php

class Config
{
	private $routeConfig = [
		'test' => [
			'action' => [
				'view' => 'test.html',
			],
		],
		'about' => [
			'action' => [
				'view' => 'about.phtml',
			],
		],
		'components' => [
			'action' => [
				'view' => 'components.phtml',
			],
		],
		'documentation' => [
			'action' => [
				'view' => 'documentation.phtml',
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

	private $viewConfig = [
		'nav_links' => [
			'about' => [
				'label' => 'About',
				'href' => '/about'
			],
			'components' => [
				'label' => 'Components',
				'href' => '/components'
			],
			'documentation' => [
				'label' => 'Documentation',
				'href' => '/documentation'
			],
			'test' => [
				'label' => 'Test',
				'href' => '/test'
			]
		],
		'drawer_links' => [],
		'footer_info' => [],
		'footer_social' => [
		    'github' => [
		        'label' => 'znewton',
                'href' => 'https://github.com/znewton'
            ],
		    'facebook' => [
		        'label' => 'Zach Newton',
                'href' => 'https://www.facebook.com/zach.newton.16'
            ],
		    'twitter' => [
		        'label' => 'Figgynewts6',
                'href' => 'https://twitter.com/Figgynewts6'
            ],
		    'instagram' => [
		        'label' => 'figgynewts6',
                'href' => 'https://www.instagram.com/figgynewts6'
            ],
        ],
	];

	function getViewConfig(){
		return $this->viewConfig;
	}
}