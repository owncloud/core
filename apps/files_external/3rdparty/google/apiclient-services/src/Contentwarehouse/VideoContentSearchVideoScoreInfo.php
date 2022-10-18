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

class VideoContentSearchVideoScoreInfo extends \Google\Model
{
  protected $commonFeaturesType = VideoContentSearchVideoCommonFeatures::class;
  protected $commonFeaturesDataType = '';
  protected $ocrVideoFeatureType = VideoContentSearchOcrVideoFeature::class;
  protected $ocrVideoFeatureDataType = '';
  protected $safeSearchClassifierOutputType = ClassifierPornQueryMultiLabelClassifierOutput::class;
  protected $safeSearchClassifierOutputDataType = '';
  /**
   * @var string
   */
  public $version;
  protected $videoGeneratedQueryFeaturesType = VideoContentSearchVideoGeneratedQueryFeatures::class;
  protected $videoGeneratedQueryFeaturesDataType = '';
  protected $videoMultimodalTopicFeaturesType = VideoContentSearchVideoMultimodalTopicFeatures::class;
  protected $videoMultimodalTopicFeaturesDataType = '';

  /**
   * @param VideoContentSearchVideoCommonFeatures
   */
  public function setCommonFeatures(VideoContentSearchVideoCommonFeatures $commonFeatures)
  {
    $this->commonFeatures = $commonFeatures;
  }
  /**
   * @return VideoContentSearchVideoCommonFeatures
   */
  public function getCommonFeatures()
  {
    return $this->commonFeatures;
  }
  /**
   * @param VideoContentSearchOcrVideoFeature
   */
  public function setOcrVideoFeature(VideoContentSearchOcrVideoFeature $ocrVideoFeature)
  {
    $this->ocrVideoFeature = $ocrVideoFeature;
  }
  /**
   * @return VideoContentSearchOcrVideoFeature
   */
  public function getOcrVideoFeature()
  {
    return $this->ocrVideoFeature;
  }
  /**
   * @param ClassifierPornQueryMultiLabelClassifierOutput
   */
  public function setSafeSearchClassifierOutput(ClassifierPornQueryMultiLabelClassifierOutput $safeSearchClassifierOutput)
  {
    $this->safeSearchClassifierOutput = $safeSearchClassifierOutput;
  }
  /**
   * @return ClassifierPornQueryMultiLabelClassifierOutput
   */
  public function getSafeSearchClassifierOutput()
  {
    return $this->safeSearchClassifierOutput;
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
  /**
   * @param VideoContentSearchVideoGeneratedQueryFeatures
   */
  public function setVideoGeneratedQueryFeatures(VideoContentSearchVideoGeneratedQueryFeatures $videoGeneratedQueryFeatures)
  {
    $this->videoGeneratedQueryFeatures = $videoGeneratedQueryFeatures;
  }
  /**
   * @return VideoContentSearchVideoGeneratedQueryFeatures
   */
  public function getVideoGeneratedQueryFeatures()
  {
    return $this->videoGeneratedQueryFeatures;
  }
  /**
   * @param VideoContentSearchVideoMultimodalTopicFeatures
   */
  public function setVideoMultimodalTopicFeatures(VideoContentSearchVideoMultimodalTopicFeatures $videoMultimodalTopicFeatures)
  {
    $this->videoMultimodalTopicFeatures = $videoMultimodalTopicFeatures;
  }
  /**
   * @return VideoContentSearchVideoMultimodalTopicFeatures
   */
  public function getVideoMultimodalTopicFeatures()
  {
    return $this->videoMultimodalTopicFeatures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoScoreInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoScoreInfo');
