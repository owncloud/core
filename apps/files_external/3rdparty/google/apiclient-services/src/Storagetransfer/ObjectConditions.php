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

namespace Google\Service\Storagetransfer;

class ObjectConditions extends \Google\Collection
{
  protected $collection_key = 'includePrefixes';
  /**
   * @var string[]
   */
  public $excludePrefixes;
  /**
   * @var string[]
   */
  public $includePrefixes;
  /**
   * @var string
   */
  public $lastModifiedBefore;
  /**
   * @var string
   */
  public $lastModifiedSince;
  /**
   * @var string
   */
  public $maxTimeElapsedSinceLastModification;
  /**
   * @var string
   */
  public $minTimeElapsedSinceLastModification;

  /**
   * @param string[]
   */
  public function setExcludePrefixes($excludePrefixes)
  {
    $this->excludePrefixes = $excludePrefixes;
  }
  /**
   * @return string[]
   */
  public function getExcludePrefixes()
  {
    return $this->excludePrefixes;
  }
  /**
   * @param string[]
   */
  public function setIncludePrefixes($includePrefixes)
  {
    $this->includePrefixes = $includePrefixes;
  }
  /**
   * @return string[]
   */
  public function getIncludePrefixes()
  {
    return $this->includePrefixes;
  }
  /**
   * @param string
   */
  public function setLastModifiedBefore($lastModifiedBefore)
  {
    $this->lastModifiedBefore = $lastModifiedBefore;
  }
  /**
   * @return string
   */
  public function getLastModifiedBefore()
  {
    return $this->lastModifiedBefore;
  }
  /**
   * @param string
   */
  public function setLastModifiedSince($lastModifiedSince)
  {
    $this->lastModifiedSince = $lastModifiedSince;
  }
  /**
   * @return string
   */
  public function getLastModifiedSince()
  {
    return $this->lastModifiedSince;
  }
  /**
   * @param string
   */
  public function setMaxTimeElapsedSinceLastModification($maxTimeElapsedSinceLastModification)
  {
    $this->maxTimeElapsedSinceLastModification = $maxTimeElapsedSinceLastModification;
  }
  /**
   * @return string
   */
  public function getMaxTimeElapsedSinceLastModification()
  {
    return $this->maxTimeElapsedSinceLastModification;
  }
  /**
   * @param string
   */
  public function setMinTimeElapsedSinceLastModification($minTimeElapsedSinceLastModification)
  {
    $this->minTimeElapsedSinceLastModification = $minTimeElapsedSinceLastModification;
  }
  /**
   * @return string
   */
  public function getMinTimeElapsedSinceLastModification()
  {
    return $this->minTimeElapsedSinceLastModification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ObjectConditions::class, 'Google_Service_Storagetransfer_ObjectConditions');
