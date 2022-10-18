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

class VideoContentSearchListAnchorFeatures extends \Google\Collection
{
  protected $collection_key = 'matchScores';
  protected $babelMatchType = VideoContentSearchTextMatchInfo::class;
  protected $babelMatchDataType = '';
  protected $descriptionSpanInfoType = VideoContentSearchDescriptionSpanInfo::class;
  protected $descriptionSpanInfoDataType = '';
  /**
   * @var int
   */
  public $listItemIndex;
  protected $matchScoresType = VideoContentSearchMatchScores::class;
  protected $matchScoresDataType = 'array';
  /**
   * @var float
   */
  public $pretriggerScore;
  /**
   * @var float
   */
  public $titleAnchorBabelMatchScore;

  /**
   * @param VideoContentSearchTextMatchInfo
   */
  public function setBabelMatch(VideoContentSearchTextMatchInfo $babelMatch)
  {
    $this->babelMatch = $babelMatch;
  }
  /**
   * @return VideoContentSearchTextMatchInfo
   */
  public function getBabelMatch()
  {
    return $this->babelMatch;
  }
  /**
   * @param VideoContentSearchDescriptionSpanInfo
   */
  public function setDescriptionSpanInfo(VideoContentSearchDescriptionSpanInfo $descriptionSpanInfo)
  {
    $this->descriptionSpanInfo = $descriptionSpanInfo;
  }
  /**
   * @return VideoContentSearchDescriptionSpanInfo
   */
  public function getDescriptionSpanInfo()
  {
    return $this->descriptionSpanInfo;
  }
  /**
   * @param int
   */
  public function setListItemIndex($listItemIndex)
  {
    $this->listItemIndex = $listItemIndex;
  }
  /**
   * @return int
   */
  public function getListItemIndex()
  {
    return $this->listItemIndex;
  }
  /**
   * @param VideoContentSearchMatchScores[]
   */
  public function setMatchScores($matchScores)
  {
    $this->matchScores = $matchScores;
  }
  /**
   * @return VideoContentSearchMatchScores[]
   */
  public function getMatchScores()
  {
    return $this->matchScores;
  }
  /**
   * @param float
   */
  public function setPretriggerScore($pretriggerScore)
  {
    $this->pretriggerScore = $pretriggerScore;
  }
  /**
   * @return float
   */
  public function getPretriggerScore()
  {
    return $this->pretriggerScore;
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
class_alias(VideoContentSearchListAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchListAnchorFeatures');
