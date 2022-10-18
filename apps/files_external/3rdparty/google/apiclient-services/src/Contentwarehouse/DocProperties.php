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

class DocProperties extends \Google\Collection
{
  protected $collection_key = 'restricts';
  /**
   * @var int
   */
  public $avgTermWeight;
  /**
   * @var bool
   */
  public $badTitle;
  protected $badtitleinfoType = DocPropertiesBadTitleInfo::class;
  protected $badtitleinfoDataType = 'array';
  /**
   * @var int[]
   */
  public $languages;
  protected $leadingtextType = SnippetsLeadingtextLeadingTextInfo::class;
  protected $leadingtextDataType = '';
  /**
   * @var int
   */
  public $numPunctuations;
  /**
   * @var int
   */
  public $numTags;
  /**
   * @var int
   */
  public $numTokens;
  /**
   * @var string[]
   */
  public $proseRestrict;
  /**
   * @var string[]
   */
  public $restricts;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var string
   */
  public $title;

  /**
   * @param int
   */
  public function setAvgTermWeight($avgTermWeight)
  {
    $this->avgTermWeight = $avgTermWeight;
  }
  /**
   * @return int
   */
  public function getAvgTermWeight()
  {
    return $this->avgTermWeight;
  }
  /**
   * @param bool
   */
  public function setBadTitle($badTitle)
  {
    $this->badTitle = $badTitle;
  }
  /**
   * @return bool
   */
  public function getBadTitle()
  {
    return $this->badTitle;
  }
  /**
   * @param DocPropertiesBadTitleInfo[]
   */
  public function setBadtitleinfo($badtitleinfo)
  {
    $this->badtitleinfo = $badtitleinfo;
  }
  /**
   * @return DocPropertiesBadTitleInfo[]
   */
  public function getBadtitleinfo()
  {
    return $this->badtitleinfo;
  }
  /**
   * @param int[]
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return int[]
   */
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param SnippetsLeadingtextLeadingTextInfo
   */
  public function setLeadingtext(SnippetsLeadingtextLeadingTextInfo $leadingtext)
  {
    $this->leadingtext = $leadingtext;
  }
  /**
   * @return SnippetsLeadingtextLeadingTextInfo
   */
  public function getLeadingtext()
  {
    return $this->leadingtext;
  }
  /**
   * @param int
   */
  public function setNumPunctuations($numPunctuations)
  {
    $this->numPunctuations = $numPunctuations;
  }
  /**
   * @return int
   */
  public function getNumPunctuations()
  {
    return $this->numPunctuations;
  }
  /**
   * @param int
   */
  public function setNumTags($numTags)
  {
    $this->numTags = $numTags;
  }
  /**
   * @return int
   */
  public function getNumTags()
  {
    return $this->numTags;
  }
  /**
   * @param int
   */
  public function setNumTokens($numTokens)
  {
    $this->numTokens = $numTokens;
  }
  /**
   * @return int
   */
  public function getNumTokens()
  {
    return $this->numTokens;
  }
  /**
   * @param string[]
   */
  public function setProseRestrict($proseRestrict)
  {
    $this->proseRestrict = $proseRestrict;
  }
  /**
   * @return string[]
   */
  public function getProseRestrict()
  {
    return $this->proseRestrict;
  }
  /**
   * @param string[]
   */
  public function setRestricts($restricts)
  {
    $this->restricts = $restricts;
  }
  /**
   * @return string[]
   */
  public function getRestricts()
  {
    return $this->restricts;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DocProperties::class, 'Google_Service_Contentwarehouse_DocProperties');
