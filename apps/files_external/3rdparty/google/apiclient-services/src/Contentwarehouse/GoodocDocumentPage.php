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

class GoodocDocumentPage extends \Google\Collection
{
  protected $collection_key = 'mergedpageinfo';
  protected $internal_gapi_mappings = [
        "garbageDetectorChangeList" => "GarbageDetectorChangeList",
        "garbageDetectorWasProduction" => "GarbageDetectorWasProduction",
        "height" => "Height",
        "horizontalDpi" => "HorizontalDpi",
        "label" => "Label",
        "pornScore" => "PornScore",
        "textConfidence" => "TextConfidence",
        "verticalDpi" => "VerticalDpi",
        "width" => "Width",
  ];
  /**
   * @var int
   */
  public $garbageDetectorChangeList;
  /**
   * @var bool
   */
  public $garbageDetectorWasProduction;
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $horizontalDpi;
  protected $labelType = GoodocLabel::class;
  protected $labelDataType = '';
  public $pornScore;
  /**
   * @var int
   */
  public $textConfidence;
  /**
   * @var int
   */
  public $verticalDpi;
  /**
   * @var int
   */
  public $width;
  protected $blockType = GoodocDocumentPageBlock::class;
  protected $blockDataType = 'array';
  protected $mergedpageinfoType = GoodocDocumentPageMergedPageInfo::class;
  protected $mergedpageinfoDataType = 'array';
  /**
   * @var bool
   */
  public $postOcrConfidence;
  protected $statsType = GoodocSummaryStats::class;
  protected $statsDataType = '';

  /**
   * @param int
   */
  public function setGarbageDetectorChangeList($garbageDetectorChangeList)
  {
    $this->garbageDetectorChangeList = $garbageDetectorChangeList;
  }
  /**
   * @return int
   */
  public function getGarbageDetectorChangeList()
  {
    return $this->garbageDetectorChangeList;
  }
  /**
   * @param bool
   */
  public function setGarbageDetectorWasProduction($garbageDetectorWasProduction)
  {
    $this->garbageDetectorWasProduction = $garbageDetectorWasProduction;
  }
  /**
   * @return bool
   */
  public function getGarbageDetectorWasProduction()
  {
    return $this->garbageDetectorWasProduction;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param int
   */
  public function setHorizontalDpi($horizontalDpi)
  {
    $this->horizontalDpi = $horizontalDpi;
  }
  /**
   * @return int
   */
  public function getHorizontalDpi()
  {
    return $this->horizontalDpi;
  }
  /**
   * @param GoodocLabel
   */
  public function setLabel(GoodocLabel $label)
  {
    $this->label = $label;
  }
  /**
   * @return GoodocLabel
   */
  public function getLabel()
  {
    return $this->label;
  }
  public function setPornScore($pornScore)
  {
    $this->pornScore = $pornScore;
  }
  public function getPornScore()
  {
    return $this->pornScore;
  }
  /**
   * @param int
   */
  public function setTextConfidence($textConfidence)
  {
    $this->textConfidence = $textConfidence;
  }
  /**
   * @return int
   */
  public function getTextConfidence()
  {
    return $this->textConfidence;
  }
  /**
   * @param int
   */
  public function setVerticalDpi($verticalDpi)
  {
    $this->verticalDpi = $verticalDpi;
  }
  /**
   * @return int
   */
  public function getVerticalDpi()
  {
    return $this->verticalDpi;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
  /**
   * @param GoodocDocumentPageBlock[]
   */
  public function setBlock($block)
  {
    $this->block = $block;
  }
  /**
   * @return GoodocDocumentPageBlock[]
   */
  public function getBlock()
  {
    return $this->block;
  }
  /**
   * @param GoodocDocumentPageMergedPageInfo[]
   */
  public function setMergedpageinfo($mergedpageinfo)
  {
    $this->mergedpageinfo = $mergedpageinfo;
  }
  /**
   * @return GoodocDocumentPageMergedPageInfo[]
   */
  public function getMergedpageinfo()
  {
    return $this->mergedpageinfo;
  }
  /**
   * @param bool
   */
  public function setPostOcrConfidence($postOcrConfidence)
  {
    $this->postOcrConfidence = $postOcrConfidence;
  }
  /**
   * @return bool
   */
  public function getPostOcrConfidence()
  {
    return $this->postOcrConfidence;
  }
  /**
   * @param GoodocSummaryStats
   */
  public function setStats(GoodocSummaryStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return GoodocSummaryStats
   */
  public function getStats()
  {
    return $this->stats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocDocumentPage::class, 'Google_Service_Contentwarehouse_GoodocDocumentPage');
