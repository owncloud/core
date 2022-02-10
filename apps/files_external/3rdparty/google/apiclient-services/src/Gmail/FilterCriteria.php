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

namespace Google\Service\Gmail;

class FilterCriteria extends \Google\Model
{
  /**
   * @var bool
   */
  public $excludeChats;
  /**
   * @var string
   */
  public $from;
  /**
   * @var bool
   */
  public $hasAttachment;
  /**
   * @var string
   */
  public $negatedQuery;
  /**
   * @var string
   */
  public $query;
  /**
   * @var int
   */
  public $size;
  /**
   * @var string
   */
  public $sizeComparison;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var string
   */
  public $to;

  /**
   * @param bool
   */
  public function setExcludeChats($excludeChats)
  {
    $this->excludeChats = $excludeChats;
  }
  /**
   * @return bool
   */
  public function getExcludeChats()
  {
    return $this->excludeChats;
  }
  /**
   * @param string
   */
  public function setFrom($from)
  {
    $this->from = $from;
  }
  /**
   * @return string
   */
  public function getFrom()
  {
    return $this->from;
  }
  /**
   * @param bool
   */
  public function setHasAttachment($hasAttachment)
  {
    $this->hasAttachment = $hasAttachment;
  }
  /**
   * @return bool
   */
  public function getHasAttachment()
  {
    return $this->hasAttachment;
  }
  /**
   * @param string
   */
  public function setNegatedQuery($negatedQuery)
  {
    $this->negatedQuery = $negatedQuery;
  }
  /**
   * @return string
   */
  public function getNegatedQuery()
  {
    return $this->negatedQuery;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setSizeComparison($sizeComparison)
  {
    $this->sizeComparison = $sizeComparison;
  }
  /**
   * @return string
   */
  public function getSizeComparison()
  {
    return $this->sizeComparison;
  }
  /**
   * @param string
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return string
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param string
   */
  public function setTo($to)
  {
    $this->to = $to;
  }
  /**
   * @return string
   */
  public function getTo()
  {
    return $this->to;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterCriteria::class, 'Google_Service_Gmail_FilterCriteria');
