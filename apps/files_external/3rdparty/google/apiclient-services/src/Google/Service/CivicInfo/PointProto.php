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

class Google_Service_CivicInfo_PointProto extends Google_Model
{
  public $latE7;
  public $lngE7;
  protected $metadataType = 'Google_Service_CivicInfo_FieldMetadataProto';
  protected $metadataDataType = '';

  public function setLatE7($latE7)
  {
    $this->latE7 = $latE7;
  }
  public function getLatE7()
  {
    return $this->latE7;
  }
  public function setLngE7($lngE7)
  {
    $this->lngE7 = $lngE7;
  }
  public function getLngE7()
  {
    return $this->lngE7;
  }
  /**
   * @param Google_Service_CivicInfo_FieldMetadataProto
   */
  public function setMetadata(Google_Service_CivicInfo_FieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CivicInfo_FieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}
