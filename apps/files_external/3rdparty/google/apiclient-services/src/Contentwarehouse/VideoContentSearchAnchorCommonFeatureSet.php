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

class VideoContentSearchAnchorCommonFeatureSet extends \Google\Collection
{
  protected $collection_key = 'timestamp';
  /**
   * @var float
   */
  public $anchorQbstDistance;
  protected $bleurtFeaturesType = VideoContentSearchBleurtFeatures::class;
  protected $bleurtFeaturesDataType = '';
  /**
   * @var float
   */
  public $bleurtScore;
  /**
   * @var float
   */
  public $descartesScoreWithTitle;
  /**
   * @var float
   */
  public $dolphinDescriptivenessScore;
  protected $dolphinEnsembleScoreType = VideoContentSearchDolphinEnsembleScore::class;
  protected $dolphinEnsembleScoreDataType = 'array';
  protected $dolphinFeaturesType = VideoContentSearchDolphinFeatures::class;
  protected $dolphinFeaturesDataType = '';
  /**
   * @var float
   */
  public $dolphinScore;
  /**
   * @var float
   */
  public $dolphinUsefulnessScore;
  /**
   * @var float[]
   */
  public $labelPhraseEmbedding;
  /**
   * @var float
   */
  public $mumDescriptivenessScore;
  /**
   * @var float
   */
  public $mumUsefulnessScore;
  /**
   * @var float
   */
  public $retentionScore;
  protected $saftDocumentType = NlpSaftDocument::class;
  protected $saftDocumentDataType = '';
  protected $timedLabelFeaturesType = VideoContentSearchCaptionLabelFeatures::class;
  protected $timedLabelFeaturesDataType = 'array';
  protected $timestampType = VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp::class;
  protected $timestampDataType = 'array';
  /**
   * @var float
   */
  public $titleAnchorBabelMatchScore;

  /**
   * @param float
   */
  public function setAnchorQbstDistance($anchorQbstDistance)
  {
    $this->anchorQbstDistance = $anchorQbstDistance;
  }
  /**
   * @return float
   */
  public function getAnchorQbstDistance()
  {
    return $this->anchorQbstDistance;
  }
  /**
   * @param VideoContentSearchBleurtFeatures
   */
  public function setBleurtFeatures(VideoContentSearchBleurtFeatures $bleurtFeatures)
  {
    $this->bleurtFeatures = $bleurtFeatures;
  }
  /**
   * @return VideoContentSearchBleurtFeatures
   */
  public function getBleurtFeatures()
  {
    return $this->bleurtFeatures;
  }
  /**
   * @param float
   */
  public function setBleurtScore($bleurtScore)
  {
    $this->bleurtScore = $bleurtScore;
  }
  /**
   * @return float
   */
  public function getBleurtScore()
  {
    return $this->bleurtScore;
  }
  /**
   * @param float
   */
  public function setDescartesScoreWithTitle($descartesScoreWithTitle)
  {
    $this->descartesScoreWithTitle = $descartesScoreWithTitle;
  }
  /**
   * @return float
   */
  public function getDescartesScoreWithTitle()
  {
    return $this->descartesScoreWithTitle;
  }
  /**
   * @param float
   */
  public function setDolphinDescriptivenessScore($dolphinDescriptivenessScore)
  {
    $this->dolphinDescriptivenessScore = $dolphinDescriptivenessScore;
  }
  /**
   * @return float
   */
  public function getDolphinDescriptivenessScore()
  {
    return $this->dolphinDescriptivenessScore;
  }
  /**
   * @param VideoContentSearchDolphinEnsembleScore[]
   */
  public function setDolphinEnsembleScore($dolphinEnsembleScore)
  {
    $this->dolphinEnsembleScore = $dolphinEnsembleScore;
  }
  /**
   * @return VideoContentSearchDolphinEnsembleScore[]
   */
  public function getDolphinEnsembleScore()
  {
    return $this->dolphinEnsembleScore;
  }
  /**
   * @param VideoContentSearchDolphinFeatures
   */
  public function setDolphinFeatures(VideoContentSearchDolphinFeatures $dolphinFeatures)
  {
    $this->dolphinFeatures = $dolphinFeatures;
  }
  /**
   * @return VideoContentSearchDolphinFeatures
   */
  public function getDolphinFeatures()
  {
    return $this->dolphinFeatures;
  }
  /**
   * @param float
   */
  public function setDolphinScore($dolphinScore)
  {
    $this->dolphinScore = $dolphinScore;
  }
  /**
   * @return float
   */
  public function getDolphinScore()
  {
    return $this->dolphinScore;
  }
  /**
   * @param float
   */
  public function setDolphinUsefulnessScore($dolphinUsefulnessScore)
  {
    $this->dolphinUsefulnessScore = $dolphinUsefulnessScore;
  }
  /**
   * @return float
   */
  public function getDolphinUsefulnessScore()
  {
    return $this->dolphinUsefulnessScore;
  }
  /**
   * @param float[]
   */
  public function setLabelPhraseEmbedding($labelPhraseEmbedding)
  {
    $this->labelPhraseEmbedding = $labelPhraseEmbedding;
  }
  /**
   * @return float[]
   */
  public function getLabelPhraseEmbedding()
  {
    return $this->labelPhraseEmbedding;
  }
  /**
   * @param float
   */
  public function setMumDescriptivenessScore($mumDescriptivenessScore)
  {
    $this->mumDescriptivenessScore = $mumDescriptivenessScore;
  }
  /**
   * @return float
   */
  public function getMumDescriptivenessScore()
  {
    return $this->mumDescriptivenessScore;
  }
  /**
   * @param float
   */
  public function setMumUsefulnessScore($mumUsefulnessScore)
  {
    $this->mumUsefulnessScore = $mumUsefulnessScore;
  }
  /**
   * @return float
   */
  public function getMumUsefulnessScore()
  {
    return $this->mumUsefulnessScore;
  }
  /**
   * @param float
   */
  public function setRetentionScore($retentionScore)
  {
    $this->retentionScore = $retentionScore;
  }
  /**
   * @return float
   */
  public function getRetentionScore()
  {
    return $this->retentionScore;
  }
  /**
   * @param NlpSaftDocument
   */
  public function setSaftDocument(NlpSaftDocument $saftDocument)
  {
    $this->saftDocument = $saftDocument;
  }
  /**
   * @return NlpSaftDocument
   */
  public function getSaftDocument()
  {
    return $this->saftDocument;
  }
  /**
   * @param VideoContentSearchCaptionLabelFeatures[]
   */
  public function setTimedLabelFeatures($timedLabelFeatures)
  {
    $this->timedLabelFeatures = $timedLabelFeatures;
  }
  /**
   * @return VideoContentSearchCaptionLabelFeatures[]
   */
  public function getTimedLabelFeatures()
  {
    return $this->timedLabelFeatures;
  }
  /**
   * @param VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp[]
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return VideoContentSearchAnchorCommonFeatureSetLabelSpanTimestamp[]
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param float
   */
  public function setTitleAnchorBabelMatchScore($titleAnchorBabelMatchScore)
  {
    $this->titleAnchorBabelMatchScore = $titleAnchorBabelMatchScore;
  }
  /**
   * @return float
   */
  public function getTitleAnchorBabelMatchScore()
  {
    return $this->titleAnchorBabelMatchScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorCommonFeatureSet::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorCommonFeatureSet');
