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

class Google_Service_YouTube_AbuseReport extends Google_Collection
{
  protected $collection_key = 'relatedEntities';
  protected $abuseTypesType = 'Google_Service_YouTube_AbuseType';
  protected $abuseTypesDataType = 'array';
  public $description;
  protected $relatedEntitiesType = 'Google_Service_YouTube_RelatedEntity';
  protected $relatedEntitiesDataType = 'array';
  protected $subjectType = 'Google_Service_YouTube_Entity';
  protected $subjectDataType = '';

  /**
   * @param Google_Service_YouTube_AbuseType
   */
  public function setAbuseTypes($abuseTypes)
  {
    $this->abuseTypes = $abuseTypes;
  }
  /**
   * @return Google_Service_YouTube_AbuseType
   */
  public function getAbuseTypes()
  {
    return $this->abuseTypes;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_YouTube_RelatedEntity
   */
  public function setRelatedEntities($relatedEntities)
  {
    $this->relatedEntities = $relatedEntities;
  }
  /**
   * @return Google_Service_YouTube_RelatedEntity
   */
  public function getRelatedEntities()
  {
    return $this->relatedEntities;
  }
  /**
   * @param Google_Service_YouTube_Entity
   */
  public function setSubject(Google_Service_YouTube_Entity $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Google_Service_YouTube_Entity
   */
  public function getSubject()
  {
    return $this->subject;
  }
}
