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

class ResearchScamGenericFeatureVector extends \Google\Collection
{
  protected $collection_key = 'tokens';
  /**
   * @var string
   */
  public $classLabel;
  protected $crowdingType = ResearchScamGenericFeatureVectorCrowding::class;
  protected $crowdingDataType = '';
  /**
   * @var string
   */
  public $dataIdStr;
  /**
   * @var string
   */
  public $expirationTimestamp;
  /**
   * @var string
   */
  public $featureDim;
  /**
   * @var string[]
   */
  public $featureIndex;
  /**
   * @var string
   */
  public $featureType;
  public $featureValueDouble;
  /**
   * @var float[]
   */
  public $featureValueFloat;
  /**
   * @var string[]
   */
  public $featureValueInt64;
  /**
   * @var string
   */
  public $featureValueString;
  protected $fixedPointMetadataType = ResearchScamGenericFeatureVectorFixedPointMetadata::class;
  protected $fixedPointMetadataDataType = '';
  /**
   * @var string
   */
  public $normType;
  protected $queryMetadataType = ResearchScamQueryMetadata::class;
  protected $queryMetadataDataType = '';
  protected $restrictTokensType = ResearchScamGenericFeatureVectorRestrictTokens::class;
  protected $restrictTokensDataType = '';
  /**
   * @var int[]
   */
  public $tokens;
  /**
   * @var string
   */
  public $userinfo;
  /**
   * @var float
   */
  public $weight;

  /**
   * @param string
   */
  public function setClassLabel($classLabel)
  {
    $this->classLabel = $classLabel;
  }
  /**
   * @return string
   */
  public function getClassLabel()
  {
    return $this->classLabel;
  }
  /**
   * @param ResearchScamGenericFeatureVectorCrowding
   */
  public function setCrowding(ResearchScamGenericFeatureVectorCrowding $crowding)
  {
    $this->crowding = $crowding;
  }
  /**
   * @return ResearchScamGenericFeatureVectorCrowding
   */
  public function getCrowding()
  {
    return $this->crowding;
  }
  /**
   * @param string
   */
  public function setDataIdStr($dataIdStr)
  {
    $this->dataIdStr = $dataIdStr;
  }
  /**
   * @return string
   */
  public function getDataIdStr()
  {
    return $this->dataIdStr;
  }
  /**
   * @param string
   */
  public function setExpirationTimestamp($expirationTimestamp)
  {
    $this->expirationTimestamp = $expirationTimestamp;
  }
  /**
   * @return string
   */
  public function getExpirationTimestamp()
  {
    return $this->expirationTimestamp;
  }
  /**
   * @param string
   */
  public function setFeatureDim($featureDim)
  {
    $this->featureDim = $featureDim;
  }
  /**
   * @return string
   */
  public function getFeatureDim()
  {
    return $this->featureDim;
  }
  /**
   * @param string[]
   */
  public function setFeatureIndex($featureIndex)
  {
    $this->featureIndex = $featureIndex;
  }
  /**
   * @return string[]
   */
  public function getFeatureIndex()
  {
    return $this->featureIndex;
  }
  /**
   * @param string
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return string
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  public function setFeatureValueDouble($featureValueDouble)
  {
    $this->featureValueDouble = $featureValueDouble;
  }
  public function getFeatureValueDouble()
  {
    return $this->featureValueDouble;
  }
  /**
   * @param float[]
   */
  public function setFeatureValueFloat($featureValueFloat)
  {
    $this->featureValueFloat = $featureValueFloat;
  }
  /**
   * @return float[]
   */
  public function getFeatureValueFloat()
  {
    return $this->featureValueFloat;
  }
  /**
   * @param string[]
   */
  public function setFeatureValueInt64($featureValueInt64)
  {
    $this->featureValueInt64 = $featureValueInt64;
  }
  /**
   * @return string[]
   */
  public function getFeatureValueInt64()
  {
    return $this->featureValueInt64;
  }
  /**
   * @param string
   */
  public function setFeatureValueString($featureValueString)
  {
    $this->featureValueString = $featureValueString;
  }
  /**
   * @return string
   */
  public function getFeatureValueString()
  {
    return $this->featureValueString;
  }
  /**
   * @param ResearchScamGenericFeatureVectorFixedPointMetadata
   */
  public function setFixedPointMetadata(ResearchScamGenericFeatureVectorFixedPointMetadata $fixedPointMetadata)
  {
    $this->fixedPointMetadata = $fixedPointMetadata;
  }
  /**
   * @return ResearchScamGenericFeatureVectorFixedPointMetadata
   */
  public function getFixedPointMetadata()
  {
    return $this->fixedPointMetadata;
  }
  /**
   * @param string
   */
  public function setNormType($normType)
  {
    $this->normType = $normType;
  }
  /**
   * @return string
   */
  public function getNormType()
  {
    return $this->normType;
  }
  /**
   * @param ResearchScamQueryMetadata
   */
  public function setQueryMetadata(ResearchScamQueryMetadata $queryMetadata)
  {
    $this->queryMetadata = $queryMetadata;
  }
  /**
   * @return ResearchScamQueryMetadata
   */
  public function getQueryMetadata()
  {
    return $this->queryMetadata;
  }
  /**
   * @param ResearchScamGenericFeatureVectorRestrictTokens
   */
  public function setRestrictTokens(ResearchScamGenericFeatureVectorRestrictTokens $restrictTokens)
  {
    $this->restrictTokens = $restrictTokens;
  }
  /**
   * @return ResearchScamGenericFeatureVectorRestrictTokens
   */
  public function getRestrictTokens()
  {
    return $this->restrictTokens;
  }
  /**
   * @param int[]
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return int[]
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param string
   */
  public function setUserinfo($userinfo)
  {
    $this->userinfo = $userinfo;
  }
  /**
   * @return string
   */
  public function getUserinfo()
  {
    return $this->userinfo;
  }
  /**
   * @param float
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamGenericFeatureVector::class, 'Google_Service_Contentwarehouse_ResearchScamGenericFeatureVector');
