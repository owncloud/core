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

class LinkedForeignAccount extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $eligibleForSearch;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $internalWebPropertyId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $linkedAccountId;
  /**
   * @var string
   */
  public $remarketingAudienceId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $webPropertyId;

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
   * @param bool
   */
  public function setEligibleForSearch($eligibleForSearch)
  {
    $this->eligibleForSearch = $eligibleForSearch;
  }
  /**
   * @return bool
   */
  public function getEligibleForSearch()
  {
    return $this->eligibleForSearch;
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
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  /**
   * @return string
   */
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
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
  public function setLinkedAccountId($linkedAccountId)
  {
    $this->linkedAccountId = $linkedAccountId;
  }
  /**
   * @return string
   */
  public function getLinkedAccountId()
  {
    return $this->linkedAccountId;
  }
  /**
   * @param string
   */
  public function setRemarketingAudienceId($remarketingAudienceId)
  {
    $this->remarketingAudienceId = $remarketingAudienceId;
  }
  /**
   * @return string
   */
  public function getRemarketingAudienceId()
  {
    return $this->remarketingAudienceId;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
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
class_alias(LinkedForeignAccount::class, 'Google_Service_Analytics_LinkedForeignAccount');
