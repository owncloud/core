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

class Google_Service_AlertCenter_PhishingSpike extends Google_Collection
{
  protected $collection_key = 'messages';
  protected $domainIdType = 'Google_Service_AlertCenter_DomainId';
  protected $domainIdDataType = '';
  public $isInternal;
  protected $maliciousEntityType = 'Google_Service_AlertCenter_MaliciousEntity';
  protected $maliciousEntityDataType = '';
  protected $messagesType = 'Google_Service_AlertCenter_GmailMessageInfo';
  protected $messagesDataType = 'array';

  /**
   * @param Google_Service_AlertCenter_DomainId
   */
  public function setDomainId(Google_Service_AlertCenter_DomainId $domainId)
  {
    $this->domainId = $domainId;
  }
  /**
   * @return Google_Service_AlertCenter_DomainId
   */
  public function getDomainId()
  {
    return $this->domainId;
  }
  public function setIsInternal($isInternal)
  {
    $this->isInternal = $isInternal;
  }
  public function getIsInternal()
  {
    return $this->isInternal;
  }
  /**
   * @param Google_Service_AlertCenter_MaliciousEntity
   */
  public function setMaliciousEntity(Google_Service_AlertCenter_MaliciousEntity $maliciousEntity)
  {
    $this->maliciousEntity = $maliciousEntity;
  }
  /**
   * @return Google_Service_AlertCenter_MaliciousEntity
   */
  public function getMaliciousEntity()
  {
    return $this->maliciousEntity;
  }
  /**
   * @param Google_Service_AlertCenter_GmailMessageInfo
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Google_Service_AlertCenter_GmailMessageInfo
   */
  public function getMessages()
  {
    return $this->messages;
  }
}
