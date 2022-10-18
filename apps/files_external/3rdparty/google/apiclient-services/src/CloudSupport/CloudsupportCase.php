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
  /**
   * @var string
   */
  public $createTime;
  protected $creatorType = Actor::class;
  protected $creatorDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $escalated;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $severity;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string[]
   */
  public $subscriberEmailAddresses;
  /**
   * @var bool
   */
  public $testCase;
  /**
   * @var string
   */
  public $timeZone;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setEscalated($escalated)
  {
    $this->escalated = $escalated;
  }
  /**
   * @return bool
   */
  public function getEscalated()
  {
    return $this->escalated;
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
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string[]
   */
  public function setSubscriberEmailAddresses($subscriberEmailAddresses)
  {
    $this->subscriberEmailAddresses = $subscriberEmailAddresses;
  }
  /**
   * @return string[]
   */
  public function getSubscriberEmailAddresses()
  {
    return $this->subscriberEmailAddresses;
  }
  /**
   * @param bool
   */
  public function setTestCase($testCase)
  {
    $this->testCase = $testCase;
  }
  /**
   * @return bool
   */
  public function getTestCase()
  {
    return $this->testCase;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudsupportCase::class, 'Google_Service_CloudSupport_CloudsupportCase');
