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

class Google_Service_DLP_GooglePrivacyDlpV2Location extends Google_Collection
{
  protected $collection_key = 'contentLocations';
  protected $byteRangeType = 'Google_Service_DLP_GooglePrivacyDlpV2Range';
  protected $byteRangeDataType = '';
  protected $codepointRangeType = 'Google_Service_DLP_GooglePrivacyDlpV2Range';
  protected $codepointRangeDataType = '';
  protected $containerType = 'Google_Service_DLP_GooglePrivacyDlpV2Container';
  protected $containerDataType = '';
  protected $contentLocationsType = 'Google_Service_DLP_GooglePrivacyDlpV2ContentLocation';
  protected $contentLocationsDataType = 'array';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Range
   */
  public function setByteRange(Google_Service_DLP_GooglePrivacyDlpV2Range $byteRange)
  {
    $this->byteRange = $byteRange;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Range
   */
  public function getByteRange()
  {
    return $this->byteRange;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Range
   */
  public function setCodepointRange(Google_Service_DLP_GooglePrivacyDlpV2Range $codepointRange)
  {
    $this->codepointRange = $codepointRange;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Range
   */
  public function getCodepointRange()
  {
    return $this->codepointRange;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Container
   */
  public function setContainer(Google_Service_DLP_GooglePrivacyDlpV2Container $container)
  {
    $this->container = $container;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Container
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ContentLocation
   */
  public function setContentLocations($contentLocations)
  {
    $this->contentLocations = $contentLocations;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ContentLocation
   */
  public function getContentLocations()
  {
    return $this->contentLocations;
  }
}
