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
  public $age;
  public $createdBefore;
  public $customTimeBefore;
  public $daysSinceCustomTime;
  public $daysSinceNoncurrentTime;
  public $isLive;
  public $matchesPattern;
  public $matchesStorageClass;
  public $noncurrentTimeBefore;
  public $numNewerVersions;

  public function setAge($age)
  {
    $this->age = $age;
  }
  public function getAge()
  {
    return $this->age;
  }
  public function setCreatedBefore($createdBefore)
  {
    $this->createdBefore = $createdBefore;
  }
  public function getCreatedBefore()
  {
    return $this->createdBefore;
  }
  public function setCustomTimeBefore($customTimeBefore)
  {
    $this->customTimeBefore = $customTimeBefore;
  }
  public function getCustomTimeBefore()
  {
    return $this->customTimeBefore;
  }
  public function setDaysSinceCustomTime($daysSinceCustomTime)
  {
    $this->daysSinceCustomTime = $daysSinceCustomTime;
  }
  public function getDaysSinceCustomTime()
  {
    return $this->daysSinceCustomTime;
  }
  public function setDaysSinceNoncurrentTime($daysSinceNoncurrentTime)
  {
    $this->daysSinceNoncurrentTime = $daysSinceNoncurrentTime;
  }
  public function getDaysSinceNoncurrentTime()
  {
    return $this->daysSinceNoncurrentTime;
  }
  public function setIsLive($isLive)
  {
    $this->isLive = $isLive;
  }
  public function getIsLive()
  {
    return $this->isLive;
  }
  public function setMatchesPattern($matchesPattern)
  {
    $this->matchesPattern = $matchesPattern;
  }
  public function getMatchesPattern()
  {
    return $this->matchesPattern;
  }
  public function setMatchesStorageClass($matchesStorageClass)
  {
    $this->matchesStorageClass = $matchesStorageClass;
  }
  public function getMatchesStorageClass()
  {
    return $this->matchesStorageClass;
  }
  public function setNoncurrentTimeBefore($noncurrentTimeBefore)
  {
    $this->noncurrentTimeBefore = $noncurrentTimeBefore;
  }
  public function getNoncurrentTimeBefore()
  {
    return $this->noncurrentTimeBefore;
  }
  public function setNumNewerVersions($numNewerVersions)
  {
    $this->numNewerVersions = $numNewerVersions;
  }
  public function getNumNewerVersions()
  {
    return $this->numNewerVersions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketLifecycleRuleCondition::class, 'Google_Service_Storage_BucketLifecycleRuleCondition');
