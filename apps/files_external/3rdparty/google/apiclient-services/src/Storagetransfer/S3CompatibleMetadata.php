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

namespace Google\Service\Storagetransfer;

class S3CompatibleMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $authMethod;
  /**
   * @var string
   */
  public $listApi;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $requestModel;

  /**
   * @param string
   */
  public function setAuthMethod($authMethod)
  {
    $this->authMethod = $authMethod;
  }
  /**
   * @return string
   */
  public function getAuthMethod()
  {
    return $this->authMethod;
  }
  /**
   * @param string
   */
  public function setListApi($listApi)
  {
    $this->listApi = $listApi;
  }
  /**
   * @return string
   */
  public function getListApi()
  {
    return $this->listApi;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param string
   */
  public function setRequestModel($requestModel)
  {
    $this->requestModel = $requestModel;
  }
  /**
   * @return string
   */
  public function getRequestModel()
  {
    return $this->requestModel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(S3CompatibleMetadata::class, 'Google_Service_Storagetransfer_S3CompatibleMetadata');
