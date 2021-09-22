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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Result extends \Google\Collection
{
  protected $collection_key = 'headers';
  protected $internal_gapi_mappings = [
        "actionResult" => "ActionResult",
  ];
  public $actionResult;
  protected $accessListType = GoogleCloudApigeeV1Access::class;
  protected $accessListDataType = 'array';
  public $content;
  protected $headersType = GoogleCloudApigeeV1Property::class;
  protected $headersDataType = 'array';
  protected $propertiesType = GoogleCloudApigeeV1Properties::class;
  protected $propertiesDataType = '';
  public $reasonPhrase;
  public $statusCode;
  public $timestamp;
  public $uRI;
  public $verb;

  public function setActionResult($actionResult)
  {
    $this->actionResult = $actionResult;
  }
  public function getActionResult()
  {
    return $this->actionResult;
  }
  /**
   * @param GoogleCloudApigeeV1Access[]
   */
  public function setAccessList($accessList)
  {
    $this->accessList = $accessList;
  }
  /**
   * @return GoogleCloudApigeeV1Access[]
   */
  public function getAccessList()
  {
    return $this->accessList;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param GoogleCloudApigeeV1Property[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return GoogleCloudApigeeV1Property[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param GoogleCloudApigeeV1Properties
   */
  public function setProperties(GoogleCloudApigeeV1Properties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudApigeeV1Properties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  public function setReasonPhrase($reasonPhrase)
  {
    $this->reasonPhrase = $reasonPhrase;
  }
  public function getReasonPhrase()
  {
    return $this->reasonPhrase;
  }
  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }
  public function getStatusCode()
  {
    return $this->statusCode;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setURI($uRI)
  {
    $this->uRI = $uRI;
  }
  public function getURI()
  {
    return $this->uRI;
  }
  public function setVerb($verb)
  {
    $this->verb = $verb;
  }
  public function getVerb()
  {
    return $this->verb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Result::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Result');
