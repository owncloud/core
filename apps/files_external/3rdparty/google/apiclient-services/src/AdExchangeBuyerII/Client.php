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

namespace Google\Service\AdExchangeBuyerII;

class Client extends \Google\Model
{
  /**
   * @var string
   */
  public $clientAccountId;
  /**
   * @var string
   */
  public $clientName;
  /**
   * @var string
   */
  public $entityId;
  /**
   * @var string
   */
  public $entityName;
  /**
   * @var string
   */
  public $entityType;
  /**
   * @var string
   */
  public $partnerClientId;
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $status;
  /**
   * @var bool
   */
  public $visibleToSeller;

  /**
   * @param string
   */
  public function setClientAccountId($clientAccountId)
  {
    $this->clientAccountId = $clientAccountId;
  }
  /**
   * @return string
   */
  public function getClientAccountId()
  {
    return $this->clientAccountId;
  }
  /**
   * @param string
   */
  public function setClientName($clientName)
  {
    $this->clientName = $clientName;
  }
  /**
   * @return string
   */
  public function getClientName()
  {
    return $this->clientName;
  }
  /**
   * @param string
   */
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return string
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
  /**
   * @param string
   */
  public function setEntityName($entityName)
  {
    $this->entityName = $entityName;
  }
  /**
   * @return string
   */
  public function getEntityName()
  {
    return $this->entityName;
  }
  /**
   * @param string
   */
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  /**
   * @return string
   */
  public function getEntityType()
  {
    return $this->entityType;
  }
  /**
   * @param string
   */
  public function setPartnerClientId($partnerClientId)
  {
    $this->partnerClientId = $partnerClientId;
  }
  /**
   * @return string
   */
  public function getPartnerClientId()
  {
    return $this->partnerClientId;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
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
   * @param bool
   */
  public function setVisibleToSeller($visibleToSeller)
  {
    $this->visibleToSeller = $visibleToSeller;
  }
  /**
   * @return bool
   */
  public function getVisibleToSeller()
  {
    return $this->visibleToSeller;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Client::class, 'Google_Service_AdExchangeBuyerII_Client');
