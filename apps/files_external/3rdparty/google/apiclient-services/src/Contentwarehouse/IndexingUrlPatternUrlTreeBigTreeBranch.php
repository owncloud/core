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

class IndexingUrlPatternUrlTreeBigTreeBranch extends \Google\Model
{
  protected $featuresType = IndexingUrlPatternUrlTreeUrlFeatures::class;
  protected $featuresDataType = '';
  /**
   * @var string
   */
  public $patternId;
  protected $payloadType = Proto2BridgeMessageSet::class;
  protected $payloadDataType = '';

  /**
   * @param IndexingUrlPatternUrlTreeUrlFeatures
   */
  public function setFeatures(IndexingUrlPatternUrlTreeUrlFeatures $features)
  {
    $this->features = $features;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlFeatures
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param string
   */
  public function setPatternId($patternId)
  {
    $this->patternId = $patternId;
  }
  /**
   * @return string
   */
  public function getPatternId()
  {
    return $this->patternId;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setPayload(Proto2BridgeMessageSet $payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getPayload()
  {
    return $this->payload;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingUrlPatternUrlTreeBigTreeBranch::class, 'Google_Service_Contentwarehouse_IndexingUrlPatternUrlTreeBigTreeBranch');
