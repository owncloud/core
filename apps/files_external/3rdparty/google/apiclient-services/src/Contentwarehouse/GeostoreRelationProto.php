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

class GeostoreRelationProto extends \Google\Collection
{
  protected $collection_key = 'otherFeatureName';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $otherFeatureCountryCode;
  protected $otherFeatureIdType = GeostoreFeatureIdProto::class;
  protected $otherFeatureIdDataType = '';
  protected $otherFeatureNameType = GeostoreNameProto::class;
  protected $otherFeatureNameDataType = 'array';
  /**
   * @var string
   */
  public $otherFeatureTerritorialAdministrator;
  /**
   * @var int
   */
  public $otherFeatureType;
  /**
   * @var float
   */
  public $overlapFraction;
  /**
   * @var string
   */
  public $relation;
  /**
   * @var bool
   */
  public $relationIsReversed;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';

  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setOtherFeatureCountryCode($otherFeatureCountryCode)
  {
    $this->otherFeatureCountryCode = $otherFeatureCountryCode;
  }
  /**
   * @return string
   */
  public function getOtherFeatureCountryCode()
  {
    return $this->otherFeatureCountryCode;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setOtherFeatureId(GeostoreFeatureIdProto $otherFeatureId)
  {
    $this->otherFeatureId = $otherFeatureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOtherFeatureId()
  {
    return $this->otherFeatureId;
  }
  /**
   * @param GeostoreNameProto[]
   */
  public function setOtherFeatureName($otherFeatureName)
  {
    $this->otherFeatureName = $otherFeatureName;
  }
  /**
   * @return GeostoreNameProto[]
   */
  public function getOtherFeatureName()
  {
    return $this->otherFeatureName;
  }
  /**
   * @param string
   */
  public function setOtherFeatureTerritorialAdministrator($otherFeatureTerritorialAdministrator)
  {
    $this->otherFeatureTerritorialAdministrator = $otherFeatureTerritorialAdministrator;
  }
  /**
   * @return string
   */
  public function getOtherFeatureTerritorialAdministrator()
  {
    return $this->otherFeatureTerritorialAdministrator;
  }
  /**
   * @param int
   */
  public function setOtherFeatureType($otherFeatureType)
  {
    $this->otherFeatureType = $otherFeatureType;
  }
  /**
   * @return int
   */
  public function getOtherFeatureType()
  {
    return $this->otherFeatureType;
  }
  /**
   * @param float
   */
  public function setOverlapFraction($overlapFraction)
  {
    $this->overlapFraction = $overlapFraction;
  }
  /**
   * @return float
   */
  public function getOverlapFraction()
  {
    return $this->overlapFraction;
  }
  /**
   * @param string
   */
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  /**
   * @return string
   */
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param bool
   */
  public function setRelationIsReversed($relationIsReversed)
  {
    $this->relationIsReversed = $relationIsReversed;
  }
  /**
   * @return bool
   */
  public function getRelationIsReversed()
  {
    return $this->relationIsReversed;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRelationProto::class, 'Google_Service_Contentwarehouse_GeostoreRelationProto');
