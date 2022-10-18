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

class RepositoryWebrefMdvcMetadata extends \Google\Collection
{
  protected $collection_key = 'perVertical';
  /**
   * @var string[]
   */
  public $dimension;
  /**
   * @var string[]
   */
  public $expandedOutputConceptId;
  /**
   * @var string[]
   */
  public $generalization;
  /**
   * @var bool
   */
  public $isSynthetic;
  protected $perVerticalType = RepositoryWebrefMdvcMetadataPerVertical::class;
  protected $perVerticalDataType = 'array';
  protected $queryToLongRunningStoryDatasetType = NewsReconServiceLrsQ2lrs2QueryToLrsDataset::class;
  protected $queryToLongRunningStoryDatasetDataType = '';
  /**
   * @var int
   */
  public $resolutionPriority;

  /**
   * @param string[]
   */
  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return string[]
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param string[]
   */
  public function setExpandedOutputConceptId($expandedOutputConceptId)
  {
    $this->expandedOutputConceptId = $expandedOutputConceptId;
  }
  /**
   * @return string[]
   */
  public function getExpandedOutputConceptId()
  {
    return $this->expandedOutputConceptId;
  }
  /**
   * @param string[]
   */
  public function setGeneralization($generalization)
  {
    $this->generalization = $generalization;
  }
  /**
   * @return string[]
   */
  public function getGeneralization()
  {
    return $this->generalization;
  }
  /**
   * @param bool
   */
  public function setIsSynthetic($isSynthetic)
  {
    $this->isSynthetic = $isSynthetic;
  }
  /**
   * @return bool
   */
  public function getIsSynthetic()
  {
    return $this->isSynthetic;
  }
  /**
   * @param RepositoryWebrefMdvcMetadataPerVertical[]
   */
  public function setPerVertical($perVertical)
  {
    $this->perVertical = $perVertical;
  }
  /**
   * @return RepositoryWebrefMdvcMetadataPerVertical[]
   */
  public function getPerVertical()
  {
    return $this->perVertical;
  }
  /**
   * @param NewsReconServiceLrsQ2lrs2QueryToLrsDataset
   */
  public function setQueryToLongRunningStoryDataset(NewsReconServiceLrsQ2lrs2QueryToLrsDataset $queryToLongRunningStoryDataset)
  {
    $this->queryToLongRunningStoryDataset = $queryToLongRunningStoryDataset;
  }
  /**
   * @return NewsReconServiceLrsQ2lrs2QueryToLrsDataset
   */
  public function getQueryToLongRunningStoryDataset()
  {
    return $this->queryToLongRunningStoryDataset;
  }
  /**
   * @param int
   */
  public function setResolutionPriority($resolutionPriority)
  {
    $this->resolutionPriority = $resolutionPriority;
  }
  /**
   * @return int
   */
  public function getResolutionPriority()
  {
    return $this->resolutionPriority;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMdvcMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMdvcMetadata');
