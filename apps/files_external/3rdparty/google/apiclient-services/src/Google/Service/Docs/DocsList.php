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

class Google_Service_Docs_DocsList extends Google_Collection
{
  protected $collection_key = 'suggestedDeletionIds';
  protected $listPropertiesType = 'Google_Service_Docs_ListProperties';
  protected $listPropertiesDataType = '';
  public $suggestedDeletionIds;
  public $suggestedInsertionId;
  protected $suggestedListPropertiesChangesType = 'Google_Service_Docs_SuggestedListProperties';
  protected $suggestedListPropertiesChangesDataType = 'map';

  /**
   * @param Google_Service_Docs_ListProperties
   */
  public function setListProperties(Google_Service_Docs_ListProperties $listProperties)
  {
    $this->listProperties = $listProperties;
  }
  /**
   * @return Google_Service_Docs_ListProperties
   */
  public function getListProperties()
  {
    return $this->listProperties;
  }
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  public function setSuggestedInsertionId($suggestedInsertionId)
  {
    $this->suggestedInsertionId = $suggestedInsertionId;
  }
  public function getSuggestedInsertionId()
  {
    return $this->suggestedInsertionId;
  }
  /**
   * @param Google_Service_Docs_SuggestedListProperties[]
   */
  public function setSuggestedListPropertiesChanges($suggestedListPropertiesChanges)
  {
    $this->suggestedListPropertiesChanges = $suggestedListPropertiesChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedListProperties[]
   */
  public function getSuggestedListPropertiesChanges()
  {
    return $this->suggestedListPropertiesChanges;
  }
}
