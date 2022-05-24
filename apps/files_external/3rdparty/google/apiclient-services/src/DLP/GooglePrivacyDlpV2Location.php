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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2Location extends \Google\Collection
{
  protected $collection_key = 'contentLocations';
  protected $byteRangeType = GooglePrivacyDlpV2Range::class;
  protected $byteRangeDataType = '';
  protected $codepointRangeType = GooglePrivacyDlpV2Range::class;
  protected $codepointRangeDataType = '';
  protected $containerType = GooglePrivacyDlpV2Container::class;
  protected $containerDataType = '';
  protected $contentLocationsType = GooglePrivacyDlpV2ContentLocation::class;
  protected $contentLocationsDataType = 'array';

  /**
   * @param GooglePrivacyDlpV2Range
   */
  public function setByteRange(GooglePrivacyDlpV2Range $byteRange)
  {
    $this->byteRange = $byteRange;
  }
  /**
   * @return GooglePrivacyDlpV2Range
   */
  public function getByteRange()
  {
    return $this->byteRange;
  }
  /**
   * @param GooglePrivacyDlpV2Range
   */
  public function setCodepointRange(GooglePrivacyDlpV2Range $codepointRange)
  {
    $this->codepointRange = $codepointRange;
  }
  /**
   * @return GooglePrivacyDlpV2Range
   */
  public function getCodepointRange()
  {
    return $this->codepointRange;
  }
  /**
   * @param GooglePrivacyDlpV2Container
   */
  public function setContainer(GooglePrivacyDlpV2Container $container)
  {
    $this->container = $container;
  }
  /**
   * @return GooglePrivacyDlpV2Container
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param GooglePrivacyDlpV2ContentLocation[]
   */
  public function setContentLocations($contentLocations)
  {
    $this->contentLocations = $contentLocations;
  }
  /**
   * @return GooglePrivacyDlpV2ContentLocation[]
   */
  public function getContentLocations()
  {
    return $this->contentLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Location::class, 'Google_Service_DLP_GooglePrivacyDlpV2Location');
