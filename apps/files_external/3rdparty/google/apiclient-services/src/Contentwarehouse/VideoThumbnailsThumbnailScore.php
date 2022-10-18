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

class VideoThumbnailsThumbnailScore extends \Google\Collection
{
  protected $collection_key = 'denseFeatures';
  /**
   * @var string
   */
  public $checksum;
  /**
   * @var string
   */
  public $colorSampling;
  /**
   * @var float[]
   */
  public $denseFeatures;
  protected $denseGeneralExtraFeaturesType = DrishtiFeatureExtra::class;
  protected $denseGeneralExtraFeaturesDataType = '';
  /**
   * @var bool
   */
  public $isAssigned;
  /**
   * @var bool
   */
  public $isInstant;
  /**
   * @var string
   */
  public $modelVersion;
  /**
   * @var string
   */
  public $overwriteReason;
  /**
   * @var string
   */
  public $quantizedFeatures;
  public $score;
  protected $sparseFeaturesType = DrishtiSparseFeatureData::class;
  protected $sparseFeaturesDataType = '';
  /**
   * @var string
   */
  public $thumbnailSet;
  /**
   * @var string
   */
  public $thumbnailVersion;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setChecksum($checksum)
  {
    $this->checksum = $checksum;
  }
  /**
   * @return string
   */
  public function getChecksum()
  {
    return $this->checksum;
  }
  /**
   * @param string
   */
  public function setColorSampling($colorSampling)
  {
    $this->colorSampling = $colorSampling;
  }
  /**
   * @return string
   */
  public function getColorSampling()
  {
    return $this->colorSampling;
  }
  /**
   * @param float[]
   */
  public function setDenseFeatures($denseFeatures)
  {
    $this->denseFeatures = $denseFeatures;
  }
  /**
   * @return float[]
   */
  public function getDenseFeatures()
  {
    return $this->denseFeatures;
  }
  /**
   * @param DrishtiFeatureExtra
   */
  public function setDenseGeneralExtraFeatures(DrishtiFeatureExtra $denseGeneralExtraFeatures)
  {
    $this->denseGeneralExtraFeatures = $denseGeneralExtraFeatures;
  }
  /**
   * @return DrishtiFeatureExtra
   */
  public function getDenseGeneralExtraFeatures()
  {
    return $this->denseGeneralExtraFeatures;
  }
  /**
   * @param bool
   */
  public function setIsAssigned($isAssigned)
  {
    $this->isAssigned = $isAssigned;
  }
  /**
   * @return bool
   */
  public function getIsAssigned()
  {
    return $this->isAssigned;
  }
  /**
   * @param bool
   */
  public function setIsInstant($isInstant)
  {
    $this->isInstant = $isInstant;
  }
  /**
   * @return bool
   */
  public function getIsInstant()
  {
    return $this->isInstant;
  }
  /**
   * @param string
   */
  public function setModelVersion($modelVersion)
  {
    $this->modelVersion = $modelVersion;
  }
  /**
   * @return string
   */
  public function getModelVersion()
  {
    return $this->modelVersion;
  }
  /**
   * @param string
   */
  public function setOverwriteReason($overwriteReason)
  {
    $this->overwriteReason = $overwriteReason;
  }
  /**
   * @return string
   */
  public function getOverwriteReason()
  {
    return $this->overwriteReason;
  }
  /**
   * @param string
   */
  public function setQuantizedFeatures($quantizedFeatures)
  {
    $this->quantizedFeatures = $quantizedFeatures;
  }
  /**
   * @return string
   */
  public function getQuantizedFeatures()
  {
    return $this->quantizedFeatures;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param DrishtiSparseFeatureData
   */
  public function setSparseFeatures(DrishtiSparseFeatureData $sparseFeatures)
  {
    $this->sparseFeatures = $sparseFeatures;
  }
  /**
   * @return DrishtiSparseFeatureData
   */
  public function getSparseFeatures()
  {
    return $this->sparseFeatures;
  }
  /**
   * @param string
   */
  public function setThumbnailSet($thumbnailSet)
  {
    $this->thumbnailSet = $thumbnailSet;
  }
  /**
   * @return string
   */
  public function getThumbnailSet()
  {
    return $this->thumbnailSet;
  }
  /**
   * @param string
   */
  public function setThumbnailVersion($thumbnailVersion)
  {
    $this->thumbnailVersion = $thumbnailVersion;
  }
  /**
   * @return string
   */
  public function getThumbnailVersion()
  {
    return $this->thumbnailVersion;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoThumbnailsThumbnailScore::class, 'Google_Service_Contentwarehouse_VideoThumbnailsThumbnailScore');
