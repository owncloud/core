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
  public $buildId;
  public $buildName;
  public $request;
  public $sourceToken;
  public $target;
  public $type;
  public $updateTime;
  public $versionId;

  public function setBuildId($buildId)
  {
    $this->buildId = $buildId;
  }
  public function getBuildId()
  {
    return $this->buildId;
  }
  public function setBuildName($buildName)
  {
    $this->buildName = $buildName;
  }
  public function getBuildName()
  {
    return $this->buildName;
  }
  public function setRequest($request)
  {
    $this->request = $request;
  }
  public function getRequest()
  {
    return $this->request;
  }
  public function setSourceToken($sourceToken)
  {
    $this->sourceToken = $sourceToken;
  }
  public function getSourceToken()
  {
    return $this->sourceToken;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationMetadataV1::class, 'Google_Service_CloudFunctions_OperationMetadataV1');
