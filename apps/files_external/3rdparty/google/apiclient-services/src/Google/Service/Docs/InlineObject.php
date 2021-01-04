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

class Google_Service_Docs_InlineObject extends Google_Collection
{
  protected $collection_key = 'suggestedDeletionIds';
  protected $inlineObjectPropertiesType = 'Google_Service_Docs_InlineObjectProperties';
  protected $inlineObjectPropertiesDataType = '';
  public $objectId;
  public $suggestedDeletionIds;
  protected $suggestedInlineObjectPropertiesChangesType = 'Google_Service_Docs_SuggestedInlineObjectProperties';
  protected $suggestedInlineObjectPropertiesChangesDataType = 'map';
  public $suggestedInsertionId;

  /**
   * @param Google_Service_Docs_InlineObjectProperties
   */
  public function setInlineObjectProperties(Google_Service_Docs_InlineObjectProperties $inlineObjectProperties)
  {
    $this->inlineObjectProperties = $inlineObjectProperties;
  }
  /**
   * @return Google_Service_Docs_InlineObjectProperties
   */
  public function getInlineObjectProperties()
  {
    return $this->inlineObjectProperties;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  /**
   * @param Google_Service_Docs_SuggestedInlineObjectProperties[]
   */
  public function setSuggestedInlineObjectPropertiesChanges($suggestedInlineObjectPropertiesChanges)
  {
    $this->suggestedInlineObjectPropertiesChanges = $suggestedInlineObjectPropertiesChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedInlineObjectProperties[]
   */
  public function getSuggestedInlineObjectPropertiesChanges()
  {
    return $this->suggestedInlineObjectPropertiesChanges;
  }
  public function setSuggestedInsertionId($suggestedInsertionId)
  {
    $this->suggestedInsertionId = $suggestedInsertionId;
  }
  public function getSuggestedInsertionId()
  {
    return $this->suggestedInsertionId;
  }
}
