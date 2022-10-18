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

class VideoContentSearchCaptionLabelFeatures extends \Google\Collection
{
  protected $collection_key = 'alignedOcrTexts';
  protected $alignedOcrTextsType = VideoContentSearchOCRText::class;
  protected $alignedOcrTextsDataType = 'array';
  /**
   * @var string
   */
  public $alignedTime;
  /**
   * @var string
   */
  public $contextText;
  /**
   * @var string
   */
  public $labelText;
  protected $textSimilarityFeaturesType = VideoContentSearchTextSimilarityFeatures::class;
  protected $textSimilarityFeaturesDataType = '';
  /**
   * @var string
   */
  public $textSpanAtAlignedTime;

  /**
   * @param VideoContentSearchOCRText[]
   */
  public function setAlignedOcrTexts($alignedOcrTexts)
  {
    $this->alignedOcrTexts = $alignedOcrTexts;
  }
  /**
   * @return VideoContentSearchOCRText[]
   */
  public function getAlignedOcrTexts()
  {
    return $this->alignedOcrTexts;
  }
  /**
   * @param string
   */
  public function setAlignedTime($alignedTime)
  {
    $this->alignedTime = $alignedTime;
  }
  /**
   * @return string
   */
  public function getAlignedTime()
  {
    return $this->alignedTime;
  }
  /**
   * @param string
   */
  public function setContextText($contextText)
  {
    $this->contextText = $contextText;
  }
  /**
   * @return string
   */
  public function getContextText()
  {
    return $this->contextText;
  }
  /**
   * @param string
   */
  public function setLabelText($labelText)
  {
    $this->labelText = $labelText;
  }
  /**
   * @return string
   */
  public function getLabelText()
  {
    return $this->labelText;
  }
  /**
   * @param VideoContentSearchTextSimilarityFeatures
   */
  public function setTextSimilarityFeatures(VideoContentSearchTextSimilarityFeatures $textSimilarityFeatures)
  {
    $this->textSimilarityFeatures = $textSimilarityFeatures;
  }
  /**
   * @return VideoContentSearchTextSimilarityFeatures
   */
  public function getTextSimilarityFeatures()
  {
    return $this->textSimilarityFeatures;
  }
  /**
   * @param string
   */
  public function setTextSpanAtAlignedTime($textSpanAtAlignedTime)
  {
    $this->textSpanAtAlignedTime = $textSpanAtAlignedTime;
  }
  /**
   * @return string
   */
  public function getTextSpanAtAlignedTime()
  {
    return $this->textSpanAtAlignedTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCaptionLabelFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchCaptionLabelFeatures');
