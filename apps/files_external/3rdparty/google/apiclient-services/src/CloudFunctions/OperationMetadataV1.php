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

namespace Google\Service\CloudFunctions;

class OperationMetadataV1 extends \Google\Model
{
  /**
   * @var string
   */
  public $buildId;
  /**
   * @var string
   */
  public $buildName;
  /**
   * @var array[]
   */
  public $request;
  /**
   * @var string
   */
  public $sourceToken;
  /**
   * @var string
   */
  public $target;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $versionId;

  /**
   * @param string
   */
  public function setBuildId($buildId)
  {
    $this->buildId = $buildId;
  }
  /**
   * @return string
   */
  public function getBuildId()
  {
    return $this->buildId;
  }
  /**
   * @param string
   */
  public function setBuildName($buildName)
  {
    $this->buildName = $buildName;
  }
  /**
   * @return string
   */
  public function getBuildName()
  {
    return $this->buildName;
  }
  /**
   * @param array[]
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return array[]
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param string
   */
  public function setSourceToken($sourceToken)
  {
    $this->sourceToken = $sourceToken;
  }
  /**
   * @return string
   */
  public function getSourceToken()
  {
    return $this->sourceToken;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return string
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationMetadataV1::class, 'Google_Service_CloudFunctions_OperationMetadataV1');
