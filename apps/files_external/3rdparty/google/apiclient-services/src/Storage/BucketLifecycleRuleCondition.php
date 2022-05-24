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

namespace Google\Service\Storage;

class BucketLifecycleRuleCondition extends \Google\Collection
{
  protected $collection_key = 'matchesStorageClass';
  /**
   * @var int
   */
  public $age;
  /**
   * @var string
   */
  public $createdBefore;
  /**
   * @var string
   */
  public $customTimeBefore;
  /**
   * @var int
   */
  public $daysSinceCustomTime;
  /**
   * @var int
   */
  public $daysSinceNoncurrentTime;
  /**
   * @var bool
   */
  public $isLive;
  /**
   * @var string
   */
  public $matchesPattern;
  /**
   * @var string[]
   */
  public $matchesStorageClass;
  /**
   * @var string
   */
  public $noncurrentTimeBefore;
  /**
   * @var int
   */
  public $numNewerVersions;

  /**
   * @param int
   */
  public function setAge($age)
  {
    $this->age = $age;
  }
  /**
   * @return int
   */
  public function getAge()
  {
    return $this->age;
  }
  /**
   * @param string
   */
  public function setCreatedBefore($createdBefore)
  {
    $this->createdBefore = $createdBefore;
  }
  /**
   * @return string
   */
  public function getCreatedBefore()
  {
    return $this->createdBefore;
  }
  /**
   * @param string
   */
  public function setCustomTimeBefore($customTimeBefore)
  {
    $this->customTimeBefore = $customTimeBefore;
  }
  /**
   * @return string
   */
  public function getCustomTimeBefore()
  {
    return $this->customTimeBefore;
  }
  /**
   * @param int
   */
  public function setDaysSinceCustomTime($daysSinceCustomTime)
  {
    $this->daysSinceCustomTime = $daysSinceCustomTime;
  }
  /**
   * @return int
   */
  public function getDaysSinceCustomTime()
  {
    return $this->daysSinceCustomTime;
  }
  /**
   * @param int
   */
  public function setDaysSinceNoncurrentTime($daysSinceNoncurrentTime)
  {
    $this->daysSinceNoncurrentTime = $daysSinceNoncurrentTime;
  }
  /**
   * @return int
   */
  public function getDaysSinceNoncurrentTime()
  {
    return $this->daysSinceNoncurrentTime;
  }
  /**
   * @param bool
   */
  public function setIsLive($isLive)
  {
    $this->isLive = $isLive;
  }
  /**
   * @return bool
   */
  public function getIsLive()
  {
    return $this->isLive;
  }
  /**
   * @param string
   */
  public function setMatchesPattern($matchesPattern)
  {
    $this->matchesPattern = $matchesPattern;
  }
  /**
   * @return string
   */
  public function getMatchesPattern()
  {
    return $this->matchesPattern;
  }
  /**
   * @param string[]
   */
  public function setMatchesStorageClass($matchesStorageClass)
  {
    $this->matchesStorageClass = $matchesStorageClass;
  }
  /**
   * @return string[]
   */
  public function getMatchesStorageClass()
  {
    return $this->matchesStorageClass;
  }
  /**
   * @param string
   */
  public function setNoncurrentTimeBefore($noncurrentTimeBefore)
  {
    $this->noncurrentTimeBefore = $noncurrentTimeBefore;
  }
  /**
   * @return string
   */
  public function getNoncurrentTimeBefore()
  {
    return $this->noncurrentTimeBefore;
  }
  /**
   * @param int
   */
  public function setNumNewerVersions($numNewerVersions)
  {
    $this->numNewerVersions = $numNewerVersions;
  }
  /**
   * @return int
   */
  public function getNumNewerVersions()
  {
    return $this->numNewerVersions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketLifecycleRuleCondition::class, 'Google_Service_Storage_BucketLifecycleRuleCondition');
