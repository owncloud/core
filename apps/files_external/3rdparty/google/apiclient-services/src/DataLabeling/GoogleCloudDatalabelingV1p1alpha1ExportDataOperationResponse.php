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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1p1alpha1ExportDataOperationResponse extends \Google\Model
{
  public $annotatedDataset;
  public $dataset;
  public $exportCount;
  protected $labelStatsType = GoogleCloudDatalabelingV1p1alpha1LabelStats::class;
  protected $labelStatsDataType = '';
  protected $outputConfigType = GoogleCloudDatalabelingV1p1alpha1OutputConfig::class;
  protected $outputConfigDataType = '';
  public $totalCount;

  public function setAnnotatedDataset($annotatedDataset)
  {
    $this->annotatedDataset = $annotatedDataset;
  }
  public function getAnnotatedDataset()
  {
    return $this->annotatedDataset;
  }
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setExportCount($exportCount)
  {
    $this->exportCount = $exportCount;
  }
  public function getExportCount()
  {
    return $this->exportCount;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelStats
   */
  public function setLabelStats(GoogleCloudDatalabelingV1p1alpha1LabelStats $labelStats)
  {
    $this->labelStats = $labelStats;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelStats
   */
  public function getLabelStats()
  {
    return $this->labelStats;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1OutputConfig
   */
  public function setOutputConfig(GoogleCloudDatalabelingV1p1alpha1OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1p1alpha1ExportDataOperationResponse::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1p1alpha1ExportDataOperationResponse');
