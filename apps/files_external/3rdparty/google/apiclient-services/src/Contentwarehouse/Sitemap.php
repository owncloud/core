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

class Sitemap extends \Google\Collection
{
  protected $collection_key = 'deprecatedTarget';
  protected $internal_gapi_mappings = [
        "dEPRECATEDSourceTitle" => "DEPRECATEDSourceTitle",
        "targetGroups" => "TargetGroups",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDSourceTitle;
  protected $targetGroupsType = QualitySitemapTargetGroup::class;
  protected $targetGroupsDataType = 'array';
  protected $deprecatedTargetType = SitemapDEPRECATEDTarget::class;
  protected $deprecatedTargetDataType = 'array';
  /**
   * @var bool
   */
  public $searchInSite;
  /**
   * @var string
   */
  public $sitemapType;
  /**
   * @var string
   */
  public $sourceOrgfp;
  /**
   * @var string
   */
  public $sourceUrl;
  protected $subresultListType = QualitySitemapSubresultList::class;
  protected $subresultListDataType = '';

  /**
   * @param string
   */
  public function setDEPRECATEDSourceTitle($dEPRECATEDSourceTitle)
  {
    $this->dEPRECATEDSourceTitle = $dEPRECATEDSourceTitle;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDSourceTitle()
  {
    return $this->dEPRECATEDSourceTitle;
  }
  /**
   * @param QualitySitemapTargetGroup[]
   */
  public function setTargetGroups($targetGroups)
  {
    $this->targetGroups = $targetGroups;
  }
  /**
   * @return QualitySitemapTargetGroup[]
   */
  public function getTargetGroups()
  {
    return $this->targetGroups;
  }
  /**
   * @param SitemapDEPRECATEDTarget[]
   */
  public function setDeprecatedTarget($deprecatedTarget)
  {
    $this->deprecatedTarget = $deprecatedTarget;
  }
  /**
   * @return SitemapDEPRECATEDTarget[]
   */
  public function getDeprecatedTarget()
  {
    return $this->deprecatedTarget;
  }
  /**
   * @param bool
   */
  public function setSearchInSite($searchInSite)
  {
    $this->searchInSite = $searchInSite;
  }
  /**
   * @return bool
   */
  public function getSearchInSite()
  {
    return $this->searchInSite;
  }
  /**
   * @param string
   */
  public function setSitemapType($sitemapType)
  {
    $this->sitemapType = $sitemapType;
  }
  /**
   * @return string
   */
  public function getSitemapType()
  {
    return $this->sitemapType;
  }
  /**
   * @param string
   */
  public function setSourceOrgfp($sourceOrgfp)
  {
    $this->sourceOrgfp = $sourceOrgfp;
  }
  /**
   * @return string
   */
  public function getSourceOrgfp()
  {
    return $this->sourceOrgfp;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  /**
   * @param QualitySitemapSubresultList
   */
  public function setSubresultList(QualitySitemapSubresultList $subresultList)
  {
    $this->subresultList = $subresultList;
  }
  /**
   * @return QualitySitemapSubresultList
   */
  public function getSubresultList()
  {
    return $this->subresultList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sitemap::class, 'Google_Service_Contentwarehouse_Sitemap');
