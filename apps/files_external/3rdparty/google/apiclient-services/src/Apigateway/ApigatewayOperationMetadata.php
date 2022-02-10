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

namespace Google\Service\Apigateway;

class ApigatewayOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'diagnostics';
  /**
   * @var string
   */
  public $apiVersion;
  /**
   * @var string
   */
  public $createTime;
  protected $diagnosticsType = ApigatewayOperationMetadataDiagnostic::class;
  protected $diagnosticsDataType = 'array';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var bool
   */
  public $requestedCancellation;
  /**
   * @var string
   */
  public $statusMessage;
  /**
   * @var string
   */
  public $target;
  /**
   * @var string
   */
  public $verb;

  /**
   * @param string
   */
  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  /**
   * @return string
   */
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param ApigatewayOperationMetadataDiagnostic[]
   */
  public function setDiagnostics($diagnostics)
  {
    $this->diagnostics = $diagnostics;
  }
  /**
   * @return ApigatewayOperationMetadataDiagnostic[]
   */
  public function getDiagnostics()
  {
    return $this->diagnostics;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param bool
   */
  public function setRequestedCancellation($requestedCancellation)
  {
    $this->requestedCancellation = $requestedCancellation;
  }
  /**
   * @return bool
   */
  public function getRequestedCancellation()
  {
    return $this->requestedCancellation;
  }
  /**
   * @param string
   */
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param string
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param string
   */
  public function setVerb($verb)
  {
    $this->verb = $verb;
  }
  /**
   * @return string
   */
  public function getVerb()
  {
    return $this->verb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApigatewayOperationMetadata::class, 'Google_Service_Apigateway_ApigatewayOperationMetadata');
