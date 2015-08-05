<?php

namespace OC\AppFramework\Routing;

use OC\AppFramework\DependencyInjection\DIContainer;
use OC\AppFramework\routing\RouteConfig;


class RoutingTest extends \Test\TestCase
{

	public function testSimpleRoute()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'GET')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'GET',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open'
		]);
	}

	public function testSimpleApiRoute()
	{
		$routes = array('api_routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'GET')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'GET',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open',
			'prefix' => 'api.'
		]);
	}

	public function testSimpleRouteWithMissingVerb()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'GET',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open'
		]);
	}

	public function testSimpleRouteWithLowercaseVerb()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'delete')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'DELETE',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open'
		]);
	}

	public function testSimpleRouteWithRequirements()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'delete', 'requirements' => array('something'))
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'DELETE',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open',
			'requirements' => ['something']
		]);
	}

	public function testSimpleRouteWithDefaults()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'delete', array(), 'defaults' => array('param' => 'foobar'))
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'DELETE',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open',
			'defaults' => ['param' => 'foobar']
		]);
	}

	public function testSimpleRouteWithPostfix()
	{
		$routes = array('routes' => array(
			array('name' => 'folders#open', 'url' => '/folders/{folderId}/open', 'verb' => 'delete', 'postfix' => '_something')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'folders.open',
			'verb' => 'DELETE',
			'url' => '/folders/{folderId}/open',
			'controller' => 'FoldersController',
			'method' => 'open',
			'postfix' => '_something'
		]);
	}


	public function testSimpleRouteWithUnderScoreNames()
	{
		$routes = array('routes' => array(
			array('name' => 'admin_folders#open_current', 'url' => '/folders/{folderId}/open', 'verb' => 'delete')
		));

		$this->assertSimpleRoute([
			'routes' => $routes,
			'name' => 'admin_folders.open_current',
			'verb' => 'DELETE',
			'url' => '/folders/{folderId}/open',
			'controller' => 'AdminFoldersController',
			'method' => 'openCurrent'
		]);
	}

	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testSimpleRouteWithBrokenName()
	{
		$routes = array('routes' => array(
			array('name' => 'folders_open', 'url' => '/folders/{folderId}/open', 'verb' => 'delete')
		));

		// router mock
		$router = $this->getMock("\OC\Route\Router", array('create'));

		// load route configuration
		$container = new DIContainer('app1');
		$config = new RouteConfig($container, $router, $routes);

		$config->register();
	}

	public function testResource()
	{
		$routes = array('resources' => array('account' => array('url' => '/accounts')));

		$this->assertResource($routes, 'account', '/accounts', 'AccountController', 'id');
	}

	public function testApiResource()
	{
		$routes = array('api_resources' => array('account' => array('url' => '/accounts')));

		$this->assertResource($routes, 'account', '/accounts', 'AccountController', 'id', 'api.');
	}

	public function testResourceWithUnderScoreName()
	{
		$routes = array('resources' => array('admin_accounts' => array('url' => '/admin/accounts')));

		$this->assertResource($routes, 'admin_accounts', '/admin/accounts', 'AdminAccountsController', 'id');
	}

	/**
	 * @param array paramters
	 */
	private function assertSimpleRoute($parameters)
	{
		$p = array_merge([
			'routes' => '',
			'name' => '',
			'verb' => '',
			'url' => '',
			'controller' => '',
			'method' => '',
			'requirements'  => [],
			'defaults'  => [],
			'postfix'  => '',
			'prefix'  => '',
		], $parameters);

		// route mocks
		$route = $this->mockRoute($p['verb'], $p['controller'], $p['method'], $p['requirements'], $p['defaults']);

		// router mock
		$router = $this->getMock("\OC\Route\Router", ['create']);

		// we expect create to be called once:
		$router
			->expects($this->once())
			->method('create')
			->with($this->equalTo($p['prefix'] . 'app1.' . $p['name'] . $p['postfix']), $this->equalTo($p['url']))
			->will($this->returnValue($route));

		// load route configuration
		$container = new DIContainer('app1');
		$config = new RouteConfig($container, $router, $p['routes']);

		$config->register();
	}

	/**
	 * @param string $resourceName
	 * @param string $url
	 * @param string $controllerName
	 * @param string $paramName
	 */
	private function assertResource($routes, $resourceName, $url, $controllerName, $paramName, $prefix='')
	{
		// router mock
		$router = $this->getMock("\OC\Route\Router", array('create'));

		// route mocks
		$indexRoute = $this->mockRoute('GET', $controllerName, 'index');
		$showRoute = $this->mockRoute('GET', $controllerName, 'show');
		$createRoute = $this->mockRoute('POST', $controllerName, 'create');
		$updateRoute = $this->mockRoute('PUT', $controllerName, 'update');
		$destroyRoute = $this->mockRoute('DELETE', $controllerName, 'destroy');

		$urlWithParam = $url . '/{' . $paramName . '}';

		// we expect create to be called once:
		$router
			->expects($this->at(0))
			->method('create')
			->with($this->equalTo($prefix . 'app1.' . $resourceName . '.index'), $this->equalTo($url))
			->will($this->returnValue($indexRoute));

		$router
			->expects($this->at(1))
			->method('create')
			->with($this->equalTo($prefix . 'app1.' . $resourceName . '.show'), $this->equalTo($urlWithParam))
			->will($this->returnValue($showRoute));

		$router
			->expects($this->at(2))
			->method('create')
			->with($this->equalTo($prefix . 'app1.' . $resourceName . '.create'), $this->equalTo($url))
			->will($this->returnValue($createRoute));

		$router
			->expects($this->at(3))
			->method('create')
			->with($this->equalTo($prefix . 'app1.' . $resourceName . '.update'), $this->equalTo($urlWithParam))
			->will($this->returnValue($updateRoute));

		$router
			->expects($this->at(4))
			->method('create')
			->with($this->equalTo($prefix . 'app1.' . $resourceName . '.destroy'), $this->equalTo($urlWithParam))
			->will($this->returnValue($destroyRoute));

		// load route configuration
		$container = new DIContainer('app1');
		$config = new RouteConfig($container, $router, $routes);

		$config->register();
	}

	/**
	 * @param string $verb
	 * @param string $controllerName
	 * @param string $actionName
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	private function mockRoute($verb, $controllerName, $actionName, array $requirements=array(), array $defaults=array())
	{
		$container = new DIContainer('app1');
		$route = $this->getMock("\OC\Route\Route", array('method', 'action', 'requirements', 'defaults'), array(), '', false);
		$route
			->expects($this->exactly(1))
			->method('method')
			->with($this->equalTo($verb))
			->will($this->returnValue($route));

		$route
			->expects($this->exactly(1))
			->method('action')
			->with($this->equalTo(new RouteActionHandler($container, $controllerName, $actionName)))
			->will($this->returnValue($route));

		if(count($requirements) > 0) {
			$route
				->expects($this->exactly(1))
				->method('requirements')
				->with($this->equalTo($requirements))
				->will($this->returnValue($route));
		}

		if (count($defaults) > 0) {
			$route
				->expects($this->exactly(1))
				->method('defaults')
				->with($this->equalTo($defaults))
				->will($this->returnValue($route));
		}

		return $route;
	}

}

/*
#
# sample routes.yaml for ownCloud
#
# the section simple describes one route

routes:
        - name: folders#open
          url: /folders/{folderId}/open
          verb: GET
          # controller: name.split()[0]
          # action: name.split()[1]

# for a resource following actions will be generated:
# - index
# - create
# - show
# - update
# - destroy
# - new
resources:
    accounts:
        url: /accounts

    folders:
        url: /accounts/{accountId}/folders
        # actions can be used to define additional actions on the resource
        actions:
            - name: validate
              verb: GET
              on-collection: false

 * */
