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

class Google_Service_Analytics_UserDeletionRequest extends Google_Model
{
  public $deletionRequestTime;
  public $firebaseProjectId;
  protected $idType = 'Google_Service_Analytics_UserDeletionRequestId';
  protected $idDataType = '';
  public $kind;
  public $propertyId;
  public $webPropertyId;

  public function setDeletionRequestTime($deletionRequestTime)
  {
    $this->deletionRequestTime = $deletionRequestTime;
  }
  public function getDeletionRequestTime()
  {
    return $this->deletionRequestTime;
  }
  public function setFirebaseProjectId($firebaseProjectId)
  {
    $this->firebaseProjectId = $firebaseProjectId;
  }
  public function getFirebaseProjectId()
  {
    return $this->firebaseProjectId;
  }
  /**
   * @param Google_Service_Analytics_UserDeletionRequestId
   */
  public function setId(Google_Service_Analytics_UserDeletionRequestId $id)
  {
    $this->id = $id;
  }
  /**
   * @return Google_Service_Analytics_UserDeletionRequestId
   */
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPropertyId($propertyId)
  {
    $this->propertyId = $propertyId;
  }
  public function getPropertyId()
  {
    return $this->propertyId;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}
