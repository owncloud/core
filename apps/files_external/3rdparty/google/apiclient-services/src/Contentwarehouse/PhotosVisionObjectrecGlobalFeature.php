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

class PhotosVisionObjectrecGlobalFeature extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalInfo;
  protected $featureVectorType = PhotosVisionObjectrecFeatureVector::class;
  protected $featureVectorDataType = '';
  protected $quantizedFeatureVectorType = PhotosVisionObjectrecQuantizedFeatureVector::class;
  protected $quantizedFeatureVectorDataType = '';
  /**
   * @var string
   */
  public $tag;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setAdditionalInfo($additionalInfo)
  {
    $this->additionalInfo = $additionalInfo;
  }
  /**
   * @return string
   */
  public function getAdditionalInfo()
  {
    return $this->additionalInfo;
  }
  /**
   * @param PhotosVisionObjectrecFeatureVector
   */
  public function setFeatureVector(PhotosVisionObjectrecFeatureVector $featureVector)
  {
    $this->featureVector = $featureVector;
  }
  /**
   * @return PhotosVisionObjectrecFeatureVector
   */
  public function getFeatureVector()
  {
    return $this->featureVector;
  }
  /**
   * @param PhotosVisionObjectrecQuantizedFeatureVector
   */
  public function setQuantizedFeatureVector(PhotosVisionObjectrecQuantizedFeatureVector $quantizedFeatureVector)
  {
    $this->quantizedFeatureVector = $quantizedFeatureVector;
  }
  /**
   * @return PhotosVisionObjectrecQuantizedFeatureVector
   */
  public function getQuantizedFeatureVector()
  {
    return $this->quantizedFeatureVector;
  }
  /**
   * @param string
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecGlobalFeature::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecGlobalFeature');
