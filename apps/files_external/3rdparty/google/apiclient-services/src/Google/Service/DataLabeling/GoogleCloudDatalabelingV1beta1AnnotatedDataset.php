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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDataset extends Google_Collection
{
  protected $collection_key = 'blockingResources';
  public $annotationSource;
  public $annotationType;
  public $blockingResources;
  public $completedExampleCount;
  public $createTime;
  public $description;
  public $displayName;
  public $exampleCount;
  protected $labelStatsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelStats';
  protected $labelStatsDataType = '';
  protected $metadataType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata';
  protected $metadataDataType = '';
  public $name;

  public function setAnnotationSource($annotationSource)
  {
    $this->annotationSource = $annotationSource;
  }
  public function getAnnotationSource()
  {
    return $this->annotationSource;
  }
  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  public function setCompletedExampleCount($completedExampleCount)
  {
    $this->completedExampleCount = $completedExampleCount;
  }
  public function getCompletedExampleCount()
  {
    return $this->completedExampleCount;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExampleCount($exampleCount)
  {
    $this->exampleCount = $exampleCount;
  }
  public function getExampleCount()
  {
    return $this->exampleCount;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelStats
   */
  public function setLabelStats(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelStats $labelStats)
  {
    $this->labelStats = $labelStats;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelStats
   */
  public function getLabelStats()
  {
    return $this->labelStats;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata
   */
  public function setMetadata(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
