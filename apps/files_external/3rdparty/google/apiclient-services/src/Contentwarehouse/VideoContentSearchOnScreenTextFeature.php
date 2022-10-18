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

class VideoContentSearchOnScreenTextFeature extends \Google\Collection
{
  protected $collection_key = 'languages';
  /**
   * @var float
   */
  public $averageAngle;
  /**
   * @var float
   */
  public $averageConfidence;
  /**
   * @var float
   */
  public $averageFontsize;
  /**
   * @var float
   */
  public $averageFontweight;
  /**
   * @var float
   */
  public $averageHeightRatio;
  /**
   * @var float
   */
  public $backgroundBlue;
  /**
   * @var float
   */
  public $backgroundGray;
  /**
   * @var float
   */
  public $backgroundGreen;
  /**
   * @var float
   */
  public $backgroundRed;
  /**
   * @var float
   */
  public $boxHeightRatio;
  /**
   * @var float
   */
  public $boxWidthRatio;
  /**
   * @var float
   */
  public $centerHorizontalPositionRatio;
  /**
   * @var float
   */
  public $centerVerticalPositionRatio;
  /**
   * @var int
   */
  public $countingNumber;
  /**
   * @var float
   */
  public $countingNumberOooRatio;
  /**
   * @var string
   */
  public $countingNumberPrefix;
  /**
   * @var string
   */
  public $countingNumberSuffix;
  /**
   * @var int
   */
  public $durationMs;
  /**
   * @var float
   */
  public $foregroundBlue;
  /**
   * @var float
   */
  public $foregroundGray;
  /**
   * @var float
   */
  public $foregroundGreen;
  /**
   * @var float
   */
  public $foregroundRed;
  /**
   * @var bool
   */
  public $hadUrlInLabel;
  /**
   * @var float
   */
  public $handwrittenTextRatio;
  /**
   * @var bool
   */
  public $isCountingNumberOoo;
  protected $languagesType = GoodocLanguageCombinationLanguage::class;
  protected $languagesDataType = 'array';
  /**
   * @var float
   */
  public $leftPositionRatio;
  /**
   * @var float
   */
  public $medianClusteringDistance;
  /**
   * @var int
   */
  public $mergedLineCount;
  /**
   * @var float
   */
  public $occurrenceCount;
  /**
   * @var float
   */
  public $occurrenceRatio;
  protected $ocrAsrFeatureType = VideoContentSearchOcrAsrFeature::class;
  protected $ocrAsrFeatureDataType = '';
  /**
   * @var string
   */
  public $originalLabel;
  /**
   * @var int
   */
  public $relativeShotTimeMsPosteriorToEndTime;
  /**
   * @var int
   */
  public $relativeShotTimeMsPosteriorToStartTime;
  /**
   * @var int
   */
  public $relativeShotTimeMsPriorToEndTime;
  /**
   * @var int
   */
  public $relativeShotTimeMsPriorToStartTime;
  /**
   * @var int
   */
  public $shotInfoCountDuringText;
  /**
   * @var string
   */
  public $topOcrLanguage;
  /**
   * @var float
   */
  public $topPositionRatio;

  /**
   * @param float
   */
  public function setAverageAngle($averageAngle)
  {
    $this->averageAngle = $averageAngle;
  }
  /**
   * @return float
   */
  public function getAverageAngle()
  {
    return $this->averageAngle;
  }
  /**
   * @param float
   */
  public function setAverageConfidence($averageConfidence)
  {
    $this->averageConfidence = $averageConfidence;
  }
  /**
   * @return float
   */
  public function getAverageConfidence()
  {
    return $this->averageConfidence;
  }
  /**
   * @param float
   */
  public function setAverageFontsize($averageFontsize)
  {
    $this->averageFontsize = $averageFontsize;
  }
  /**
   * @return float
   */
  public function getAverageFontsize()
  {
    return $this->averageFontsize;
  }
  /**
   * @param float
   */
  public function setAverageFontweight($averageFontweight)
  {
    $this->averageFontweight = $averageFontweight;
  }
  /**
   * @return float
   */
  public function getAverageFontweight()
  {
    return $this->averageFontweight;
  }
  /**
   * @param float
   */
  public function setAverageHeightRatio($averageHeightRatio)
  {
    $this->averageHeightRatio = $averageHeightRatio;
  }
  /**
   * @return float
   */
  public function getAverageHeightRatio()
  {
    return $this->averageHeightRatio;
  }
  /**
   * @param float
   */
  public function setBackgroundBlue($backgroundBlue)
  {
    $this->backgroundBlue = $backgroundBlue;
  }
  /**
   * @return float
   */
  public function getBackgroundBlue()
  {
    return $this->backgroundBlue;
  }
  /**
   * @param float
   */
  public function setBackgroundGray($backgroundGray)
  {
    $this->backgroundGray = $backgroundGray;
  }
  /**
   * @return float
   */
  public function getBackgroundGray()
  {
    return $this->backgroundGray;
  }
  /**
   * @param float
   */
  public function setBackgroundGreen($backgroundGreen)
  {
    $this->backgroundGreen = $backgroundGreen;
  }
  /**
   * @return float
   */
  public function getBackgroundGreen()
  {
    return $this->backgroundGreen;
  }
  /**
   * @param float
   */
  public function setBackgroundRed($backgroundRed)
  {
    $this->backgroundRed = $backgroundRed;
  }
  /**
   * @return float
   */
  public function getBackgroundRed()
  {
    return $this->backgroundRed;
  }
  /**
   * @param float
   */
  public function setBoxHeightRatio($boxHeightRatio)
  {
    $this->boxHeightRatio = $boxHeightRatio;
  }
  /**
   * @return float
   */
  public function getBoxHeightRatio()
  {
    return $this->boxHeightRatio;
  }
  /**
   * @param float
   */
  public function setBoxWidthRatio($boxWidthRatio)
  {
    $this->boxWidthRatio = $boxWidthRatio;
  }
  /**
   * @return float
   */
  public function getBoxWidthRatio()
  {
    return $this->boxWidthRatio;
  }
  /**
   * @param float
   */
  public function setCenterHorizontalPositionRatio($centerHorizontalPositionRatio)
  {
    $this->centerHorizontalPositionRatio = $centerHorizontalPositionRatio;
  }
  /**
   * @return float
   */
  public function getCenterHorizontalPositionRatio()
  {
    return $this->centerHorizontalPositionRatio;
  }
  /**
   * @param float
   */
  public function setCenterVerticalPositionRatio($centerVerticalPositionRatio)
  {
    $this->centerVerticalPositionRatio = $centerVerticalPositionRatio;
  }
  /**
   * @return float
   */
  public function getCenterVerticalPositionRatio()
  {
    return $this->centerVerticalPositionRatio;
  }
  /**
   * @param int
   */
  public function setCountingNumber($countingNumber)
  {
    $this->countingNumber = $countingNumber;
  }
  /**
   * @return int
   */
  public function getCountingNumber()
  {
    return $this->countingNumber;
  }
  /**
   * @param float
   */
  public function setCountingNumberOooRatio($countingNumberOooRatio)
  {
    $this->countingNumberOooRatio = $countingNumberOooRatio;
  }
  /**
   * @return float
   */
  public function getCountingNumberOooRatio()
  {
    return $this->countingNumberOooRatio;
  }
  /**
   * @param string
   */
  public function setCountingNumberPrefix($countingNumberPrefix)
  {
    $this->countingNumberPrefix = $countingNumberPrefix;
  }
  /**
   * @return string
   */
  public function getCountingNumberPrefix()
  {
    return $this->countingNumberPrefix;
  }
  /**
   * @param string
   */
  public function setCountingNumberSuffix($countingNumberSuffix)
  {
    $this->countingNumberSuffix = $countingNumberSuffix;
  }
  /**
   * @return string
   */
  public function getCountingNumberSuffix()
  {
    return $this->countingNumberSuffix;
  }
  /**
   * @param int
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return int
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  /**
   * @param float
   */
  public function setForegroundBlue($foregroundBlue)
  {
    $this->foregroundBlue = $foregroundBlue;
  }
  /**
   * @return float
   */
  public function getForegroundBlue()
  {
    return $this->foregroundBlue;
  }
  /**
   * @param float
   */
  public function setForegroundGray($foregroundGray)
  {
    $this->foregroundGray = $foregroundGray;
  }
  /**
   * @return float
   */
  public function getForegroundGray()
  {
    return $this->foregroundGray;
  }
  /**
   * @param float
   */
  public function setForegroundGreen($foregroundGreen)
  {
    $this->foregroundGreen = $foregroundGreen;
  }
  /**
   * @return float
   */
  public function getForegroundGreen()
  {
    return $this->foregroundGreen;
  }
  /**
   * @param float
   */
  public function setForegroundRed($foregroundRed)
  {
    $this->foregroundRed = $foregroundRed;
  }
  /**
   * @return float
   */
  public function getForegroundRed()
  {
    return $this->foregroundRed;
  }
  /**
   * @param bool
   */
  public function setHadUrlInLabel($hadUrlInLabel)
  {
    $this->hadUrlInLabel = $hadUrlInLabel;
  }
  /**
   * @return bool
   */
  public function getHadUrlInLabel()
  {
    return $this->hadUrlInLabel;
  }
  /**
   * @param float
   */
  public function setHandwrittenTextRatio($handwrittenTextRatio)
  {
    $this->handwrittenTextRatio = $handwrittenTextRatio;
  }
  /**
   * @return float
   */
  public function getHandwrittenTextRatio()
  {
    return $this->handwrittenTextRatio;
  }
  /**
   * @param bool
   */
  public function setIsCountingNumberOoo($isCountingNumberOoo)
  {
    $this->isCountingNumberOoo = $isCountingNumberOoo;
  }
  /**
   * @return bool
   */
  public function getIsCountingNumberOoo()
  {
    return $this->isCountingNumberOoo;
  }
  /**
   * @param GoodocLanguageCombinationLanguage[]
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return GoodocLanguageCombinationLanguage[]
   */
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param float
   */
  public function setLeftPositionRatio($leftPositionRatio)
  {
    $this->leftPositionRatio = $leftPositionRatio;
  }
  /**
   * @return float
   */
  public function getLeftPositionRatio()
  {
    return $this->leftPositionRatio;
  }
  /**
   * @param float
   */
  public function setMedianClusteringDistance($medianClusteringDistance)
  {
    $this->medianClusteringDistance = $medianClusteringDistance;
  }
  /**
   * @return float
   */
  public function getMedianClusteringDistance()
  {
    return $this->medianClusteringDistance;
  }
  /**
   * @param int
   */
  public function setMergedLineCount($mergedLineCount)
  {
    $this->mergedLineCount = $mergedLineCount;
  }
  /**
   * @return int
   */
  public function getMergedLineCount()
  {
    return $this->mergedLineCount;
  }
  /**
   * @param float
   */
  public function setOccurrenceCount($occurrenceCount)
  {
    $this->occurrenceCount = $occurrenceCount;
  }
  /**
   * @return float
   */
  public function getOccurrenceCount()
  {
    return $this->occurrenceCount;
  }
  /**
   * @param float
   */
  public function setOccurrenceRatio($occurrenceRatio)
  {
    $this->occurrenceRatio = $occurrenceRatio;
  }
  /**
   * @return float
   */
  public function getOccurrenceRatio()
  {
    return $this->occurrenceRatio;
  }
  /**
   * @param VideoContentSearchOcrAsrFeature
   */
  public function setOcrAsrFeature(VideoContentSearchOcrAsrFeature $ocrAsrFeature)
  {
    $this->ocrAsrFeature = $ocrAsrFeature;
  }
  /**
   * @return VideoContentSearchOcrAsrFeature
   */
  public function getOcrAsrFeature()
  {
    return $this->ocrAsrFeature;
  }
  /**
   * @param string
   */
  public function setOriginalLabel($originalLabel)
  {
    $this->originalLabel = $originalLabel;
  }
  /**
   * @return string
   */
  public function getOriginalLabel()
  {
    return $this->originalLabel;
  }
  /**
   * @param int
   */
  public function setRelativeShotTimeMsPosteriorToEndTime($relativeShotTimeMsPosteriorToEndTime)
  {
    $this->relativeShotTimeMsPosteriorToEndTime = $relativeShotTimeMsPosteriorToEndTime;
  }
  /**
   * @return int
   */
  public function getRelativeShotTimeMsPosteriorToEndTime()
  {
    return $this->relativeShotTimeMsPosteriorToEndTime;
  }
  /**
   * @param int
   */
  public function setRelativeShotTimeMsPosteriorToStartTime($relativeShotTimeMsPosteriorToStartTime)
  {
    $this->relativeShotTimeMsPosteriorToStartTime = $relativeShotTimeMsPosteriorToStartTime;
  }
  /**
   * @return int
   */
  public function getRelativeShotTimeMsPosteriorToStartTime()
  {
    return $this->relativeShotTimeMsPosteriorToStartTime;
  }
  /**
   * @param int
   */
  public function setRelativeShotTimeMsPriorToEndTime($relativeShotTimeMsPriorToEndTime)
  {
    $this->relativeShotTimeMsPriorToEndTime = $relativeShotTimeMsPriorToEndTime;
  }
  /**
   * @return int
   */
  public function getRelativeShotTimeMsPriorToEndTime()
  {
    return $this->relativeShotTimeMsPriorToEndTime;
  }
  /**
   * @param int
   */
  public function setRelativeShotTimeMsPriorToStartTime($relativeShotTimeMsPriorToStartTime)
  {
    $this->relativeShotTimeMsPriorToStartTime = $relativeShotTimeMsPriorToStartTime;
  }
  /**
   * @return int
   */
  public function getRelativeShotTimeMsPriorToStartTime()
  {
    return $this->relativeShotTimeMsPriorToStartTime;
  }
  /**
   * @param int
   */
  public function setShotInfoCountDuringText($shotInfoCountDuringText)
  {
    $this->shotInfoCountDuringText = $shotInfoCountDuringText;
  }
  /**
   * @return int
   */
  public function getShotInfoCountDuringText()
  {
    return $this->shotInfoCountDuringText;
  }
  /**
   * @param string
   */
  public function setTopOcrLanguage($topOcrLanguage)
  {
    $this->topOcrLanguage = $topOcrLanguage;
  }
  /**
   * @return string
   */
  public function getTopOcrLanguage()
  {
    return $this->topOcrLanguage;
  }
  /**
   * @param float
   */
  public function setTopPositionRatio($topPositionRatio)
  {
    $this->topPositionRatio = $topPositionRatio;
  }
  /**
   * @return float
   */
  public function getTopPositionRatio()
  {
    return $this->topPositionRatio;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOnScreenTextFeature::class, 'Google_Service_Contentwarehouse_VideoContentSearchOnScreenTextFeature');
