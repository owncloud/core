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

class Google_Service_Apigee_GoogleCloudApigeeV1DebugMask extends Google_Collection
{
  protected $collection_key = 'variables';
  public $faultJSONPaths;
  public $faultXPaths;
  public $name;
  public $namespaces;
  public $requestJSONPaths;
  public $requestXPaths;
  public $responseJSONPaths;
  public $responseXPaths;
  public $variables;

  public function setFaultJSONPaths($faultJSONPaths)
  {
    $this->faultJSONPaths = $faultJSONPaths;
  }
  public function getFaultJSONPaths()
  {
    return $this->faultJSONPaths;
  }
  public function setFaultXPaths($faultXPaths)
  {
    $this->faultXPaths = $faultXPaths;
  }
  public function getFaultXPaths()
  {
    return $this->faultXPaths;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNamespaces($namespaces)
  {
    $this->namespaces = $namespaces;
  }
  public function getNamespaces()
  {
    return $this->namespaces;
  }
  public function setRequestJSONPaths($requestJSONPaths)
  {
    $this->requestJSONPaths = $requestJSONPaths;
  }
  public function getRequestJSONPaths()
  {
    return $this->requestJSONPaths;
  }
  public function setRequestXPaths($requestXPaths)
  {
    $this->requestXPaths = $requestXPaths;
  }
  public function getRequestXPaths()
  {
    return $this->requestXPaths;
  }
  public function setResponseJSONPaths($responseJSONPaths)
  {
    $this->responseJSONPaths = $responseJSONPaths;
  }
  public function getResponseJSONPaths()
  {
    return $this->responseJSONPaths;
  }
  public function setResponseXPaths($responseXPaths)
  {
    $this->responseXPaths = $responseXPaths;
  }
  public function getResponseXPaths()
  {
    return $this->responseXPaths;
  }
  public function setVariables($variables)
  {
    $this->variables = $variables;
  }
  public function getVariables()
  {
    return $this->variables;
  }
}
