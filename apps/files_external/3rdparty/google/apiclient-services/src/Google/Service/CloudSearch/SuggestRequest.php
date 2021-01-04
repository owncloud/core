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

class Google_Service_CloudSearch_SuggestRequest extends Google_Collection
{
  protected $collection_key = 'dataSourceRestrictions';
  protected $dataSourceRestrictionsType = 'Google_Service_CloudSearch_DataSourceRestriction';
  protected $dataSourceRestrictionsDataType = 'array';
  public $query;
  protected $requestOptionsType = 'Google_Service_CloudSearch_RequestOptions';
  protected $requestOptionsDataType = '';

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
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_CloudSearch_RequestOptions
   */
  public function setRequestOptions(Google_Service_CloudSearch_RequestOptions $requestOptions)
  {
    $this->requestOptions = $requestOptions;
  }
  /**
   * @return Google_Service_CloudSearch_RequestOptions
   */
  public function getRequestOptions()
  {
    return $this->requestOptions;
  }
}
