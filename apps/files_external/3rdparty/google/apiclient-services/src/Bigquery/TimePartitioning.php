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

namespace Google\Service\Bigquery;

class TimePartitioning extends \Google\Model
{
  /**
   * @var string
   */
  public $expirationMs;
  /**
   * @var string
   */
  public $field;
  /**
   * @var bool
   */
  public $requirePartitionFilter;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setExpirationMs($expirationMs)
  {
    $this->expirationMs = $expirationMs;
  }
  /**
   * @return string
   */
  public function getExpirationMs()
  {
    return $this->expirationMs;
  }
  /**
   * @param string
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return string
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param bool
   */
  public function setRequirePartitionFilter($requirePartitionFilter)
  {
    $this->requirePartitionFilter = $requirePartitionFilter;
  }
  /**
   * @return bool
   */
  public function getRequirePartitionFilter()
  {
    return $this->requirePartitionFilter;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimePartitioning::class, 'Google_Service_Bigquery_TimePartitioning');
