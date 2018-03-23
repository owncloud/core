<?php

namespace OC\Files;

use Grpc\ChannelCredentials;
use OCP\Files\IFileStorage;
use OCP\Files\StorageNotAvailableException;

class GRPCStorage implements IFileStorage {

	protected $client;
	protected $authArray;

	/**
	 * GRPCStorage constructor.
	 *
	 * @param $host
	 * @param $port
	 * @param $user
	 * @param $pass
	 * @throws \Exception
	 */
	public function __construct($host, $port, $user, $pass) {
		$location = "$host:$port";
		$client= new \Api\AuthClient($location, [
			'credentials' => ChannelCredentials::createInsecure(),
		]);

		$req = new \Api\CreateTokenReq();
		$req->setClientId($user);
		$req->setClientSecret($pass);

		/** @var $response \Api\TokenResponse */
		list($response, $status) = $client->CreateToken($req)->wait();

		if($status != null) {
			throw new StorageNotAvailableException("Failed to connect with code: {$status->code} and message: {$status->details}");
		}


		$token = $response->getToken()->getToken();

		$this->authArray = ['authorization' => [ 'bearer '.$token]];

		$this->client = new \Api\StorageClient($location, [
			'credentials' => ChannelCredentials::createInsecure(),
		]);
	}

	/**
	 * Gets a stream resource for a file at a path
	 * @param $path
	 * @return resource
	 */
	public function getStream($path) {
		$getFileReq = new \Api\PathReq();
		$getFileReq->setPath($path);

		$response = $this->client->ReadFile($getFileReq, $this->authArray);

		$data = '';

		foreach($response->responses() as $chunk) {
			$data .= $chunk;
		}
		// Return a stream with this file in it
		return fopen('data://text/plain,' . $data,'r');
	}


}