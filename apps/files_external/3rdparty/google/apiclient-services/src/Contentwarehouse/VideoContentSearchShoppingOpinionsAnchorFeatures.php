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

class VideoContentSearchShoppingOpinionsAnchorFeatures extends \Google\Model
{
  /**
   * @var string
   */
  public $anchorLabel;
  /**
   * @var int
   */
  public $anchorLabelFirstMentionPos;
  /**
   * @var float
   */
  public $anchorLabelSentiment;
  /**
   * @var int
   */
  public $anchorLabelWordsMentions;
  /**
   * @var int
   */
  public $anchorOrAspectFirstMentionPos;
  /**
   * @var int
   */
  public $anchorOrAspectWordsMentions;
  protected $aspectType = VideoContentSearchAspect::class;
  protected $aspectDataType = '';
  /**
   * @var string
   */
  public $asrForProConExtraction;
  /**
   * @var float
   */
  public $babelSimilarityScore;
  /**
   * @var float
   */
  public $conScore;
  /**
   * @var float
   */
  public $grampusScore;
  /**
   * @var bool
   */
  public $isCon;
  /**
   * @var bool
   */
  public $isPro;
  /**
   * @var bool
   */
  public $isProConWhenExtractedFromMum;
  /**
   * @var string
   */
  public $luminAspect;
  /**
   * @var int
   */
  public $luminAspectFirstMentionPos;
  /**
   * @var int
   */
  public $luminAspectWordsMentions;
  /**
   * @var float
   */
  public $luminScore;
  /**
   * @var string
   */
  public $mumProductAspect;
  /**
   * @var float
   */
  public $mumScore;
  /**
   * @var float
   */
  public $opinionsDolphinDescriptivenessScore;
  /**
   * @var float
   */
  public $opinionsDolphinUsefulnessScore;
  /**
   * @var float
   */
  public $proScore;
  /**
   * @var string
   */
  public $productNameFromTitle;
  /**
   * @var string
   */
  public $question;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var float
   */
  public $snippetQaScore;
  /**
   * @var float
   */
  public $snippetSentimentScore;
  /**
   * @var string
   */
  public $snippetSubSegment;
  /**
   * @var float
   */
  public $snippetSubSegmentQaScore;
  /**
   * @var float
   */
  public $snippetSubSegmentSentimentScore;
  /**
   * @var int
   */
  public $snippetSubSegmentWordCount;
  /**
   * @var int
   */
  public $snippetWordCount;

  /**
   * @param string
   */
  public function setAnchorLabel($anchorLabel)
  {
    $this->anchorLabel = $anchorLabel;
  }
  /**
   * @return string
   */
  public function getAnchorLabel()
  {
    return $this->anchorLabel;
  }
  /**
   * @param int
   */
  public function setAnchorLabelFirstMentionPos($anchorLabelFirstMentionPos)
  {
    $this->anchorLabelFirstMentionPos = $anchorLabelFirstMentionPos;
  }
  /**
   * @return int
   */
  public function getAnchorLabelFirstMentionPos()
  {
    return $this->anchorLabelFirstMentionPos;
  }
  /**
   * @param float
   */
  public function setAnchorLabelSentiment($anchorLabelSentiment)
  {
    $this->anchorLabelSentiment = $anchorLabelSentiment;
  }
  /**
   * @return float
   */
  public function getAnchorLabelSentiment()
  {
    return $this->anchorLabelSentiment;
  }
  /**
   * @param int
   */
  public function setAnchorLabelWordsMentions($anchorLabelWordsMentions)
  {
    $this->anchorLabelWordsMentions = $anchorLabelWordsMentions;
  }
  /**
   * @return int
   */
  public function getAnchorLabelWordsMentions()
  {
    return $this->anchorLabelWordsMentions;
  }
  /**
   * @param int
   */
  public function setAnchorOrAspectFirstMentionPos($anchorOrAspectFirstMentionPos)
  {
    $this->anchorOrAspectFirstMentionPos = $anchorOrAspectFirstMentionPos;
  }
  /**
   * @return int
   */
  public function getAnchorOrAspectFirstMentionPos()
  {
    return $this->anchorOrAspectFirstMentionPos;
  }
  /**
   * @param int
   */
  public function setAnchorOrAspectWordsMentions($anchorOrAspectWordsMentions)
  {
    $this->anchorOrAspectWordsMentions = $anchorOrAspectWordsMentions;
  }
  /**
   * @return int
   */
  public function getAnchorOrAspectWordsMentions()
  {
    return $this->anchorOrAspectWordsMentions;
  }
  /**
   * @param VideoContentSearchAspect
   */
  public function setAspect(VideoContentSearchAspect $aspect)
  {
    $this->aspect = $aspect;
  }
  /**
   * @return VideoContentSearchAspect
   */
  public function getAspect()
  {
    return $this->aspect;
  }
  /**
   * @param string
   */
  public function setAsrForProConExtraction($asrForProConExtraction)
  {
    $this->asrForProConExtraction = $asrForProConExtraction;
  }
  /**
   * @return string
   */
  public function getAsrForProConExtraction()
  {
    return $this->asrForProConExtraction;
  }
  /**
   * @param float
   */
  public function setBabelSimilarityScore($babelSimilarityScore)
  {
    $this->babelSimilarityScore = $babelSimilarityScore;
  }
  /**
   * @return float
   */
  public function getBabelSimilarityScore()
  {
    return $this->babelSimilarityScore;
  }
  /**
   * @param float
   */
  public function setConScore($conScore)
  {
    $this->conScore = $conScore;
  }
  /**
   * @return float
   */
  public function getConScore()
  {
    return $this->conScore;
  }
  /**
   * @param float
   */
  public function setGrampusScore($grampusScore)
  {
    $this->grampusScore = $grampusScore;
  }
  /**
   * @return float
   */
  public function getGrampusScore()
  {
    return $this->grampusScore;
  }
  /**
   * @param bool
   */
  public function setIsCon($isCon)
  {
    $this->isCon = $isCon;
  }
  /**
   * @return bool
   */
  public function getIsCon()
  {
    return $this->isCon;
  }
  /**
   * @param bool
   */
  public function setIsPro($isPro)
  {
    $this->isPro = $isPro;
  }
  /**
   * @return bool
   */
  public function getIsPro()
  {
    return $this->isPro;
  }
  /**
   * @param bool
   */
  public function setIsProConWhenExtractedFromMum($isProConWhenExtractedFromMum)
  {
    $this->isProConWhenExtractedFromMum = $isProConWhenExtractedFromMum;
  }
  /**
   * @return bool
   */
  public function getIsProConWhenExtractedFromMum()
  {
    return $this->isProConWhenExtractedFromMum;
  }
  /**
   * @param string
   */
  public function setLuminAspect($luminAspect)
  {
    $this->luminAspect = $luminAspect;
  }
  /**
   * @return string
   */
  public function getLuminAspect()
  {
    return $this->luminAspect;
  }
  /**
   * @param int
   */
  public function setLuminAspectFirstMentionPos($luminAspectFirstMentionPos)
  {
    $this->luminAspectFirstMentionPos = $luminAspectFirstMentionPos;
  }
  /**
   * @return int
   */
  public function getLuminAspectFirstMentionPos()
  {
    return $this->luminAspectFirstMentionPos;
  }
  /**
   * @param int
   */
  public function setLuminAspectWordsMentions($luminAspectWordsMentions)
  {
    $this->luminAspectWordsMentions = $luminAspectWordsMentions;
  }
  /**
   * @return int
   */
  public function getLuminAspectWordsMentions()
  {
    return $this->luminAspectWordsMentions;
  }
  /**
   * @param float
   */
  public function setLuminScore($luminScore)
  {
    $this->luminScore = $luminScore;
  }
  /**
   * @return float
   */
  public function getLuminScore()
  {
    return $this->luminScore;
  }
  /**
   * @param string
   */
  public function setMumProductAspect($mumProductAspect)
  {
    $this->mumProductAspect = $mumProductAspect;
  }
  /**
   * @return string
   */
  public function getMumProductAspect()
  {
    return $this->mumProductAspect;
  }
  /**
   * @param float
   */
  public function setMumScore($mumScore)
  {
    $this->mumScore = $mumScore;
  }
  /**
   * @return float
   */
  public function getMumScore()
  {
    return $this->mumScore;
  }
  /**
   * @param float
   */
  public function setOpinionsDolphinDescriptivenessScore($opinionsDolphinDescriptivenessScore)
  {
    $this->opinionsDolphinDescriptivenessScore = $opinionsDolphinDescriptivenessScore;
  }
  /**
   * @return float
   */
  public function getOpinionsDolphinDescriptivenessScore()
  {
    return $this->opinionsDolphinDescriptivenessScore;
  }
  /**
   * @param float
   */
  public function setOpinionsDolphinUsefulnessScore($opinionsDolphinUsefulnessScore)
  {
    $this->opinionsDolphinUsefulnessScore = $opinionsDolphinUsefulnessScore;
  }
  /**
   * @return float
   */
  public function getOpinionsDolphinUsefulnessScore()
  {
    return $this->opinionsDolphinUsefulnessScore;
  }
  /**
   * @param float
   */
  public function setProScore($proScore)
  {
    $this->proScore = $proScore;
  }
  /**
   * @return float
   */
  public function getProScore()
  {
    return $this->proScore;
  }
  /**
   * @param string
   */
  public function setProductNameFromTitle($productNameFromTitle)
  {
    $this->productNameFromTitle = $productNameFromTitle;
  }
  /**
   * @return string
   */
  public function getProductNameFromTitle()
  {
    return $this->productNameFromTitle;
  }
  /**
   * @param string
   */
  public function setQuestion($question)
  {
    $this->question = $question;
  }
  /**
   * @return string
   */
  public function getQuestion()
  {
    return $this->question;
  }
  /**
   * @param string
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param float
   */
  public function setSnippetQaScore($snippetQaScore)
  {
    $this->snippetQaScore = $snippetQaScore;
  }
  /**
   * @return float
   */
  public function getSnippetQaScore()
  {
    return $this->snippetQaScore;
  }
  /**
   * @param float
   */
  public function setSnippetSentimentScore($snippetSentimentScore)
  {
    $this->snippetSentimentScore = $snippetSentimentScore;
  }
  /**
   * @return float
   */
  public function getSnippetSentimentScore()
  {
    return $this->snippetSentimentScore;
  }
  /**
   * @param string
   */
  public function setSnippetSubSegment($snippetSubSegment)
  {
    $this->snippetSubSegment = $snippetSubSegment;
  }
  /**
   * @return string
   */
  public function getSnippetSubSegment()
  {
    return $this->snippetSubSegment;
  }
  /**
   * @param float
   */
  public function setSnippetSubSegmentQaScore($snippetSubSegmentQaScore)
  {
    $this->snippetSubSegmentQaScore = $snippetSubSegmentQaScore;
  }
  /**
   * @return float
   */
  public function getSnippetSubSegmentQaScore()
  {
    return $this->snippetSubSegmentQaScore;
  }
  /**
   * @param float
   */
  public function setSnippetSubSegmentSentimentScore($snippetSubSegmentSentimentScore)
  {
    $this->snippetSubSegmentSentimentScore = $snippetSubSegmentSentimentScore;
  }
  /**
   * @return float
   */
  public function getSnippetSubSegmentSentimentScore()
  {
    return $this->snippetSubSegmentSentimentScore;
  }
  /**
   * @param int
   */
  public function setSnippetSubSegmentWordCount($snippetSubSegmentWordCount)
  {
    $this->snippetSubSegmentWordCount = $snippetSubSegmentWordCount;
  }
  /**
   * @return int
   */
  public function getSnippetSubSegmentWordCount()
  {
    return $this->snippetSubSegmentWordCount;
  }
  /**
   * @param int
   */
  public function setSnippetWordCount($snippetWordCount)
  {
    $this->snippetWordCount = $snippetWordCount;
  }
  /**
   * @return int
   */
  public function getSnippetWordCount()
  {
    return $this->snippetWordCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchShoppingOpinionsAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchShoppingOpinionsAnchorFeatures');
