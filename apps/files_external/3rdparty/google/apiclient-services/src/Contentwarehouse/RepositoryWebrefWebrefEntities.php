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

class RepositoryWebrefWebrefEntities extends \Google\Collection
{
  protected $collection_key = 'rangeAnnotations';
  protected $annotationStatsType = RepositoryWebrefWebrefAnnotationStats::class;
  protected $annotationStatsDataType = '';
  protected $annotatorCheckpointFingerprintsType = RepositoryWebrefAnnotatorCheckpointFprint::class;
  protected $annotatorCheckpointFingerprintsDataType = 'array';
  protected $categoryType = RepositoryWebrefCategoryAnnotation::class;
  protected $categoryDataType = 'array';
  protected $dateRangeType = RepositoryWebrefSemanticDateRange::class;
  protected $dateRangeDataType = 'array';
  protected $documentInfoType = RepositoryWebrefWebrefDocumentInfo::class;
  protected $documentInfoDataType = '';
  protected $entityType = RepositoryWebrefWebrefEntity::class;
  protected $entityDataType = 'array';
  protected $rangeAnnotationsType = RepositoryWebrefRangeAnnotations::class;
  protected $rangeAnnotationsDataType = 'array';
  protected $statusType = RepositoryWebrefWebrefStatus::class;
  protected $statusDataType = '';
  protected $stuffType = Proto2BridgeMessageSet::class;
  protected $stuffDataType = '';
  protected $tripleAnnotationsType = RepositoryWebrefTripleAnnotations::class;
  protected $tripleAnnotationsDataType = '';

  /**
   * @param RepositoryWebrefWebrefAnnotationStats
   */
  public function setAnnotationStats(RepositoryWebrefWebrefAnnotationStats $annotationStats)
  {
    $this->annotationStats = $annotationStats;
  }
  /**
   * @return RepositoryWebrefWebrefAnnotationStats
   */
  public function getAnnotationStats()
  {
    return $this->annotationStats;
  }
  /**
   * @param RepositoryWebrefAnnotatorCheckpointFprint[]
   */
  public function setAnnotatorCheckpointFingerprints($annotatorCheckpointFingerprints)
  {
    $this->annotatorCheckpointFingerprints = $annotatorCheckpointFingerprints;
  }
  /**
   * @return RepositoryWebrefAnnotatorCheckpointFprint[]
   */
  public function getAnnotatorCheckpointFingerprints()
  {
    return $this->annotatorCheckpointFingerprints;
  }
  /**
   * @param RepositoryWebrefCategoryAnnotation[]
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return RepositoryWebrefCategoryAnnotation[]
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param RepositoryWebrefSemanticDateRange[]
   */
  public function setDateRange($dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return RepositoryWebrefSemanticDateRange[]
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param RepositoryWebrefWebrefDocumentInfo
   */
  public function setDocumentInfo(RepositoryWebrefWebrefDocumentInfo $documentInfo)
  {
    $this->documentInfo = $documentInfo;
  }
  /**
   * @return RepositoryWebrefWebrefDocumentInfo
   */
  public function getDocumentInfo()
  {
    return $this->documentInfo;
  }
  /**
   * @param RepositoryWebrefWebrefEntity[]
   */
  public function setEntity($entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return RepositoryWebrefWebrefEntity[]
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param RepositoryWebrefRangeAnnotations[]
   */
  public function setRangeAnnotations($rangeAnnotations)
  {
    $this->rangeAnnotations = $rangeAnnotations;
  }
  /**
   * @return RepositoryWebrefRangeAnnotations[]
   */
  public function getRangeAnnotations()
  {
    return $this->rangeAnnotations;
  }
  /**
   * @param RepositoryWebrefWebrefStatus
   */
  public function setStatus(RepositoryWebrefWebrefStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return RepositoryWebrefWebrefStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setStuff(Proto2BridgeMessageSet $stuff)
  {
    $this->stuff = $stuff;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getStuff()
  {
    return $this->stuff;
  }
  /**
   * @param RepositoryWebrefTripleAnnotations
   */
  public function setTripleAnnotations(RepositoryWebrefTripleAnnotations $tripleAnnotations)
  {
    $this->tripleAnnotations = $tripleAnnotations;
  }
  /**
   * @return RepositoryWebrefTripleAnnotations
   */
  public function getTripleAnnotations()
  {
    return $this->tripleAnnotations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefEntities::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefEntities');
