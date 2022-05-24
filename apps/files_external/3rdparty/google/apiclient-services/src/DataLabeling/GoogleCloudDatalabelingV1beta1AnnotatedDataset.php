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

class GoogleCloudDatalabelingV1beta1AnnotatedDataset extends \Google\Collection
{
  protected $collection_key = 'blockingResources';
  /**
   * @var string
   */
  public $annotationSource;
  /**
   * @var string
   */
  public $annotationType;
  /**
   * @var string[]
   */
  public $blockingResources;
  /**
   * @var string
   */
  public $completedExampleCount;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $exampleCount;
  protected $labelStatsType = GoogleCloudDatalabelingV1beta1LabelStats::class;
  protected $labelStatsDataType = '';
  protected $metadataType = GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setAnnotationSource($annotationSource)
  {
    $this->annotationSource = $annotationSource;
  }
  /**
   * @return string
   */
  public function getAnnotationSource()
  {
    return $this->annotationSource;
  }
  /**
   * @param string
   */
  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  /**
   * @return string
   */
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param string[]
   */
  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  /**
   * @return string[]
   */
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  /**
   * @param string
   */
  public function setCompletedExampleCount($completedExampleCount)
  {
    $this->completedExampleCount = $completedExampleCount;
  }
  /**
   * @return string
   */
  public function getCompletedExampleCount()
  {
    return $this->completedExampleCount;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setExampleCount($exampleCount)
  {
    $this->exampleCount = $exampleCount;
  }
  /**
   * @return string
   */
  public function getExampleCount()
  {
    return $this->exampleCount;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1LabelStats
   */
  public function setLabelStats(GoogleCloudDatalabelingV1beta1LabelStats $labelStats)
  {
    $this->labelStats = $labelStats;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1LabelStats
   */
  public function getLabelStats()
  {
    return $this->labelStats;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata
   */
  public function setMetadata(GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotatedDatasetMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1AnnotatedDataset::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotatedDataset');
