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

namespace Google\Service\Appengine;

class OperationMetadataV1 extends \Google\Collection
{
  protected $collection_key = 'warning';
  protected $createVersionMetadataType = CreateVersionMetadataV1::class;
  protected $createVersionMetadataDataType = '';
  public $endTime;
  public $ephemeralMessage;
  public $insertTime;
  public $method;
  public $target;
  public $user;
  public $warning;

  /**
   * @param CreateVersionMetadataV1
   */
  public function setCreateVersionMetadata(CreateVersionMetadataV1 $createVersionMetadata)
  {
    $this->createVersionMetadata = $createVersionMetadata;
  }
  /**
   * @return CreateVersionMetadataV1
   */
  public function getCreateVersionMetadata()
  {
    return $this->createVersionMetadata;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setEphemeralMessage($ephemeralMessage)
  {
    $this->ephemeralMessage = $ephemeralMessage;
  }
  public function getEphemeralMessage()
  {
    return $this->ephemeralMessage;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function setWarning($warning)
  {
    $this->warning = $warning;
  }
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationMetadataV1::class, 'Google_Service_Appengine_OperationMetadataV1');
