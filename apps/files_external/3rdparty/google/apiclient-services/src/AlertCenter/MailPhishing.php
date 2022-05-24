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

namespace Google\Service\AlertCenter;

class MailPhishing extends \Google\Collection
{
  protected $collection_key = 'messages';
  protected $domainIdType = DomainId::class;
  protected $domainIdDataType = '';
  /**
   * @var bool
   */
  public $isInternal;
  protected $maliciousEntityType = MaliciousEntity::class;
  protected $maliciousEntityDataType = '';
  protected $messagesType = GmailMessageInfo::class;
  protected $messagesDataType = 'array';
  /**
   * @var string
   */
  public $systemActionType;

  /**
   * @param DomainId
   */
  public function setDomainId(DomainId $domainId)
  {
    $this->domainId = $domainId;
  }
  /**
   * @return DomainId
   */
  public function getDomainId()
  {
    return $this->domainId;
  }
  /**
   * @param bool
   */
  public function setIsInternal($isInternal)
  {
    $this->isInternal = $isInternal;
  }
  /**
   * @return bool
   */
  public function getIsInternal()
  {
    return $this->isInternal;
  }
  /**
   * @param MaliciousEntity
   */
  public function setMaliciousEntity(MaliciousEntity $maliciousEntity)
  {
    $this->maliciousEntity = $maliciousEntity;
  }
  /**
   * @return MaliciousEntity
   */
  public function getMaliciousEntity()
  {
    return $this->maliciousEntity;
  }
  /**
   * @param GmailMessageInfo[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return GmailMessageInfo[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param string
   */
  public function setSystemActionType($systemActionType)
  {
    $this->systemActionType = $systemActionType;
  }
  /**
   * @return string
   */
  public function getSystemActionType()
  {
    return $this->systemActionType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MailPhishing::class, 'Google_Service_AlertCenter_MailPhishing');
