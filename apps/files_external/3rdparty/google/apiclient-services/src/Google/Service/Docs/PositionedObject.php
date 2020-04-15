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

class Google_Service_Docs_PositionedObject extends Google_Collection
{
  protected $collection_key = 'suggestedDeletionIds';
  public $objectId;
  protected $positionedObjectPropertiesType = 'Google_Service_Docs_PositionedObjectProperties';
  protected $positionedObjectPropertiesDataType = '';
  public $suggestedDeletionIds;
  public $suggestedInsertionId;
  protected $suggestedPositionedObjectPropertiesChangesType = 'Google_Service_Docs_SuggestedPositionedObjectProperties';
  protected $suggestedPositionedObjectPropertiesChangesDataType = 'map';

  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Google_Service_Docs_PositionedObjectProperties
   */
  public function setPositionedObjectProperties(Google_Service_Docs_PositionedObjectProperties $positionedObjectProperties)
  {
    $this->positionedObjectProperties = $positionedObjectProperties;
  }
  /**
   * @return Google_Service_Docs_PositionedObjectProperties
   */
  public function getPositionedObjectProperties()
  {
    return $this->positionedObjectProperties;
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
   * @param Google_Service_Docs_SuggestedPositionedObjectProperties
   */
  public function setSuggestedPositionedObjectPropertiesChanges($suggestedPositionedObjectPropertiesChanges)
  {
    $this->suggestedPositionedObjectPropertiesChanges = $suggestedPositionedObjectPropertiesChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedPositionedObjectProperties
   */
  public function getSuggestedPositionedObjectPropertiesChanges()
  {
    return $this->suggestedPositionedObjectPropertiesChanges;
  }
}
