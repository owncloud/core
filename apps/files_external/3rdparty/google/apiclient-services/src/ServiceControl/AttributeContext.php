<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ServiceControl;

class AttributeContext extends \Google\Collection
{
  protected $collection_key = 'extensions';
  protected $apiType = Api::class;
  protected $apiDataType = '';
  protected $destinationType = Peer::class;
  protected $destinationDataType = '';
  public $extensions;
  protected $originType = Peer::class;
  protected $originDataType = '';
  protected $requestType = Request::class;
  protected $requestDataType = '';
  protected $resourceType = ServicecontrolResource::class;
  protected $resourceDataType = '';
  protected $responseType = Response::class;
  protected $responseDataType = '';
  protected $sourceType = Peer::class;
  protected $sourceDataType = '';

  /**
   * @param Api
   */
  public function setApi(Api $api)
  {
    $this->api = $api;
  }
  /**
   * @return Api
   */
  public function getApi()
  {
    return $this->api;
  }
  /**
   * @param Peer
   */
  public function setDestination(Peer $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Peer
   */
  public function getDestination()
  {
    return $this->destination;
  }
  public function setExtensions($extensions)
  {
    $this->extensions = $extensions;
  }
  public function getExtensions()
  {
    return $this->extensions;
  }
  /**
   * @param Peer
   */
  public function setOrigin(Peer $origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return Peer
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param Request
   */
  public function setRequest(Request $request)
  {
    $this->request = $request;
  }
  /**
   * @return Request
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param ServicecontrolResource
   */
  public function setResource(ServicecontrolResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return ServicecontrolResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param Response
   */
  public function setResponse(Response $response)
  {
    $this->response = $response;
  }
  /**
   * @return Response
   */
  public function getResponse()
  {
    return $this->response;
  }
  /**
   * @param Peer
   */
  public function setSource(Peer $source)
  {
    $this->source = $source;
  }
  /**
   * @return Peer
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttributeContext::class, 'Google_Service_ServiceControl_AttributeContext');
