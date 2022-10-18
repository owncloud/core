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

namespace Google\Service\Contentwarehouse;

class IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo extends \Google\Collection
{
  protected $collection_key = 'unvalidatedOutlink';
  /**
   * @var string
   */
  public $fpOutlinks;
  /**
   * @var string
   */
  public $lastModifiedInputTimestampMs;
  /**
   * @var string
   */
  public $lastProcessedOutputTimestampMs;
  protected $linkMemberType = IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkMember::class;
  protected $linkMemberDataType = 'array';
  protected $unvalidatedOutlinkType = IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkData::class;
  protected $unvalidatedOutlinkDataType = 'array';

  /**
   * @param string
   */
  public function setFpOutlinks($fpOutlinks)
  {
    $this->fpOutlinks = $fpOutlinks;
  }
  /**
   * @return string
   */
  public function getFpOutlinks()
  {
    return $this->fpOutlinks;
  }
  /**
   * @param string
   */
  public function setLastModifiedInputTimestampMs($lastModifiedInputTimestampMs)
  {
    $this->lastModifiedInputTimestampMs = $lastModifiedInputTimestampMs;
  }
  /**
   * @return string
   */
  public function getLastModifiedInputTimestampMs()
  {
    return $this->lastModifiedInputTimestampMs;
  }
  /**
   * @param string
   */
  public function setLastProcessedOutputTimestampMs($lastProcessedOutputTimestampMs)
  {
    $this->lastProcessedOutputTimestampMs = $lastProcessedOutputTimestampMs;
  }
  /**
   * @return string
   */
  public function getLastProcessedOutputTimestampMs()
  {
    return $this->lastProcessedOutputTimestampMs;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkMember[]
   */
  public function setLinkMember($linkMember)
  {
    $this->linkMember = $linkMember;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkMember[]
   */
  public function getLinkMember()
  {
    return $this->linkMember;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkData[]
   */
  public function setUnvalidatedOutlink($unvalidatedOutlink)
  {
    $this->unvalidatedOutlink = $unvalidatedOutlink;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfoLinkData[]
   */
  public function getUnvalidatedOutlink()
  {
    return $this->unvalidatedOutlink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo');
