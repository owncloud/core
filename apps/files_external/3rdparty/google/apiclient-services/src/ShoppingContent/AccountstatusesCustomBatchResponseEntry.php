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

namespace Google\Service\ShoppingContent;

class AccountstatusesCustomBatchResponseEntry extends \Google\Model
{
  protected $accountStatusType = AccountStatus::class;
  protected $accountStatusDataType = '';
  /**
   * @var string
   */
  public $batchId;
  protected $errorsType = Errors::class;
  protected $errorsDataType = '';

  /**
   * @param AccountStatus
   */
  public function setAccountStatus(AccountStatus $accountStatus)
  {
    $this->accountStatus = $accountStatus;
  }
  /**
   * @return AccountStatus
   */
  public function getAccountStatus()
  {
    return $this->accountStatus;
  }
  /**
   * @param string
   */
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  /**
   * @return string
   */
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param Errors
   */
  public function setErrors(Errors $errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Errors
   */
  public function getErrors()
  {
    return $this->errors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountstatusesCustomBatchResponseEntry::class, 'Google_Service_ShoppingContent_AccountstatusesCustomBatchResponseEntry');
