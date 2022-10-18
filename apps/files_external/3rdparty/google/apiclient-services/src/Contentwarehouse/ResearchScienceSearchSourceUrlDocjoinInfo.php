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

class ResearchScienceSearchSourceUrlDocjoinInfo extends \Google\Collection
{
  protected $collection_key = 'topEntity';
  /**
   * @var string
   */
  public $dataSource;
  /**
   * @var string
   */
  public $displayUrl;
  /**
   * @var string
   */
  public $docid;
  protected $fieldOfStudyEntityType = ResearchScienceSearchSourceUrlDocjoinInfoWebrefEntityInfo::class;
  protected $fieldOfStudyEntityDataType = 'array';
  /**
   * @var string[]
   */
  public $indexTier;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $latestPageUpdateDate;
  protected $navboostQueryType = ResearchScienceSearchNavboostQueryInfo::class;
  protected $navboostQueryDataType = 'array';
  /**
   * @var int
   */
  public $pagerank;
  protected $petacatInfoType = FatcatCompactDocClassification::class;
  protected $petacatInfoDataType = '';
  protected $salientTermsType = QualitySalientTermsSalientTermSet::class;
  protected $salientTermsDataType = '';
  protected $scholarInfoType = ScienceIndexSignal::class;
  protected $scholarInfoDataType = '';
  /**
   * @var string[]
   */
  public $sporeGraphMid;
  /**
   * @var string
   */
  public $title;
  protected $topEntityType = RepositoryWebrefWebrefEntity::class;
  protected $topEntityDataType = 'array';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setDataSource($dataSource)
  {
    $this->dataSource = $dataSource;
  }
  /**
   * @return string
   */
  public function getDataSource()
  {
    return $this->dataSource;
  }
  /**
   * @param string
   */
  public function setDisplayUrl($displayUrl)
  {
    $this->displayUrl = $displayUrl;
  }
  /**
   * @return string
   */
  public function getDisplayUrl()
  {
    return $this->displayUrl;
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
   * @param ResearchScienceSearchSourceUrlDocjoinInfoWebrefEntityInfo[]
   */
  public function setFieldOfStudyEntity($fieldOfStudyEntity)
  {
    $this->fieldOfStudyEntity = $fieldOfStudyEntity;
  }
  /**
   * @return ResearchScienceSearchSourceUrlDocjoinInfoWebrefEntityInfo[]
   */
  public function getFieldOfStudyEntity()
  {
    return $this->fieldOfStudyEntity;
  }
  /**
   * @param string[]
   */
  public function setIndexTier($indexTier)
  {
    $this->indexTier = $indexTier;
  }
  /**
   * @return string[]
   */
  public function getIndexTier()
  {
    return $this->indexTier;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLatestPageUpdateDate($latestPageUpdateDate)
  {
    $this->latestPageUpdateDate = $latestPageUpdateDate;
  }
  /**
   * @return string
   */
  public function getLatestPageUpdateDate()
  {
    return $this->latestPageUpdateDate;
  }
  /**
   * @param ResearchScienceSearchNavboostQueryInfo[]
   */
  public function setNavboostQuery($navboostQuery)
  {
    $this->navboostQuery = $navboostQuery;
  }
  /**
   * @return ResearchScienceSearchNavboostQueryInfo[]
   */
  public function getNavboostQuery()
  {
    return $this->navboostQuery;
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
   * @param FatcatCompactDocClassification
   */
  public function setPetacatInfo(FatcatCompactDocClassification $petacatInfo)
  {
    $this->petacatInfo = $petacatInfo;
  }
  /**
   * @return FatcatCompactDocClassification
   */
  public function getPetacatInfo()
  {
    return $this->petacatInfo;
  }
  /**
   * @param QualitySalientTermsSalientTermSet
   */
  public function setSalientTerms(QualitySalientTermsSalientTermSet $salientTerms)
  {
    $this->salientTerms = $salientTerms;
  }
  /**
   * @return QualitySalientTermsSalientTermSet
   */
  public function getSalientTerms()
  {
    return $this->salientTerms;
  }
  /**
   * @param ScienceIndexSignal
   */
  public function setScholarInfo(ScienceIndexSignal $scholarInfo)
  {
    $this->scholarInfo = $scholarInfo;
  }
  /**
   * @return ScienceIndexSignal
   */
  public function getScholarInfo()
  {
    return $this->scholarInfo;
  }
  /**
   * @param string[]
   */
  public function setSporeGraphMid($sporeGraphMid)
  {
    $this->sporeGraphMid = $sporeGraphMid;
  }
  /**
   * @return string[]
   */
  public function getSporeGraphMid()
  {
    return $this->sporeGraphMid;
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
   * @param RepositoryWebrefWebrefEntity[]
   */
  public function setTopEntity($topEntity)
  {
    $this->topEntity = $topEntity;
  }
  /**
   * @return RepositoryWebrefWebrefEntity[]
   */
  public function getTopEntity()
  {
    return $this->topEntity;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchSourceUrlDocjoinInfo::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchSourceUrlDocjoinInfo');
