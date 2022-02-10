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

class GoogleCloudApigeeV1DebugMask extends \Google\Collection
{
  protected $collection_key = 'variables';
  /**
   * @var string[]
   */
  public $faultJSONPaths;
  /**
   * @var string[]
   */
  public $faultXPaths;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $namespaces;
  /**
   * @var string[]
   */
  public $requestJSONPaths;
  /**
   * @var string[]
   */
  public $requestXPaths;
  /**
   * @var string[]
   */
  public $responseJSONPaths;
  /**
   * @var string[]
   */
  public $responseXPaths;
  /**
   * @var string[]
   */
  public $variables;

  /**
   * @param string[]
   */
  public function setFaultJSONPaths($faultJSONPaths)
  {
    $this->faultJSONPaths = $faultJSONPaths;
  }
  /**
   * @return string[]
   */
  public function getFaultJSONPaths()
  {
    return $this->faultJSONPaths;
  }
  /**
   * @param string[]
   */
  public function setFaultXPaths($faultXPaths)
  {
    $this->faultXPaths = $faultXPaths;
  }
  /**
   * @return string[]
   */
  public function getFaultXPaths()
  {
    return $this->faultXPaths;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setNamespaces($namespaces)
  {
    $this->namespaces = $namespaces;
  }
  /**
   * @return string[]
   */
  public function getNamespaces()
  {
    return $this->namespaces;
  }
  /**
   * @param string[]
   */
  public function setRequestJSONPaths($requestJSONPaths)
  {
    $this->requestJSONPaths = $requestJSONPaths;
  }
  /**
   * @return string[]
   */
  public function getRequestJSONPaths()
  {
    return $this->requestJSONPaths;
  }
  /**
   * @param string[]
   */
  public function setRequestXPaths($requestXPaths)
  {
    $this->requestXPaths = $requestXPaths;
  }
  /**
   * @return string[]
   */
  public function getRequestXPaths()
  {
    return $this->requestXPaths;
  }
  /**
   * @param string[]
   */
  public function setResponseJSONPaths($responseJSONPaths)
  {
    $this->responseJSONPaths = $responseJSONPaths;
  }
  /**
   * @return string[]
   */
  public function getResponseJSONPaths()
  {
    return $this->responseJSONPaths;
  }
  /**
   * @param string[]
   */
  public function setResponseXPaths($responseXPaths)
  {
    $this->responseXPaths = $responseXPaths;
  }
  /**
   * @return string[]
   */
  public function getResponseXPaths()
  {
    return $this->responseXPaths;
  }
  /**
   * @param string[]
   */
  public function setVariables($variables)
  {
    $this->variables = $variables;
  }
  /**
   * @return string[]
   */
  public function getVariables()
  {
    return $this->variables;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1DebugMask::class, 'Google_Service_Apigee_GoogleCloudApigeeV1DebugMask');
