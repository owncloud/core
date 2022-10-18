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

class GeostoreSocialReferenceProto extends \Google\Model
{
  /**
   * @var string
   */
  public $baseGaiaId;
  /**
   * @var string
   */
  public $claimedGaiaId;
  /**
   * @var string
   */
  public $gaiaIdForDisplay;

  /**
   * @param string
   */
  public function setBaseGaiaId($baseGaiaId)
  {
    $this->baseGaiaId = $baseGaiaId;
  }
  /**
   * @return string
   */
  public function getBaseGaiaId()
  {
    return $this->baseGaiaId;
  }
  /**
   * @param string
   */
  public function setClaimedGaiaId($claimedGaiaId)
  {
    $this->claimedGaiaId = $claimedGaiaId;
  }
  /**
   * @return string
   */
  public function getClaimedGaiaId()
  {
    return $this->claimedGaiaId;
  }
  /**
   * @param string
   */
  public function setGaiaIdForDisplay($gaiaIdForDisplay)
  {
    $this->gaiaIdForDisplay = $gaiaIdForDisplay;
  }
  /**
   * @return string
   */
  public function getGaiaIdForDisplay()
  {
    return $this->gaiaIdForDisplay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreSocialReferenceProto::class, 'Google_Service_Contentwarehouse_GeostoreSocialReferenceProto');
