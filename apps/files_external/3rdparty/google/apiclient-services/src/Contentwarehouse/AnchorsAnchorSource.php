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

class AnchorsAnchorSource extends \Google\Collection
{
  protected $collection_key = 'pageTags';
  protected $additionalInfoType = Proto2BridgeMessageSet::class;
  protected $additionalInfoDataType = '';
  /**
   * @var int
   */
  public $cluster;
  /**
   * @var string
   */
  public $compressedUrl;
  /**
   * @var string
   */
  public $crawlTimestamp;
  /**
   * @var string
   */
  public $docid;
  /**
   * @var int
   */
  public $doclength;
  /**
   * @var int
   */
  public $homePageInfo;
  /**
   * @var int
   */
  public $indyrank;
  /**
   * @var int
   */
  public $ipaddr;
  /**
   * @var int
   */
  public $language;
  /**
   * @var string
   */
  public $linkhash;
  /**
   * @var int[]
   */
  public $localCountryCodes;
  /**
   * @var string
   */
  public $nsr;
  /**
   * @var int
   */
  public $outdegree;
  /**
   * @var int
   */
  public $outsites;
  /**
   * @var string
   */
  public $packedIpaddress;
  /**
   * @var int[]
   */
  public $pageTags;
  /**
   * @var int
   */
  public $pagerank;
  /**
   * @var int
   */
  public $pagerankNs;
  /**
   * @var int
   */
  public $seglanguage;
  /**
   * @var string
   */
  public $site;
  /**
   * @var int
   */
  public $spamrank;
  /**
   * @var int
   */
  public $spamscore1;
  /**
   * @var int
   */
  public $spamscore2;
  /**
   * @var string
   */
  public $webtableKey;

  /**
   * @param Proto2BridgeMessageSet
   */
  public function setAdditionalInfo(Proto2BridgeMessageSet $additionalInfo)
  {
    $this->additionalInfo = $additionalInfo;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getAdditionalInfo()
  {
    return $this->additionalInfo;
  }
  /**
   * @param int
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return int
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param string
   */
  public function setCompressedUrl($compressedUrl)
  {
    $this->compressedUrl = $compressedUrl;
  }
  /**
   * @return string
   */
  public function getCompressedUrl()
  {
    return $this->compressedUrl;
  }
  /**
   * @param string
   */
  public function setCrawlTimestamp($crawlTimestamp)
  {
    $this->crawlTimestamp = $crawlTimestamp;
  }
  /**
   * @return string
   */
  public function getCrawlTimestamp()
  {
    return $this->crawlTimestamp;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param int
   */
  public function setDoclength($doclength)
  {
    $this->doclength = $doclength;
  }
  /**
   * @return int
   */
  public function getDoclength()
  {
    return $this->doclength;
  }
  /**
   * @param int
   */
  public function setHomePageInfo($homePageInfo)
  {
    $this->homePageInfo = $homePageInfo;
  }
  /**
   * @return int
   */
  public function getHomePageInfo()
  {
    return $this->homePageInfo;
  }
  /**
   * @param int
   */
  public function setIndyrank($indyrank)
  {
    $this->indyrank = $indyrank;
  }
  /**
   * @return int
   */
  public function getIndyrank()
  {
    return $this->indyrank;
  }
  /**
   * @param int
   */
  public function setIpaddr($ipaddr)
  {
    $this->ipaddr = $ipaddr;
  }
  /**
   * @return int
   */
  public function getIpaddr()
  {
    return $this->ipaddr;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLinkhash($linkhash)
  {
    $this->linkhash = $linkhash;
  }
  /**
   * @return string
   */
  public function getLinkhash()
  {
    return $this->linkhash;
  }
  /**
   * @param int[]
   */
  public function setLocalCountryCodes($localCountryCodes)
  {
    $this->localCountryCodes = $localCountryCodes;
  }
  /**
   * @return int[]
   */
  public function getLocalCountryCodes()
  {
    return $this->localCountryCodes;
  }
  /**
   * @param string
   */
  public function setNsr($nsr)
  {
    $this->nsr = $nsr;
  }
  /**
   * @return string
   */
  public function getNsr()
  {
    return $this->nsr;
  }
  /**
   * @param int
   */
  public function setOutdegree($outdegree)
  {
    $this->outdegree = $outdegree;
  }
  /**
   * @return int
   */
  public function getOutdegree()
  {
    return $this->outdegree;
  }
  /**
   * @param int
   */
  public function setOutsites($outsites)
  {
    $this->outsites = $outsites;
  }
  /**
   * @return int
   */
  public function getOutsites()
  {
    return $this->outsites;
  }
  /**
   * @param string
   */
  public function setPackedIpaddress($packedIpaddress)
  {
    $this->packedIpaddress = $packedIpaddress;
  }
  /**
   * @return string
   */
  public function getPackedIpaddress()
  {
    return $this->packedIpaddress;
  }
  /**
   * @param int[]
   */
  public function setPageTags($pageTags)
  {
    $this->pageTags = $pageTags;
  }
  /**
   * @return int[]
   */
  public function getPageTags()
  {
    return $this->pageTags;
  }
  /**
   * @param int
   */
  public function setPagerank($pagerank)
  {
    $this->pagerank = $pagerank;
  }
  /**
   * @return int
   */
  public function getPagerank()
  {
    return $this->pagerank;
  }
  /**
   * @param int
   */
  public function setPagerankNs($pagerankNs)
  {
    $this->pagerankNs = $pagerankNs;
  }
  /**
   * @return int
   */
  public function getPagerankNs()
  {
    return $this->pagerankNs;
  }
  /**
   * @param int
   */
  public function setSeglanguage($seglanguage)
  {
    $this->seglanguage = $seglanguage;
  }
  /**
   * @return int
   */
  public function getSeglanguage()
  {
    return $this->seglanguage;
  }
  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
  /**
   * @param int
   */
  public function setSpamrank($spamrank)
  {
    $this->spamrank = $spamrank;
  }
  /**
   * @return int
   */
  public function getSpamrank()
  {
    return $this->spamrank;
  }
  /**
   * @param int
   */
  public function setSpamscore1($spamscore1)
  {
    $this->spamscore1 = $spamscore1;
  }
  /**
   * @return int
   */
  public function getSpamscore1()
  {
    return $this->spamscore1;
  }
  /**
   * @param int
   */
  public function setSpamscore2($spamscore2)
  {
    $this->spamscore2 = $spamscore2;
  }
  /**
   * @return int
   */
  public function getSpamscore2()
  {
    return $this->spamscore2;
  }
  /**
   * @param string
   */
  public function setWebtableKey($webtableKey)
  {
    $this->webtableKey = $webtableKey;
  }
  /**
   * @return string
   */
  public function getWebtableKey()
  {
    return $this->webtableKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnchorsAnchorSource::class, 'Google_Service_Contentwarehouse_AnchorsAnchorSource');
