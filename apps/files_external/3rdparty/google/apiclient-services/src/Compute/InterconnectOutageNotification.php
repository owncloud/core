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

namespace Google\Service\Compute;

class InterconnectOutageNotification extends \Google\Collection
{
  protected $collection_key = 'affectedCircuits';
  /**
   * @var string[]
   */
  public $affectedCircuits;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $issueType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string[]
   */
  public function setAffectedCircuits($affectedCircuits)
  {
    $this->affectedCircuits = $affectedCircuits;
  }
  /**
   * @return string[]
   */
  public function getAffectedCircuits()
  {
    return $this->affectedCircuits;
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
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setIssueType($issueType)
  {
    $this->issueType = $issueType;
  }
  /**
   * @return string
   */
  public function getIssueType()
  {
    return $this->issueType;
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
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InterconnectOutageNotification::class, 'Google_Service_Compute_InterconnectOutageNotification');
