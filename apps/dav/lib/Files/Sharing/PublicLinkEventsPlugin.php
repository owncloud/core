<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\DAV\Files\Sharing;

use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class PublicLinkEventsPlugin extends ServerPlugin {
	/** @var EventDispatcherInterface */
	private $dispatcher;
	/** @var Server */
	private $server;

	public function __construct(EventDispatcherInterface $dispatcher) {
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Initialize the plugin
	 * @param Server $server the Sabre server where this plugin will be hooked into
	 */
	public function initialize(Server $server) {
		$this->server = $server;

		$server->on('beforeMethod:*', [$this, 'beforeMethod']);
		$server->on('afterMethod:*', [$this, 'afterMethod']);
	}

	/**
	 * This callback will be called before any method. Note this is a callback
	 * set during the plugin initialization, so don't call it directly.
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 */
	public function beforeMethod(RequestInterface $request, ResponseInterface $response) {
		$path = $request->getPath();
		$method = $request->getMethod();
		$lowercaseMethod = \strtolower($method);
		$token = $request->getRawServerValue('PHP_AUTH_USER');

		if ($method === 'MOVE') {
			$destination = $this->server->calculateUri($request->getHeader('Destination'));
			$event = new GenericEvent(null, [
				'path' => $path,
				'destination' => $destination,
				'method' => $method,
				'token' => $token,
				'timing' => 'before',
			]);
		} else {
			$event = new GenericEvent(null, [
				'path' => $path,
				'method' => $method,
				'token' => $token,
				'timing' => 'before',
			]);
		}

		/*
		 * expected events names (for reference):
		 * dav.public.get.before
		 * dav.public.put.before
		 * dav.public.move.before
		 * dav.public.delete.before
		 */
		$eventName = "dav.public.{$lowercaseMethod}.before";
		$this->dispatcher->dispatch($eventName, $event);
	}

	/**
	 * This callback will be called after any method. Note this is a callback
	 * set during the plugin initialization, so don't call it directly.
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 */
	public function afterMethod(RequestInterface $request, ResponseInterface $response) {
		$path = $request->getPath();
		$method = $request->getMethod();
		$lowercaseMethod = \strtolower($method);
		$token = $request->getRawServerValue('PHP_AUTH_USER');

		if ($method === 'MOVE') {
			$destination = $this->server->calculateUri($request->getHeader('Destination'));
			$event = new GenericEvent(null, [
				'path' => $path,
				'destination' => $destination,
				'method' => $method,
				'token' => $token,
				'timing' => 'after',
			]);
		} else {
			$event = new GenericEvent(null, [
				'path' => $path,
				'method' => $method,
				'token' => $token,
				'timing' => 'after',
			]);
		}

		/*
		 * expected events names (for reference):
		 * dav.public.get.after
		 * dav.public.put.after
		 * dav.public.move.after
		 * dav.public.delete.after
		 */
		$eventName = "dav.public.{$lowercaseMethod}.after";
		$this->dispatcher->dispatch($eventName, $event);
	}
}
