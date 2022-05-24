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

namespace Google\Service\CloudSearch;

class SearchApplication extends \Google\Collection
{
  protected $collection_key = 'sourceConfig';
  protected $dataSourceRestrictionsType = DataSourceRestriction::class;
  protected $dataSourceRestrictionsDataType = 'array';
  protected $defaultFacetOptionsType = FacetOptions::class;
  protected $defaultFacetOptionsDataType = 'array';
  protected $defaultSortOptionsType = SortOptions::class;
  protected $defaultSortOptionsDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $enableAuditLog;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $operationIds;
  protected $queryInterpretationConfigType = QueryInterpretationConfig::class;
  protected $queryInterpretationConfigDataType = '';
  /**
   * @var bool
   */
  public $returnResultThumbnailUrls;
  protected $scoringConfigType = ScoringConfig::class;
  protected $scoringConfigDataType = '';
  protected $sourceConfigType = SourceConfig::class;
  protected $sourceConfigDataType = 'array';

  /**
   * @param DataSourceRestriction[]
   */
  public function setDataSourceRestrictions($dataSourceRestrictions)
  {
    $this->dataSourceRestrictions = $dataSourceRestrictions;
  }
  /**
   * @return DataSourceRestriction[]
   */
  public function getDataSourceRestrictions()
  {
    return $this->dataSourceRestrictions;
  }
  /**
   * @param FacetOptions[]
   */
  public function setDefaultFacetOptions($defaultFacetOptions)
  {
    $this->defaultFacetOptions = $defaultFacetOptions;
  }
  /**
   * @return FacetOptions[]
   */
  public function getDefaultFacetOptions()
  {
    return $this->defaultFacetOptions;
  }
  /**
   * @param SortOptions
   */
  public function setDefaultSortOptions(SortOptions $defaultSortOptions)
  {
    $this->defaultSortOptions = $defaultSortOptions;
  }
  /**
   * @return SortOptions
   */
  public function getDefaultSortOptions()
  {
    return $this->defaultSortOptions;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setEnableAuditLog($enableAuditLog)
  {
    $this->enableAuditLog = $enableAuditLog;
  }
  /**
   * @return bool
   */
  public function getEnableAuditLog()
  {
    return $this->enableAuditLog;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setOperationIds($operationIds)
  {
    $this->operationIds = $operationIds;
  }
  /**
   * @return string[]
   */
  public function getOperationIds()
  {
    return $this->operationIds;
  }
  /**
   * @param QueryInterpretationConfig
   */
  public function setQueryInterpretationConfig(QueryInterpretationConfig $queryInterpretationConfig)
  {
    $this->queryInterpretationConfig = $queryInterpretationConfig;
  }
  /**
   * @return QueryInterpretationConfig
   */
  public function getQueryInterpretationConfig()
  {
    return $this->queryInterpretationConfig;
  }
  /**
   * @param bool
   */
  public function setReturnResultThumbnailUrls($returnResultThumbnailUrls)
  {
    $this->returnResultThumbnailUrls = $returnResultThumbnailUrls;
  }
  /**
   * @return bool
   */
  public function getReturnResultThumbnailUrls()
  {
    return $this->returnResultThumbnailUrls;
  }
  /**
   * @param ScoringConfig
   */
  public function setScoringConfig(ScoringConfig $scoringConfig)
  {
    $this->scoringConfig = $scoringConfig;
  }
  /**
   * @return ScoringConfig
   */
  public function getScoringConfig()
  {
    return $this->scoringConfig;
  }
  /**
   * @param SourceConfig[]
   */
  public function setSourceConfig($sourceConfig)
  {
    $this->sourceConfig = $sourceConfig;
  }
  /**
   * @return SourceConfig[]
   */
  public function getSourceConfig()
  {
    return $this->sourceConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchApplication::class, 'Google_Service_CloudSearch_SearchApplication');
