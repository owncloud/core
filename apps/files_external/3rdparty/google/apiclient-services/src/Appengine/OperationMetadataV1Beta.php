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

class OperationMetadataV1Beta extends \Google\Collection
{
  protected $collection_key = 'warning';
  protected $createVersionMetadataType = CreateVersionMetadataV1Beta::class;
  protected $createVersionMetadataDataType = '';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $ephemeralMessage;
  /**
   * @var string
   */
  public $insertTime;
  /**
   * @var string
   */
  public $method;
  /**
   * @var string
   */
  public $target;
  /**
   * @var string
   */
  public $user;
  /**
   * @var string[]
   */
  public $warning;

  /**
   * @param CreateVersionMetadataV1Beta
   */
  public function setCreateVersionMetadata(CreateVersionMetadataV1Beta $createVersionMetadata)
  {
    $this->createVersionMetadata = $createVersionMetadata;
  }
  /**
   * @return CreateVersionMetadataV1Beta
   */
  public function getCreateVersionMetadata()
  {
    return $this->createVersionMetadata;
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
   * @param string
   */
  public function setEphemeralMessage($ephemeralMessage)
  {
    $this->ephemeralMessage = $ephemeralMessage;
  }
  /**
   * @return string
   */
  public function getEphemeralMessage()
  {
    return $this->ephemeralMessage;
  }
  /**
   * @param string
   */
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  /**
   * @return string
   */
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
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
  public function setUser($user)
  {
    $this->user = $user;
  }
  /**
   * @return string
   */
  public function getUser()
  {
    return $this->user;
  }
  /**
   * @param string[]
   */
  public function setWarning($warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return string[]
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationMetadataV1Beta::class, 'Google_Service_Appengine_OperationMetadataV1Beta');
