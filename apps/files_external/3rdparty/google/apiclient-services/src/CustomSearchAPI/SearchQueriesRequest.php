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

namespace Google\Service\CustomSearchAPI;

class SearchQueriesRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var string
   */
  public $cr;
  /**
   * @var string
   */
  public $cx;
  /**
   * @var string
   */
  public $dateRestrict;
  /**
   * @var string
   */
  public $disableCnTwTranslation;
  /**
   * @var string
   */
  public $exactTerms;
  /**
   * @var string
   */
  public $excludeTerms;
  /**
   * @var string
   */
  public $fileType;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $gl;
  /**
   * @var string
   */
  public $googleHost;
  /**
   * @var string
   */
  public $highRange;
  /**
   * @var string
   */
  public $hl;
  /**
   * @var string
   */
  public $hq;
  /**
   * @var string
   */
  public $imgColorType;
  /**
   * @var string
   */
  public $imgDominantColor;
  /**
   * @var string
   */
  public $imgSize;
  /**
   * @var string
   */
  public $imgType;
  /**
   * @var string
   */
  public $inputEncoding;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $linkSite;
  /**
   * @var string
   */
  public $lowRange;
  /**
   * @var string
   */
  public $orTerms;
  /**
   * @var string
   */
  public $outputEncoding;
  /**
   * @var string
   */
  public $relatedSite;
  /**
   * @var string
   */
  public $rights;
  /**
   * @var string
   */
  public $safe;
  /**
   * @var string
   */
  public $searchTerms;
  /**
   * @var string
   */
  public $searchType;
  /**
   * @var string
   */
  public $siteSearch;
  /**
   * @var string
   */
  public $siteSearchFilter;
  /**
   * @var string
   */
  public $sort;
  /**
   * @var int
   */
  public $startIndex;
  /**
   * @var int
   */
  public $startPage;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $totalResults;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setCr($cr)
  {
    $this->cr = $cr;
  }
  /**
   * @return string
   */
  public function getCr()
  {
    return $this->cr;
  }
  /**
   * @param string
   */
  public function setCx($cx)
  {
    $this->cx = $cx;
  }
  /**
   * @return string
   */
  public function getCx()
  {
    return $this->cx;
  }
  /**
   * @param string
   */
  public function setDateRestrict($dateRestrict)
  {
    $this->dateRestrict = $dateRestrict;
  }
  /**
   * @return string
   */
  public function getDateRestrict()
  {
    return $this->dateRestrict;
  }
  /**
   * @param string
   */
  public function setDisableCnTwTranslation($disableCnTwTranslation)
  {
    $this->disableCnTwTranslation = $disableCnTwTranslation;
  }
  /**
   * @return string
   */
  public function getDisableCnTwTranslation()
  {
    return $this->disableCnTwTranslation;
  }
  /**
   * @param string
   */
  public function setExactTerms($exactTerms)
  {
    $this->exactTerms = $exactTerms;
  }
  /**
   * @return string
   */
  public function getExactTerms()
  {
    return $this->exactTerms;
  }
  /**
   * @param string
   */
  public function setExcludeTerms($excludeTerms)
  {
    $this->excludeTerms = $excludeTerms;
  }
  /**
   * @return string
   */
  public function getExcludeTerms()
  {
    return $this->excludeTerms;
  }
  /**
   * @param string
   */
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  /**
   * @return string
   */
  public function getFileType()
  {
    return $this->fileType;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string
   */
  public function setGl($gl)
  {
    $this->gl = $gl;
  }
  /**
   * @return string
   */
  public function getGl()
  {
    return $this->gl;
  }
  /**
   * @param string
   */
  public function setGoogleHost($googleHost)
  {
    $this->googleHost = $googleHost;
  }
  /**
   * @return string
   */
  public function getGoogleHost()
  {
    return $this->googleHost;
  }
  /**
   * @param string
   */
  public function setHighRange($highRange)
  {
    $this->highRange = $highRange;
  }
  /**
   * @return string
   */
  public function getHighRange()
  {
    return $this->highRange;
  }
  /**
   * @param string
   */
  public function setHl($hl)
  {
    $this->hl = $hl;
  }
  /**
   * @return string
   */
  public function getHl()
  {
    return $this->hl;
  }
  /**
   * @param string
   */
  public function setHq($hq)
  {
    $this->hq = $hq;
  }
  /**
   * @return string
   */
  public function getHq()
  {
    return $this->hq;
  }
  /**
   * @param string
   */
  public function setImgColorType($imgColorType)
  {
    $this->imgColorType = $imgColorType;
  }
  /**
   * @return string
   */
  public function getImgColorType()
  {
    return $this->imgColorType;
  }
  /**
   * @param string
   */
  public function setImgDominantColor($imgDominantColor)
  {
    $this->imgDominantColor = $imgDominantColor;
  }
  /**
   * @return string
   */
  public function getImgDominantColor()
  {
    return $this->imgDominantColor;
  }
  /**
   * @param string
   */
  public function setImgSize($imgSize)
  {
    $this->imgSize = $imgSize;
  }
  /**
   * @return string
   */
  public function getImgSize()
  {
    return $this->imgSize;
  }
  /**
   * @param string
   */
  public function setImgType($imgType)
  {
    $this->imgType = $imgType;
  }
  /**
   * @return string
   */
  public function getImgType()
  {
    return $this->imgType;
  }
  /**
   * @param string
   */
  public function setInputEncoding($inputEncoding)
  {
    $this->inputEncoding = $inputEncoding;
  }
  /**
   * @return string
   */
  public function getInputEncoding()
  {
    return $this->inputEncoding;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLinkSite($linkSite)
  {
    $this->linkSite = $linkSite;
  }
  /**
   * @return string
   */
  public function getLinkSite()
  {
    return $this->linkSite;
  }
  /**
   * @param string
   */
  public function setLowRange($lowRange)
  {
    $this->lowRange = $lowRange;
  }
  /**
   * @return string
   */
  public function getLowRange()
  {
    return $this->lowRange;
  }
  /**
   * @param string
   */
  public function setOrTerms($orTerms)
  {
    $this->orTerms = $orTerms;
  }
  /**
   * @return string
   */
  public function getOrTerms()
  {
    return $this->orTerms;
  }
  /**
   * @param string
   */
  public function setOutputEncoding($outputEncoding)
  {
    $this->outputEncoding = $outputEncoding;
  }
  /**
   * @return string
   */
  public function getOutputEncoding()
  {
    return $this->outputEncoding;
  }
  /**
   * @param string
   */
  public function setRelatedSite($relatedSite)
  {
    $this->relatedSite = $relatedSite;
  }
  /**
   * @return string
   */
  public function getRelatedSite()
  {
    return $this->relatedSite;
  }
  /**
   * @param string
   */
  public function setRights($rights)
  {
    $this->rights = $rights;
  }
  /**
   * @return string
   */
  public function getRights()
  {
    return $this->rights;
  }
  /**
   * @param string
   */
  public function setSafe($safe)
  {
    $this->safe = $safe;
  }
  /**
   * @return string
   */
  public function getSafe()
  {
    return $this->safe;
  }
  /**
   * @param string
   */
  public function setSearchTerms($searchTerms)
  {
    $this->searchTerms = $searchTerms;
  }
  /**
   * @return string
   */
  public function getSearchTerms()
  {
    return $this->searchTerms;
  }
  /**
   * @param string
   */
  public function setSearchType($searchType)
  {
    $this->searchType = $searchType;
  }
  /**
   * @return string
   */
  public function getSearchType()
  {
    return $this->searchType;
  }
  /**
   * @param string
   */
  public function setSiteSearch($siteSearch)
  {
    $this->siteSearch = $siteSearch;
  }
  /**
   * @return string
   */
  public function getSiteSearch()
  {
    return $this->siteSearch;
  }
  /**
   * @param string
   */
  public function setSiteSearchFilter($siteSearchFilter)
  {
    $this->siteSearchFilter = $siteSearchFilter;
  }
  /**
   * @return string
   */
  public function getSiteSearchFilter()
  {
    return $this->siteSearchFilter;
  }
  /**
   * @param string
   */
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  /**
   * @return string
   */
  public function getSort()
  {
    return $this->sort;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  /**
   * @param int
   */
  public function setStartPage($startPage)
  {
    $this->startPage = $startPage;
  }
  /**
   * @return int
   */
  public function getStartPage()
  {
    return $this->startPage;
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
  /**
   * @param string
   */
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  /**
   * @return string
   */
  public function getTotalResults()
  {
    return $this->totalResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchQueriesRequest::class, 'Google_Service_CustomSearchAPI_SearchQueriesRequest');
