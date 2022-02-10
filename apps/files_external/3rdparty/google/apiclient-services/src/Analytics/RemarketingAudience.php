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

class RemarketingAudience extends \Google\Collection
{
  protected $collection_key = 'linkedViews';
  /**
   * @var string
   */
  public $accountId;
  protected $audienceDefinitionType = RemarketingAudienceAudienceDefinition::class;
  protected $audienceDefinitionDataType = '';
  /**
   * @var string
   */
  public $audienceType;
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $description;
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
  protected $linkedAdAccountsType = LinkedForeignAccount::class;
  protected $linkedAdAccountsDataType = 'array';
  /**
   * @var string[]
   */
  public $linkedViews;
  /**
   * @var string
   */
  public $name;
  protected $stateBasedAudienceDefinitionType = RemarketingAudienceStateBasedAudienceDefinition::class;
  protected $stateBasedAudienceDefinitionDataType = '';
  /**
   * @var string
   */
  public $updated;
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
   * @param RemarketingAudienceAudienceDefinition
   */
  public function setAudienceDefinition(RemarketingAudienceAudienceDefinition $audienceDefinition)
  {
    $this->audienceDefinition = $audienceDefinition;
  }
  /**
   * @return RemarketingAudienceAudienceDefinition
   */
  public function getAudienceDefinition()
  {
    return $this->audienceDefinition;
  }
  /**
   * @param string
   */
  public function setAudienceType($audienceType)
  {
    $this->audienceType = $audienceType;
  }
  /**
   * @return string
   */
  public function getAudienceType()
  {
    return $this->audienceType;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param LinkedForeignAccount[]
   */
  public function setLinkedAdAccounts($linkedAdAccounts)
  {
    $this->linkedAdAccounts = $linkedAdAccounts;
  }
  /**
   * @return LinkedForeignAccount[]
   */
  public function getLinkedAdAccounts()
  {
    return $this->linkedAdAccounts;
  }
  /**
   * @param string[]
   */
  public function setLinkedViews($linkedViews)
  {
    $this->linkedViews = $linkedViews;
  }
  /**
   * @return string[]
   */
  public function getLinkedViews()
  {
    return $this->linkedViews;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param RemarketingAudienceStateBasedAudienceDefinition
   */
  public function setStateBasedAudienceDefinition(RemarketingAudienceStateBasedAudienceDefinition $stateBasedAudienceDefinition)
  {
    $this->stateBasedAudienceDefinition = $stateBasedAudienceDefinition;
  }
  /**
   * @return RemarketingAudienceStateBasedAudienceDefinition
   */
  public function getStateBasedAudienceDefinition()
  {
    return $this->stateBasedAudienceDefinition;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
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
class_alias(RemarketingAudience::class, 'Google_Service_Analytics_RemarketingAudience');
