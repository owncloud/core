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

class Google_Service_CloudSearch_SearchApplication extends Google_Collection
{
  protected $collection_key = 'sourceConfig';
  protected $dataSourceRestrictionsType = 'Google_Service_CloudSearch_DataSourceRestriction';
  protected $dataSourceRestrictionsDataType = 'array';
  protected $defaultFacetOptionsType = 'Google_Service_CloudSearch_FacetOptions';
  protected $defaultFacetOptionsDataType = 'array';
  protected $defaultSortOptionsType = 'Google_Service_CloudSearch_SortOptions';
  protected $defaultSortOptionsDataType = '';
  public $displayName;
  public $enableAuditLog;
  public $name;
  public $operationIds;
  protected $scoringConfigType = 'Google_Service_CloudSearch_ScoringConfig';
  protected $scoringConfigDataType = '';
  protected $sourceConfigType = 'Google_Service_CloudSearch_SourceConfig';
  protected $sourceConfigDataType = 'array';

  /**
   * @param Google_Service_CloudSearch_DataSourceRestriction[]
   */
  public function setDataSourceRestrictions($dataSourceRestrictions)
  {
    $this->dataSourceRestrictions = $dataSourceRestrictions;
  }
  /**
   * @return Google_Service_CloudSearch_DataSourceRestriction[]
   */
  public function getDataSourceRestrictions()
  {
    return $this->dataSourceRestrictions;
  }
  /**
   * @param Google_Service_CloudSearch_FacetOptions[]
   */
  public function setDefaultFacetOptions($defaultFacetOptions)
  {
    $this->defaultFacetOptions = $defaultFacetOptions;
  }
  /**
   * @return Google_Service_CloudSearch_FacetOptions[]
   */
  public function getDefaultFacetOptions()
  {
    return $this->defaultFacetOptions;
  }
  /**
   * @param Google_Service_CloudSearch_SortOptions
   */
  public function setDefaultSortOptions(Google_Service_CloudSearch_SortOptions $defaultSortOptions)
  {
    $this->defaultSortOptions = $defaultSortOptions;
  }
  /**
   * @return Google_Service_CloudSearch_SortOptions
   */
  public function getDefaultSortOptions()
  {
    return $this->defaultSortOptions;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnableAuditLog($enableAuditLog)
  {
    $this->enableAuditLog = $enableAuditLog;
  }
  public function getEnableAuditLog()
  {
    return $this->enableAuditLog;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOperationIds($operationIds)
  {
    $this->operationIds = $operationIds;
  }
  public function getOperationIds()
  {
    return $this->operationIds;
  }
  /**
   * @param Google_Service_CloudSearch_ScoringConfig
   */
  public function setScoringConfig(Google_Service_CloudSearch_ScoringConfig $scoringConfig)
  {
    $this->scoringConfig = $scoringConfig;
  }
  /**
   * @return Google_Service_CloudSearch_ScoringConfig
   */
  public function getScoringConfig()
  {
    return $this->scoringConfig;
  }
  /**
   * @param Google_Service_CloudSearch_SourceConfig[]
   */
  public function setSourceConfig($sourceConfig)
  {
    $this->sourceConfig = $sourceConfig;
  }
  /**
   * @return Google_Service_CloudSearch_SourceConfig[]
   */
  public function getSourceConfig()
  {
    return $this->sourceConfig;
  }
}
