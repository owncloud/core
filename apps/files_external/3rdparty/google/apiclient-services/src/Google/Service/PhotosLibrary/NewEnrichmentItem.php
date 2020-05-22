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

class Google_Service_PhotosLibrary_NewEnrichmentItem extends Google_Model
{
  protected $locationEnrichmentType = 'Google_Service_PhotosLibrary_LocationEnrichment';
  protected $locationEnrichmentDataType = '';
  protected $mapEnrichmentType = 'Google_Service_PhotosLibrary_MapEnrichment';
  protected $mapEnrichmentDataType = '';
  protected $textEnrichmentType = 'Google_Service_PhotosLibrary_TextEnrichment';
  protected $textEnrichmentDataType = '';

  /**
   * @param Google_Service_PhotosLibrary_LocationEnrichment
   */
  public function setLocationEnrichment(Google_Service_PhotosLibrary_LocationEnrichment $locationEnrichment)
  {
    $this->locationEnrichment = $locationEnrichment;
  }
  /**
   * @return Google_Service_PhotosLibrary_LocationEnrichment
   */
  public function getLocationEnrichment()
  {
    return $this->locationEnrichment;
  }
  /**
   * @param Google_Service_PhotosLibrary_MapEnrichment
   */
  public function setMapEnrichment(Google_Service_PhotosLibrary_MapEnrichment $mapEnrichment)
  {
    $this->mapEnrichment = $mapEnrichment;
  }
  /**
   * @return Google_Service_PhotosLibrary_MapEnrichment
   */
  public function getMapEnrichment()
  {
    return $this->mapEnrichment;
  }
  /**
   * @param Google_Service_PhotosLibrary_TextEnrichment
   */
  public function setTextEnrichment(Google_Service_PhotosLibrary_TextEnrichment $textEnrichment)
  {
    $this->textEnrichment = $textEnrichment;
  }
  /**
   * @return Google_Service_PhotosLibrary_TextEnrichment
   */
  public function getTextEnrichment()
  {
    return $this->textEnrichment;
  }
}
