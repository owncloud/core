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

class VideoContentSearchOnScreenTextClusterFeature extends \Google\Model
{
  /**
   * @var float
   */
  public $averageConfidence;
  /**
   * @var float
   */
  public $averageDurationRatio;
  /**
   * @var float
   */
  public $averageHorizontalPosition;
  /**
   * @var float
   */
  public $averageOcrTextLength;
  /**
   * @var float
   */
  public $averageOfAverageTextHeightRatio;
  /**
   * @var float
   */
  public $averageVerticalPosition;
  /**
   * @var float
   */
  public $clusterRatio;
  /**
   * @var int
   */
  public $clusterSize;
  /**
   * @var float
   */
  public $countingNumberRatio;
  protected $durationMsStatsType = VideoContentSearchMetricStats::class;
  protected $durationMsStatsDataType = '';
  /**
   * @var float
   */
  public $frameSizeRatio;
  protected $logOcrTextLengthStatsType = VideoContentSearchMetricStats::class;
  protected $logOcrTextLengthStatsDataType = '';
  protected $logTextHeightRatioStatsType = VideoContentSearchMetricStats::class;
  protected $logTextHeightRatioStatsDataType = '';
  protected $logp1000DurationMsStatsType = VideoContentSearchMetricStats::class;
  protected $logp1000DurationMsStatsDataType = '';
  /**
   * @var float
   */
  public $maxVideoDurationRatioBetweenAnchors;
  /**
   * @var float
   */
  public $maximumDurationRatio;
  /**
   * @var float
   */
  public $medianClusteringDistance;
  /**
   * @var float
   */
  public $medianDurationRatio;
  /**
   * @var float
   */
  public $medianOfAverageTextHeightRatio;
  protected $ocrAsrFeatureType = VideoContentSearchOcrAsrSetFeature::class;
  protected $ocrAsrFeatureDataType = '';
  protected $ocrTextLengthStatsType = VideoContentSearchMetricStats::class;
  protected $ocrTextLengthStatsDataType = '';
  /**
   * @var float
   */
  public $stddevDurationRatio;
  protected $textHeightRatioStatsType = VideoContentSearchMetricStats::class;
  protected $textHeightRatioStatsDataType = '';

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
  public function setAverageDurationRatio($averageDurationRatio)
  {
    $this->averageDurationRatio = $averageDurationRatio;
  }
  /**
   * @return float
   */
  public function getAverageDurationRatio()
  {
    return $this->averageDurationRatio;
  }
  /**
   * @param float
   */
  public function setAverageHorizontalPosition($averageHorizontalPosition)
  {
    $this->averageHorizontalPosition = $averageHorizontalPosition;
  }
  /**
   * @return float
   */
  public function getAverageHorizontalPosition()
  {
    return $this->averageHorizontalPosition;
  }
  /**
   * @param float
   */
  public function setAverageOcrTextLength($averageOcrTextLength)
  {
    $this->averageOcrTextLength = $averageOcrTextLength;
  }
  /**
   * @return float
   */
  public function getAverageOcrTextLength()
  {
    return $this->averageOcrTextLength;
  }
  /**
   * @param float
   */
  public function setAverageOfAverageTextHeightRatio($averageOfAverageTextHeightRatio)
  {
    $this->averageOfAverageTextHeightRatio = $averageOfAverageTextHeightRatio;
  }
  /**
   * @return float
   */
  public function getAverageOfAverageTextHeightRatio()
  {
    return $this->averageOfAverageTextHeightRatio;
  }
  /**
   * @param float
   */
  public function setAverageVerticalPosition($averageVerticalPosition)
  {
    $this->averageVerticalPosition = $averageVerticalPosition;
  }
  /**
   * @return float
   */
  public function getAverageVerticalPosition()
  {
    return $this->averageVerticalPosition;
  }
  /**
   * @param float
   */
  public function setClusterRatio($clusterRatio)
  {
    $this->clusterRatio = $clusterRatio;
  }
  /**
   * @return float
   */
  public function getClusterRatio()
  {
    return $this->clusterRatio;
  }
  /**
   * @param int
   */
  public function setClusterSize($clusterSize)
  {
    $this->clusterSize = $clusterSize;
  }
  /**
   * @return int
   */
  public function getClusterSize()
  {
    return $this->clusterSize;
  }
  /**
   * @param float
   */
  public function setCountingNumberRatio($countingNumberRatio)
  {
    $this->countingNumberRatio = $countingNumberRatio;
  }
  /**
   * @return float
   */
  public function getCountingNumberRatio()
  {
    return $this->countingNumberRatio;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setDurationMsStats(VideoContentSearchMetricStats $durationMsStats)
  {
    $this->durationMsStats = $durationMsStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getDurationMsStats()
  {
    return $this->durationMsStats;
  }
  /**
   * @param float
   */
  public function setFrameSizeRatio($frameSizeRatio)
  {
    $this->frameSizeRatio = $frameSizeRatio;
  }
  /**
   * @return float
   */
  public function getFrameSizeRatio()
  {
    return $this->frameSizeRatio;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setLogOcrTextLengthStats(VideoContentSearchMetricStats $logOcrTextLengthStats)
  {
    $this->logOcrTextLengthStats = $logOcrTextLengthStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getLogOcrTextLengthStats()
  {
    return $this->logOcrTextLengthStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setLogTextHeightRatioStats(VideoContentSearchMetricStats $logTextHeightRatioStats)
  {
    $this->logTextHeightRatioStats = $logTextHeightRatioStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getLogTextHeightRatioStats()
  {
    return $this->logTextHeightRatioStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setLogp1000DurationMsStats(VideoContentSearchMetricStats $logp1000DurationMsStats)
  {
    $this->logp1000DurationMsStats = $logp1000DurationMsStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getLogp1000DurationMsStats()
  {
    return $this->logp1000DurationMsStats;
  }
  /**
   * @param float
   */
  public function setMaxVideoDurationRatioBetweenAnchors($maxVideoDurationRatioBetweenAnchors)
  {
    $this->maxVideoDurationRatioBetweenAnchors = $maxVideoDurationRatioBetweenAnchors;
  }
  /**
   * @return float
   */
  public function getMaxVideoDurationRatioBetweenAnchors()
  {
    return $this->maxVideoDurationRatioBetweenAnchors;
  }
  /**
   * @param float
   */
  public function setMaximumDurationRatio($maximumDurationRatio)
  {
    $this->maximumDurationRatio = $maximumDurationRatio;
  }
  /**
   * @return float
   */
  public function getMaximumDurationRatio()
  {
    return $this->maximumDurationRatio;
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
   * @param float
   */
  public function setMedianDurationRatio($medianDurationRatio)
  {
    $this->medianDurationRatio = $medianDurationRatio;
  }
  /**
   * @return float
   */
  public function getMedianDurationRatio()
  {
    return $this->medianDurationRatio;
  }
  /**
   * @param float
   */
  public function setMedianOfAverageTextHeightRatio($medianOfAverageTextHeightRatio)
  {
    $this->medianOfAverageTextHeightRatio = $medianOfAverageTextHeightRatio;
  }
  /**
   * @return float
   */
  public function getMedianOfAverageTextHeightRatio()
  {
    return $this->medianOfAverageTextHeightRatio;
  }
  /**
   * @param VideoContentSearchOcrAsrSetFeature
   */
  public function setOcrAsrFeature(VideoContentSearchOcrAsrSetFeature $ocrAsrFeature)
  {
    $this->ocrAsrFeature = $ocrAsrFeature;
  }
  /**
   * @return VideoContentSearchOcrAsrSetFeature
   */
  public function getOcrAsrFeature()
  {
    return $this->ocrAsrFeature;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setOcrTextLengthStats(VideoContentSearchMetricStats $ocrTextLengthStats)
  {
    $this->ocrTextLengthStats = $ocrTextLengthStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getOcrTextLengthStats()
  {
    return $this->ocrTextLengthStats;
  }
  /**
   * @param float
   */
  public function setStddevDurationRatio($stddevDurationRatio)
  {
    $this->stddevDurationRatio = $stddevDurationRatio;
  }
  /**
   * @return float
   */
  public function getStddevDurationRatio()
  {
    return $this->stddevDurationRatio;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setTextHeightRatioStats(VideoContentSearchMetricStats $textHeightRatioStats)
  {
    $this->textHeightRatioStats = $textHeightRatioStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getTextHeightRatioStats()
  {
    return $this->textHeightRatioStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOnScreenTextClusterFeature::class, 'Google_Service_Contentwarehouse_VideoContentSearchOnScreenTextClusterFeature');
