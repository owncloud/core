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

namespace Google\Service\CloudSupport;

class CloudsupportCase extends \Google\Collection
{
  protected $collection_key = 'subscriberEmailAddresses';
  protected $classificationType = CaseClassification::class;
  protected $classificationDataType = '';
  public $createTime;
  protected $creatorType = Actor::class;
  protected $creatorDataType = '';
  public $description;
  public $displayName;
  public $escalated;
  public $name;
  public $severity;
  public $state;
  public $subscriberEmailAddresses;
  public $testCase;
  public $timeZone;
  public $updateTime;

  /**
   * @param CaseClassification
   */
  public function setClassification(CaseClassification $classification)
  {
    $this->classification = $classification;
  }
  /**
   * @return CaseClassification
   */
  public function getClassification()
  {
    return $this->classification;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Actor
   */
  public function setCreator(Actor $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return Actor
   */
  public function getCreator()
  {
    return $this->creator;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEscalated($escalated)
  {
    $this->escalated = $escalated;
  }
  public function getEscalated()
  {
    return $this->escalated;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSubscriberEmailAddresses($subscriberEmailAddresses)
  {
    $this->subscriberEmailAddresses = $subscriberEmailAddresses;
  }
  public function getSubscriberEmailAddresses()
  {
    return $this->subscriberEmailAddresses;
  }
  public function setTestCase($testCase)
  {
    $this->testCase = $testCase;
  }
  public function getTestCase()
  {
    return $this->testCase;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudsupportCase::class, 'Google_Service_CloudSupport_CloudsupportCase');
