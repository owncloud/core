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

class VideoContentSearchVideoAnchorsScoreInfo extends \Google\Model
{
  protected $anchorsCommonFeatureSetType = VideoContentSearchAnchorsCommonFeatureSet::class;
  protected $anchorsCommonFeatureSetDataType = '';
  protected $captionEntityAnchorSetFeaturesType = VideoContentSearchCaptionEntityAnchorSetFeatures::class;
  protected $captionEntityAnchorSetFeaturesDataType = '';
  protected $captionSpanAnchorSetFeaturesType = VideoContentSearchCaptionSpanAnchorSetFeatures::class;
  protected $captionSpanAnchorSetFeaturesDataType = '';
  protected $commentAnchorSetFeaturesType = VideoContentSearchCommentAnchorSetFeatures::class;
  protected $commentAnchorSetFeaturesDataType = '';
  protected $descriptionAnchorSetFeaturesType = VideoContentSearchDescriptionAnchorSetFeatures::class;
  protected $descriptionAnchorSetFeaturesDataType = '';
  /**
   * @var bool
   */
  public $filtered;
  protected $listAnchorSetFeaturesType = VideoContentSearchListAnchorSetFeatures::class;
  protected $listAnchorSetFeaturesDataType = '';
  protected $listTrainingDataSetFeaturesType = VideoContentSearchListTrainingDataSetFeatures::class;
  protected $listTrainingDataSetFeaturesDataType = '';
  protected $ocrAnchorClusterFeatureType = VideoContentSearchOnScreenTextClusterFeature::class;
  protected $ocrAnchorClusterFeatureDataType = '';
  protected $ocrDescriptionTrainingDataSetFeaturesType = VideoContentSearchOcrDescriptionTrainingDataSetFeatures::class;
  protected $ocrDescriptionTrainingDataSetFeaturesDataType = '';
  protected $qnaAnchorSetFeaturesType = VideoContentSearchQnaAnchorSetFeatures::class;
  protected $qnaAnchorSetFeaturesDataType = '';
  protected $ratingScoreType = VideoContentSearchVideoAnchorSetRatingScore::class;
  protected $ratingScoreDataType = '';
  protected $sportsKeyMomentsAnchorSetFeaturesType = VideoContentSearchSportsKeyMomentsAnchorSetFeatures::class;
  protected $sportsKeyMomentsAnchorSetFeaturesDataType = '';

  /**
   * @param VideoContentSearchAnchorsCommonFeatureSet
   */
  public function setAnchorsCommonFeatureSet(VideoContentSearchAnchorsCommonFeatureSet $anchorsCommonFeatureSet)
  {
    $this->anchorsCommonFeatureSet = $anchorsCommonFeatureSet;
  }
  /**
   * @return VideoContentSearchAnchorsCommonFeatureSet
   */
  public function getAnchorsCommonFeatureSet()
  {
    return $this->anchorsCommonFeatureSet;
  }
  /**
   * @param VideoContentSearchCaptionEntityAnchorSetFeatures
   */
  public function setCaptionEntityAnchorSetFeatures(VideoContentSearchCaptionEntityAnchorSetFeatures $captionEntityAnchorSetFeatures)
  {
    $this->captionEntityAnchorSetFeatures = $captionEntityAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchCaptionEntityAnchorSetFeatures
   */
  public function getCaptionEntityAnchorSetFeatures()
  {
    return $this->captionEntityAnchorSetFeatures;
  }
  /**
   * @param VideoContentSearchCaptionSpanAnchorSetFeatures
   */
  public function setCaptionSpanAnchorSetFeatures(VideoContentSearchCaptionSpanAnchorSetFeatures $captionSpanAnchorSetFeatures)
  {
    $this->captionSpanAnchorSetFeatures = $captionSpanAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchCaptionSpanAnchorSetFeatures
   */
  public function getCaptionSpanAnchorSetFeatures()
  {
    return $this->captionSpanAnchorSetFeatures;
  }
  /**
   * @param VideoContentSearchCommentAnchorSetFeatures
   */
  public function setCommentAnchorSetFeatures(VideoContentSearchCommentAnchorSetFeatures $commentAnchorSetFeatures)
  {
    $this->commentAnchorSetFeatures = $commentAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchCommentAnchorSetFeatures
   */
  public function getCommentAnchorSetFeatures()
  {
    return $this->commentAnchorSetFeatures;
  }
  /**
   * @param VideoContentSearchDescriptionAnchorSetFeatures
   */
  public function setDescriptionAnchorSetFeatures(VideoContentSearchDescriptionAnchorSetFeatures $descriptionAnchorSetFeatures)
  {
    $this->descriptionAnchorSetFeatures = $descriptionAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchDescriptionAnchorSetFeatures
   */
  public function getDescriptionAnchorSetFeatures()
  {
    return $this->descriptionAnchorSetFeatures;
  }
  /**
   * @param bool
   */
  public function setFiltered($filtered)
  {
    $this->filtered = $filtered;
  }
  /**
   * @return bool
   */
  public function getFiltered()
  {
    return $this->filtered;
  }
  /**
   * @param VideoContentSearchListAnchorSetFeatures
   */
  public function setListAnchorSetFeatures(VideoContentSearchListAnchorSetFeatures $listAnchorSetFeatures)
  {
    $this->listAnchorSetFeatures = $listAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchListAnchorSetFeatures
   */
  public function getListAnchorSetFeatures()
  {
    return $this->listAnchorSetFeatures;
  }
  /**
   * @param VideoContentSearchListTrainingDataSetFeatures
   */
  public function setListTrainingDataSetFeatures(VideoContentSearchListTrainingDataSetFeatures $listTrainingDataSetFeatures)
  {
    $this->listTrainingDataSetFeatures = $listTrainingDataSetFeatures;
  }
  /**
   * @return VideoContentSearchListTrainingDataSetFeatures
   */
  public function getListTrainingDataSetFeatures()
  {
    return $this->listTrainingDataSetFeatures;
  }
  /**
   * @param VideoContentSearchOnScreenTextClusterFeature
   */
  public function setOcrAnchorClusterFeature(VideoContentSearchOnScreenTextClusterFeature $ocrAnchorClusterFeature)
  {
    $this->ocrAnchorClusterFeature = $ocrAnchorClusterFeature;
  }
  /**
   * @return VideoContentSearchOnScreenTextClusterFeature
   */
  public function getOcrAnchorClusterFeature()
  {
    return $this->ocrAnchorClusterFeature;
  }
  /**
   * @param VideoContentSearchOcrDescriptionTrainingDataSetFeatures
   */
  public function setOcrDescriptionTrainingDataSetFeatures(VideoContentSearchOcrDescriptionTrainingDataSetFeatures $ocrDescriptionTrainingDataSetFeatures)
  {
    $this->ocrDescriptionTrainingDataSetFeatures = $ocrDescriptionTrainingDataSetFeatures;
  }
  /**
   * @return VideoContentSearchOcrDescriptionTrainingDataSetFeatures
   */
  public function getOcrDescriptionTrainingDataSetFeatures()
  {
    return $this->ocrDescriptionTrainingDataSetFeatures;
  }
  /**
   * @param VideoContentSearchQnaAnchorSetFeatures
   */
  public function setQnaAnchorSetFeatures(VideoContentSearchQnaAnchorSetFeatures $qnaAnchorSetFeatures)
  {
    $this->qnaAnchorSetFeatures = $qnaAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchQnaAnchorSetFeatures
   */
  public function getQnaAnchorSetFeatures()
  {
    return $this->qnaAnchorSetFeatures;
  }
  /**
   * @param VideoContentSearchVideoAnchorSetRatingScore
   */
  public function setRatingScore(VideoContentSearchVideoAnchorSetRatingScore $ratingScore)
  {
    $this->ratingScore = $ratingScore;
  }
  /**
   * @return VideoContentSearchVideoAnchorSetRatingScore
   */
  public function getRatingScore()
  {
    return $this->ratingScore;
  }
  /**
   * @param VideoContentSearchSportsKeyMomentsAnchorSetFeatures
   */
  public function setSportsKeyMomentsAnchorSetFeatures(VideoContentSearchSportsKeyMomentsAnchorSetFeatures $sportsKeyMomentsAnchorSetFeatures)
  {
    $this->sportsKeyMomentsAnchorSetFeatures = $sportsKeyMomentsAnchorSetFeatures;
  }
  /**
   * @return VideoContentSearchSportsKeyMomentsAnchorSetFeatures
   */
  public function getSportsKeyMomentsAnchorSetFeatures()
  {
    return $this->sportsKeyMomentsAnchorSetFeatures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoAnchorsScoreInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoAnchorsScoreInfo');
