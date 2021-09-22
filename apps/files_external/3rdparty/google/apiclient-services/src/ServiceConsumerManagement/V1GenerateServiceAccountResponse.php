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

namespace Google\Service\ServiceConsumerManagement;

class V1GenerateServiceAccountResponse extends \Google\Model
{
  protected $accountType = V1ServiceAccount::class;
  protected $accountDataType = '';

  /**
   * @param V1ServiceAccount
   */
  public function setAccount(V1ServiceAccount $account)
  {
    $this->account = $account;
  }
  /**
   * @return V1ServiceAccount
   */
  public function getAccount()
  {
    return $this->account;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1GenerateServiceAccountResponse::class, 'Google_Service_ServiceConsumerManagement_V1GenerateServiceAccountResponse');
