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

namespace Google\Service\Dns;

class Change extends \Google\Collection
{
  protected $collection_key = 'deletions';
  protected $additionsType = ResourceRecordSet::class;
  protected $additionsDataType = 'array';
  protected $deletionsType = ResourceRecordSet::class;
  protected $deletionsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isServing;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;

  /**
   * @param ResourceRecordSet[]
   */
  public function setAdditions($additions)
  {
    $this->additions = $additions;
  }
  /**
   * @return ResourceRecordSet[]
   */
  public function getAdditions()
  {
    return $this->additions;
  }
  /**
   * @param ResourceRecordSet[]
   */
  public function setDeletions($deletions)
  {
    $this->deletions = $deletions;
  }
  /**
   * @return ResourceRecordSet[]
   */
  public function getDeletions()
  {
    return $this->deletions;
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
   * @param bool
   */
  public function setIsServing($isServing)
  {
    $this->isServing = $isServing;
  }
  /**
   * @return bool
   */
  public function getIsServing()
  {
    return $this->isServing;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Change::class, 'Google_Service_Dns_Change');
