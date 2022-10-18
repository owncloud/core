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

class SnapshotSnapshotMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $countDistinctResources;
  /**
   * @var string
   */
  public $crawlTimestamp;
  protected $snapshotDocumentType = SnapshotSnapshotDocument::class;
  protected $snapshotDocumentDataType = '';
  /**
   * @var float
   */
  public $snapshotQualityScore;
  /**
   * @var string
   */
  public $totalContentSize;

  /**
   * @param string
   */
  public function setCountDistinctResources($countDistinctResources)
  {
    $this->countDistinctResources = $countDistinctResources;
  }
  /**
   * @return string
   */
  public function getCountDistinctResources()
  {
    return $this->countDistinctResources;
  }
  /**
   * @param string
   */
  public function setCrawlTimestamp($crawlTimestamp)
  {
    $this->crawlTimestamp = $crawlTimestamp;
  }
  /**
   * @return string
   */
  public function getCrawlTimestamp()
  {
    return $this->crawlTimestamp;
  }
  /**
   * @param SnapshotSnapshotDocument
   */
  public function setSnapshotDocument(SnapshotSnapshotDocument $snapshotDocument)
  {
    $this->snapshotDocument = $snapshotDocument;
  }
  /**
   * @return SnapshotSnapshotDocument
   */
  public function getSnapshotDocument()
  {
    return $this->snapshotDocument;
  }
  /**
   * @param float
   */
  public function setSnapshotQualityScore($snapshotQualityScore)
  {
    $this->snapshotQualityScore = $snapshotQualityScore;
  }
  /**
   * @return float
   */
  public function getSnapshotQualityScore()
  {
    return $this->snapshotQualityScore;
  }
  /**
   * @param string
   */
  public function setTotalContentSize($totalContentSize)
  {
    $this->totalContentSize = $totalContentSize;
  }
  /**
   * @return string
   */
  public function getTotalContentSize()
  {
    return $this->totalContentSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnapshotSnapshotMetadata::class, 'Google_Service_Contentwarehouse_SnapshotSnapshotMetadata');
