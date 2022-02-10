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

namespace Google\Service\SecurityCommandCenter;

class GroupAssetsRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $compareDuration;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $groupBy;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  /**
   * @var string
   */
  public $readTime;

  /**
   * @param string
   */
  public function setCompareDuration($compareDuration)
  {
    $this->compareDuration = $compareDuration;
  }
  /**
   * @return string
   */
  public function getCompareDuration()
  {
    return $this->compareDuration;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string
   */
  public function setGroupBy($groupBy)
  {
    $this->groupBy = $groupBy;
  }
  /**
   * @return string
   */
  public function getGroupBy()
  {
    return $this->groupBy;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param string
   */
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  /**
   * @return string
   */
  public function getReadTime()
  {
    return $this->readTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GroupAssetsRequest::class, 'Google_Service_SecurityCommandCenter_GroupAssetsRequest');
