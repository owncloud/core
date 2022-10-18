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

class VideoContentSearchVideoAnchorScoreInfo extends \Google\Collection
{
  protected $collection_key = 'textSimilarityFeatures';
  protected $anchorCommonFeatureSetType = VideoContentSearchAnchorCommonFeatureSet::class;
  protected $anchorCommonFeatureSetDataType = '';
  protected $attachmentsType = Proto2BridgeMessageSet::class;
  protected $attachmentsDataType = '';
  protected $captionEntityAnchorFeaturesType = VideoContentSearchCaptionEntityAnchorFeatures::class;
  protected $captionEntityAnchorFeaturesDataType = '';
  protected $captionSpanAnchorFeaturesType = VideoContentSearchCaptionSpanAnchorFeatures::class;
  protected $captionSpanAnchorFeaturesDataType = '';
  protected $descriptionAnchorFeaturesType = VideoContentSearchDescriptionAnchorFeatures::class;
  protected $descriptionAnchorFeaturesDataType = '';
  /**
   * @var string[]
   */
  public $filterReason;
  /**
   * @var bool
   */
  public $filtered;
  protected $generativeFeaturesType = VideoContentSearchGenerativePredictionFeatures::class;
  protected $generativeFeaturesDataType = 'array';
  protected $instructionAnchorFeaturesType = VideoContentSearchInstructionAnchorFeatures::class;
  protected $instructionAnchorFeaturesDataType = '';
  protected $instructionTrainingDataAnchorFeaturesType = VideoContentSearchInstructionTrainingDataAnchorFeatures::class;
  protected $instructionTrainingDataAnchorFeaturesDataType = '';
  /**
   * @var string
   */
  public $labelLanguage;
  protected $labelTransformationType = VideoContentSearchVideoAnchorScoreInfoLabelTransformation::class;
  protected $labelTransformationDataType = 'array';
  protected $listAnchorFeaturesType = VideoContentSearchListAnchorFeatures::class;
  protected $listAnchorFeaturesDataType = '';
  protected $listTrainingDataAnchorFeaturesType = VideoContentSearchListTrainingDataAnchorFeatures::class;
  protected $listTrainingDataAnchorFeaturesDataType = '';
  protected $multimodalTopicFeaturesType = VideoContentSearchMultimodalTopicFeatures::class;
  protected $multimodalTopicFeaturesDataType = '';
  protected $multimodalTopicTrainingFeaturesType = VideoContentSearchMultimodalTopicTrainingFeatures::class;
  protected $multimodalTopicTrainingFeaturesDataType = '';
  protected $ocrAnchorFeatureType = VideoContentSearchOnScreenTextFeature::class;
  protected $ocrAnchorFeatureDataType = '';
  protected $ocrDescriptionTrainingDataAnchorFeaturesType = VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures::class;
  protected $ocrDescriptionTrainingDataAnchorFeaturesDataType = '';
  protected $opinionsAnchorFeaturesType = VideoContentSearchShoppingOpinionsAnchorFeatures::class;
  protected $opinionsAnchorFeaturesDataType = '';
  protected $qnaAnchorFeaturesType = VideoContentSearchQnaAnchorFeatures::class;
  protected $qnaAnchorFeaturesDataType = '';
  protected $ratingScoreType = VideoContentSearchVideoAnchorRatingScore::class;
  protected $ratingScoreDataType = '';
  protected $safeSearchClassifierOutputType = ClassifierPornQueryMultiLabelClassifierOutput::class;
  protected $safeSearchClassifierOutputDataType = '';
  protected $textSimilarityFeaturesType = VideoContentSearchTextSimilarityFeatures::class;
  protected $textSimilarityFeaturesDataType = 'array';
  protected $thumbnailInfoType = VideoContentSearchAnchorThumbnailInfo::class;
  protected $thumbnailInfoDataType = '';

  /**
   * @param VideoContentSearchAnchorCommonFeatureSet
   */
  public function setAnchorCommonFeatureSet(VideoContentSearchAnchorCommonFeatureSet $anchorCommonFeatureSet)
  {
    $this->anchorCommonFeatureSet = $anchorCommonFeatureSet;
  }
  /**
   * @return VideoContentSearchAnchorCommonFeatureSet
   */
  public function getAnchorCommonFeatureSet()
  {
    return $this->anchorCommonFeatureSet;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setAttachments(Proto2BridgeMessageSet $attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param VideoContentSearchCaptionEntityAnchorFeatures
   */
  public function setCaptionEntityAnchorFeatures(VideoContentSearchCaptionEntityAnchorFeatures $captionEntityAnchorFeatures)
  {
    $this->captionEntityAnchorFeatures = $captionEntityAnchorFeatures;
  }
  /**
   * @return VideoContentSearchCaptionEntityAnchorFeatures
   */
  public function getCaptionEntityAnchorFeatures()
  {
    return $this->captionEntityAnchorFeatures;
  }
  /**
   * @param VideoContentSearchCaptionSpanAnchorFeatures
   */
  public function setCaptionSpanAnchorFeatures(VideoContentSearchCaptionSpanAnchorFeatures $captionSpanAnchorFeatures)
  {
    $this->captionSpanAnchorFeatures = $captionSpanAnchorFeatures;
  }
  /**
   * @return VideoContentSearchCaptionSpanAnchorFeatures
   */
  public function getCaptionSpanAnchorFeatures()
  {
    return $this->captionSpanAnchorFeatures;
  }
  /**
   * @param VideoContentSearchDescriptionAnchorFeatures
   */
  public function setDescriptionAnchorFeatures(VideoContentSearchDescriptionAnchorFeatures $descriptionAnchorFeatures)
  {
    $this->descriptionAnchorFeatures = $descriptionAnchorFeatures;
  }
  /**
   * @return VideoContentSearchDescriptionAnchorFeatures
   */
  public function getDescriptionAnchorFeatures()
  {
    return $this->descriptionAnchorFeatures;
  }
  /**
   * @param string[]
   */
  public function setFilterReason($filterReason)
  {
    $this->filterReason = $filterReason;
  }
  /**
   * @return string[]
   */
  public function getFilterReason()
  {
    return $this->filterReason;
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
   * @param VideoContentSearchGenerativePredictionFeatures[]
   */
  public function setGenerativeFeatures($generativeFeatures)
  {
    $this->generativeFeatures = $generativeFeatures;
  }
  /**
   * @return VideoContentSearchGenerativePredictionFeatures[]
   */
  public function getGenerativeFeatures()
  {
    return $this->generativeFeatures;
  }
  /**
   * @param VideoContentSearchInstructionAnchorFeatures
   */
  public function setInstructionAnchorFeatures(VideoContentSearchInstructionAnchorFeatures $instructionAnchorFeatures)
  {
    $this->instructionAnchorFeatures = $instructionAnchorFeatures;
  }
  /**
   * @return VideoContentSearchInstructionAnchorFeatures
   */
  public function getInstructionAnchorFeatures()
  {
    return $this->instructionAnchorFeatures;
  }
  /**
   * @param VideoContentSearchInstructionTrainingDataAnchorFeatures
   */
  public function setInstructionTrainingDataAnchorFeatures(VideoContentSearchInstructionTrainingDataAnchorFeatures $instructionTrainingDataAnchorFeatures)
  {
    $this->instructionTrainingDataAnchorFeatures = $instructionTrainingDataAnchorFeatures;
  }
  /**
   * @return VideoContentSearchInstructionTrainingDataAnchorFeatures
   */
  public function getInstructionTrainingDataAnchorFeatures()
  {
    return $this->instructionTrainingDataAnchorFeatures;
  }
  /**
   * @param string
   */
  public function setLabelLanguage($labelLanguage)
  {
    $this->labelLanguage = $labelLanguage;
  }
  /**
   * @return string
   */
  public function getLabelLanguage()
  {
    return $this->labelLanguage;
  }
  /**
   * @param VideoContentSearchVideoAnchorScoreInfoLabelTransformation[]
   */
  public function setLabelTransformation($labelTransformation)
  {
    $this->labelTransformation = $labelTransformation;
  }
  /**
   * @return VideoContentSearchVideoAnchorScoreInfoLabelTransformation[]
   */
  public function getLabelTransformation()
  {
    return $this->labelTransformation;
  }
  /**
   * @param VideoContentSearchListAnchorFeatures
   */
  public function setListAnchorFeatures(VideoContentSearchListAnchorFeatures $listAnchorFeatures)
  {
    $this->listAnchorFeatures = $listAnchorFeatures;
  }
  /**
   * @return VideoContentSearchListAnchorFeatures
   */
  public function getListAnchorFeatures()
  {
    return $this->listAnchorFeatures;
  }
  /**
   * @param VideoContentSearchListTrainingDataAnchorFeatures
   */
  public function setListTrainingDataAnchorFeatures(VideoContentSearchListTrainingDataAnchorFeatures $listTrainingDataAnchorFeatures)
  {
    $this->listTrainingDataAnchorFeatures = $listTrainingDataAnchorFeatures;
  }
  /**
   * @return VideoContentSearchListTrainingDataAnchorFeatures
   */
  public function getListTrainingDataAnchorFeatures()
  {
    return $this->listTrainingDataAnchorFeatures;
  }
  /**
   * @param VideoContentSearchMultimodalTopicFeatures
   */
  public function setMultimodalTopicFeatures(VideoContentSearchMultimodalTopicFeatures $multimodalTopicFeatures)
  {
    $this->multimodalTopicFeatures = $multimodalTopicFeatures;
  }
  /**
   * @return VideoContentSearchMultimodalTopicFeatures
   */
  public function getMultimodalTopicFeatures()
  {
    return $this->multimodalTopicFeatures;
  }
  /**
   * @param VideoContentSearchMultimodalTopicTrainingFeatures
   */
  public function setMultimodalTopicTrainingFeatures(VideoContentSearchMultimodalTopicTrainingFeatures $multimodalTopicTrainingFeatures)
  {
    $this->multimodalTopicTrainingFeatures = $multimodalTopicTrainingFeatures;
  }
  /**
   * @return VideoContentSearchMultimodalTopicTrainingFeatures
   */
  public function getMultimodalTopicTrainingFeatures()
  {
    return $this->multimodalTopicTrainingFeatures;
  }
  /**
   * @param VideoContentSearchOnScreenTextFeature
   */
  public function setOcrAnchorFeature(VideoContentSearchOnScreenTextFeature $ocrAnchorFeature)
  {
    $this->ocrAnchorFeature = $ocrAnchorFeature;
  }
  /**
   * @return VideoContentSearchOnScreenTextFeature
   */
  public function getOcrAnchorFeature()
  {
    return $this->ocrAnchorFeature;
  }
  /**
   * @param VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures
   */
  public function setOcrDescriptionTrainingDataAnchorFeatures(VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures $ocrDescriptionTrainingDataAnchorFeatures)
  {
    $this->ocrDescriptionTrainingDataAnchorFeatures = $ocrDescriptionTrainingDataAnchorFeatures;
  }
  /**
   * @return VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures
   */
  public function getOcrDescriptionTrainingDataAnchorFeatures()
  {
    return $this->ocrDescriptionTrainingDataAnchorFeatures;
  }
  /**
   * @param VideoContentSearchShoppingOpinionsAnchorFeatures
   */
  public function setOpinionsAnchorFeatures(VideoContentSearchShoppingOpinionsAnchorFeatures $opinionsAnchorFeatures)
  {
    $this->opinionsAnchorFeatures = $opinionsAnchorFeatures;
  }
  /**
   * @return VideoContentSearchShoppingOpinionsAnchorFeatures
   */
  public function getOpinionsAnchorFeatures()
  {
    return $this->opinionsAnchorFeatures;
  }
  /**
   * @param VideoContentSearchQnaAnchorFeatures
   */
  public function setQnaAnchorFeatures(VideoContentSearchQnaAnchorFeatures $qnaAnchorFeatures)
  {
    $this->qnaAnchorFeatures = $qnaAnchorFeatures;
  }
  /**
   * @return VideoContentSearchQnaAnchorFeatures
   */
  public function getQnaAnchorFeatures()
  {
    return $this->qnaAnchorFeatures;
  }
  /**
   * @param VideoContentSearchVideoAnchorRatingScore
   */
  public function setRatingScore(VideoContentSearchVideoAnchorRatingScore $ratingScore)
  {
    $this->ratingScore = $ratingScore;
  }
  /**
   * @return VideoContentSearchVideoAnchorRatingScore
   */
  public function getRatingScore()
  {
    return $this->ratingScore;
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
   * @param VideoContentSearchTextSimilarityFeatures[]
   */
  public function setTextSimilarityFeatures($textSimilarityFeatures)
  {
    $this->textSimilarityFeatures = $textSimilarityFeatures;
  }
  /**
   * @return VideoContentSearchTextSimilarityFeatures[]
   */
  public function getTextSimilarityFeatures()
  {
    return $this->textSimilarityFeatures;
  }
  /**
   * @param VideoContentSearchAnchorThumbnailInfo
   */
  public function setThumbnailInfo(VideoContentSearchAnchorThumbnailInfo $thumbnailInfo)
  {
    $this->thumbnailInfo = $thumbnailInfo;
  }
  /**
   * @return VideoContentSearchAnchorThumbnailInfo
   */
  public function getThumbnailInfo()
  {
    return $this->thumbnailInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoAnchorScoreInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoAnchorScoreInfo');
