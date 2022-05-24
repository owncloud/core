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

namespace Google\Service\Dfareporting;

class ChangeLog extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $changeTime;
  /**
   * @var string
   */
  public $fieldName;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $newValue;
  /**
   * @var string
   */
  public $objectId;
  /**
   * @var string
   */
  public $objectType;
  /**
   * @var string
   */
  public $oldValue;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $transactionId;
  /**
   * @var string
   */
  public $userProfileId;
  /**
   * @var string
   */
  public $userProfileName;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setChangeTime($changeTime)
  {
    $this->changeTime = $changeTime;
  }
  /**
   * @return string
   */
  public function getChangeTime()
  {
    return $this->changeTime;
  }
  /**
   * @param string
   */
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  /**
   * @return string
   */
  public function getFieldName()
  {
    return $this->fieldName;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
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
  public function setNewValue($newValue)
  {
    $this->newValue = $newValue;
  }
  /**
   * @return string
   */
  public function getNewValue()
  {
    return $this->newValue;
  }
  /**
   * @param string
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return string
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param string
   */
  public function setOldValue($oldValue)
  {
    $this->oldValue = $oldValue;
  }
  /**
   * @return string
   */
  public function getOldValue()
  {
    return $this->oldValue;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param string
   */
  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  /**
   * @return string
   */
  public function getTransactionId()
  {
    return $this->transactionId;
  }
  /**
   * @param string
   */
  public function setUserProfileId($userProfileId)
  {
    $this->userProfileId = $userProfileId;
  }
  /**
   * @return string
   */
  public function getUserProfileId()
  {
    return $this->userProfileId;
  }
  /**
   * @param string
   */
  public function setUserProfileName($userProfileName)
  {
    $this->userProfileName = $userProfileName;
  }
  /**
   * @return string
   */
  public function getUserProfileName()
  {
    return $this->userProfileName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChangeLog::class, 'Google_Service_Dfareporting_ChangeLog');
