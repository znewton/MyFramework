<?php

class Config
{
	private $routeConfig = [
		'test' => [
			'uri' => '',
			'action' => [
				'view' => 'view.phtml',
			],
		],
		'about' => [
			'uri' => '',
			'action' => [
				'view' => 'about.phtml',
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
			'test' => [
				'label' => 'Test',
				'href' => '/test'
			]
		],
		'drawer_links' => [],
		'footer_contact' => [],
		'footer_social' => [],
	];

	function getViewConfig(){
		return $this->viewConfig;
	}
}