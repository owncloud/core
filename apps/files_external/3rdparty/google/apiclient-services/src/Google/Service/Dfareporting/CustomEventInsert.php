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

class Google_Service_Dfareporting_CustomEventInsert extends Google_Model
{
  protected $cmDimensionsType = 'Google_Service_Dfareporting_CampaignManagerIds';
  protected $cmDimensionsDataType = '';
  protected $dv3DimensionsType = 'Google_Service_Dfareporting_DV3Ids';
  protected $dv3DimensionsDataType = '';
  public $insertEventType;
  public $kind;
  public $matchId;
  public $mobileDeviceId;

  /**
   * @param Google_Service_Dfareporting_CampaignManagerIds
   */
  public function setCmDimensions(Google_Service_Dfareporting_CampaignManagerIds $cmDimensions)
  {
    $this->cmDimensions = $cmDimensions;
  }
  /**
   * @return Google_Service_Dfareporting_CampaignManagerIds
   */
  public function getCmDimensions()
  {
    return $this->cmDimensions;
  }
  /**
   * @param Google_Service_Dfareporting_DV3Ids
   */
  public function setDv3Dimensions(Google_Service_Dfareporting_DV3Ids $dv3Dimensions)
  {
    $this->dv3Dimensions = $dv3Dimensions;
  }
  /**
   * @return Google_Service_Dfareporting_DV3Ids
   */
  public function getDv3Dimensions()
  {
    return $this->dv3Dimensions;
  }
  public function setInsertEventType($insertEventType)
  {
    $this->insertEventType = $insertEventType;
  }
  public function getInsertEventType()
  {
    return $this->insertEventType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMatchId($matchId)
  {
    $this->matchId = $matchId;
  }
  public function getMatchId()
  {
    return $this->matchId;
  }
  public function setMobileDeviceId($mobileDeviceId)
  {
    $this->mobileDeviceId = $mobileDeviceId;
  }
  public function getMobileDeviceId()
  {
    return $this->mobileDeviceId;
  }
}
