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

namespace Google\Service\Datastream;

class BigQueryDestinationConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $dataFreshness;
  protected $singleTargetDatasetType = SingleTargetDataset::class;
  protected $singleTargetDatasetDataType = '';
  protected $sourceHierarchyDatasetsType = SourceHierarchyDatasets::class;
  protected $sourceHierarchyDatasetsDataType = '';

  /**
   * @param string
   */
  public function setDataFreshness($dataFreshness)
  {
    $this->dataFreshness = $dataFreshness;
  }
  /**
   * @return string
   */
  public function getDataFreshness()
  {
    return $this->dataFreshness;
  }
  /**
   * @param SingleTargetDataset
   */
  public function setSingleTargetDataset(SingleTargetDataset $singleTargetDataset)
  {
    $this->singleTargetDataset = $singleTargetDataset;
  }
  /**
   * @return SingleTargetDataset
   */
  public function getSingleTargetDataset()
  {
    return $this->singleTargetDataset;
  }
  /**
   * @param SourceHierarchyDatasets
   */
  public function setSourceHierarchyDatasets(SourceHierarchyDatasets $sourceHierarchyDatasets)
  {
    $this->sourceHierarchyDatasets = $sourceHierarchyDatasets;
  }
  /**
   * @return SourceHierarchyDatasets
   */
  public function getSourceHierarchyDatasets()
  {
    return $this->sourceHierarchyDatasets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigQueryDestinationConfig::class, 'Google_Service_Datastream_BigQueryDestinationConfig');
