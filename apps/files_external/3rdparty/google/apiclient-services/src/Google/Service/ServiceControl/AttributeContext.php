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

class Google_Service_ServiceControl_AttributeContext extends Google_Collection
{
  protected $collection_key = 'extensions';
  protected $apiType = 'Google_Service_ServiceControl_Api';
  protected $apiDataType = '';
  protected $destinationType = 'Google_Service_ServiceControl_Peer';
  protected $destinationDataType = '';
  public $extensions;
  protected $originType = 'Google_Service_ServiceControl_Peer';
  protected $originDataType = '';
  protected $requestType = 'Google_Service_ServiceControl_Request';
  protected $requestDataType = '';
  protected $resourceType = 'Google_Service_ServiceControl_ServicecontrolResource';
  protected $resourceDataType = '';
  protected $responseType = 'Google_Service_ServiceControl_Response';
  protected $responseDataType = '';
  protected $sourceType = 'Google_Service_ServiceControl_Peer';
  protected $sourceDataType = '';

  /**
   * @param Google_Service_ServiceControl_Api
   */
  public function setApi(Google_Service_ServiceControl_Api $api)
  {
    $this->api = $api;
  }
  /**
   * @return Google_Service_ServiceControl_Api
   */
  public function getApi()
  {
    return $this->api;
  }
  /**
   * @param Google_Service_ServiceControl_Peer
   */
  public function setDestination(Google_Service_ServiceControl_Peer $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Google_Service_ServiceControl_Peer
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
   * @param Google_Service_ServiceControl_Peer
   */
  public function setOrigin(Google_Service_ServiceControl_Peer $origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return Google_Service_ServiceControl_Peer
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param Google_Service_ServiceControl_Request
   */
  public function setRequest(Google_Service_ServiceControl_Request $request)
  {
    $this->request = $request;
  }
  /**
   * @return Google_Service_ServiceControl_Request
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param Google_Service_ServiceControl_ServicecontrolResource
   */
  public function setResource(Google_Service_ServiceControl_ServicecontrolResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_ServiceControl_ServicecontrolResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param Google_Service_ServiceControl_Response
   */
  public function setResponse(Google_Service_ServiceControl_Response $response)
  {
    $this->response = $response;
  }
  /**
   * @return Google_Service_ServiceControl_Response
   */
  public function getResponse()
  {
    return $this->response;
  }
  /**
   * @param Google_Service_ServiceControl_Peer
   */
  public function setSource(Google_Service_ServiceControl_Peer $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_ServiceControl_Peer
   */
  public function getSource()
  {
    return $this->source;
  }
}
