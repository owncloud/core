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

namespace Google\Service\Contentwarehouse;

class GeostoreFeatureHistoryMetadataProto extends \Google\Model
{
  /**
   * @var string
   */
  public $featureBirthTimestampUs;
  /**
   * @var string
   */
  public $lastModificationTimestampUs;
  /**
   * @var string
   */
  public $removalTimestampUs;

  /**
   * @param string
   */
  public function setFeatureBirthTimestampUs($featureBirthTimestampUs)
  {
    $this->featureBirthTimestampUs = $featureBirthTimestampUs;
  }
  /**
   * @return string
   */
  public function getFeatureBirthTimestampUs()
  {
    return $this->featureBirthTimestampUs;
  }
  /**
   * @param string
   */
  public function setLastModificationTimestampUs($lastModificationTimestampUs)
  {
    $this->lastModificationTimestampUs = $lastModificationTimestampUs;
  }
  /**
   * @return string
   */
  public function getLastModificationTimestampUs()
  {
    return $this->lastModificationTimestampUs;
  }
  /**
   * @param string
   */
  public function setRemovalTimestampUs($removalTimestampUs)
  {
    $this->removalTimestampUs = $removalTimestampUs;
  }
  /**
   * @return string
   */
  public function getRemovalTimestampUs()
  {
    return $this->removalTimestampUs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFeatureHistoryMetadataProto::class, 'Google_Service_Contentwarehouse_GeostoreFeatureHistoryMetadataProto');
