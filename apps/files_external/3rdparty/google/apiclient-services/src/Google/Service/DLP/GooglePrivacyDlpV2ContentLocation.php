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

class Google_Service_DLP_GooglePrivacyDlpV2ContentLocation extends Google_Model
{
  public $containerName;
  public $containerTimestamp;
  public $containerVersion;
  protected $documentLocationType = 'Google_Service_DLP_GooglePrivacyDlpV2DocumentLocation';
  protected $documentLocationDataType = '';
  protected $imageLocationType = 'Google_Service_DLP_GooglePrivacyDlpV2ImageLocation';
  protected $imageLocationDataType = '';
  protected $metadataLocationType = 'Google_Service_DLP_GooglePrivacyDlpV2MetadataLocation';
  protected $metadataLocationDataType = '';
  protected $recordLocationType = 'Google_Service_DLP_GooglePrivacyDlpV2RecordLocation';
  protected $recordLocationDataType = '';

  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  public function getContainerName()
  {
    return $this->containerName;
  }
  public function setContainerTimestamp($containerTimestamp)
  {
    $this->containerTimestamp = $containerTimestamp;
  }
  public function getContainerTimestamp()
  {
    return $this->containerTimestamp;
  }
  public function setContainerVersion($containerVersion)
  {
    $this->containerVersion = $containerVersion;
  }
  public function getContainerVersion()
  {
    return $this->containerVersion;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DocumentLocation
   */
  public function setDocumentLocation(Google_Service_DLP_GooglePrivacyDlpV2DocumentLocation $documentLocation)
  {
    $this->documentLocation = $documentLocation;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DocumentLocation
   */
  public function getDocumentLocation()
  {
    return $this->documentLocation;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ImageLocation
   */
  public function setImageLocation(Google_Service_DLP_GooglePrivacyDlpV2ImageLocation $imageLocation)
  {
    $this->imageLocation = $imageLocation;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ImageLocation
   */
  public function getImageLocation()
  {
    return $this->imageLocation;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2MetadataLocation
   */
  public function setMetadataLocation(Google_Service_DLP_GooglePrivacyDlpV2MetadataLocation $metadataLocation)
  {
    $this->metadataLocation = $metadataLocation;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2MetadataLocation
   */
  public function getMetadataLocation()
  {
    return $this->metadataLocation;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2RecordLocation
   */
  public function setRecordLocation(Google_Service_DLP_GooglePrivacyDlpV2RecordLocation $recordLocation)
  {
    $this->recordLocation = $recordLocation;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2RecordLocation
   */
  public function getRecordLocation()
  {
    return $this->recordLocation;
  }
}
