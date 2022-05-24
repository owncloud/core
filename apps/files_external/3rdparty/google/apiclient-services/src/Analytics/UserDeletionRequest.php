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

namespace Google\Service\Analytics;

class UserDeletionRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $deletionRequestTime;
  /**
   * @var string
   */
  public $firebaseProjectId;
  protected $idType = UserDeletionRequestId::class;
  protected $idDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $propertyId;
  /**
   * @var string
   */
  public $webPropertyId;

  /**
   * @param string
   */
  public function setDeletionRequestTime($deletionRequestTime)
  {
    $this->deletionRequestTime = $deletionRequestTime;
  }
  /**
   * @return string
   */
  public function getDeletionRequestTime()
  {
    return $this->deletionRequestTime;
  }
  /**
   * @param string
   */
  public function setFirebaseProjectId($firebaseProjectId)
  {
    $this->firebaseProjectId = $firebaseProjectId;
  }
  /**
   * @return string
   */
  public function getFirebaseProjectId()
  {
    return $this->firebaseProjectId;
  }
  /**
   * @param UserDeletionRequestId
   */
  public function setId(UserDeletionRequestId $id)
  {
    $this->id = $id;
  }
  /**
   * @return UserDeletionRequestId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPropertyId($propertyId)
  {
    $this->propertyId = $propertyId;
  }
  /**
   * @return string
   */
  public function getPropertyId()
  {
    return $this->propertyId;
  }
  /**
   * @param string
   */
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  /**
   * @return string
   */
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserDeletionRequest::class, 'Google_Service_Analytics_UserDeletionRequest');
