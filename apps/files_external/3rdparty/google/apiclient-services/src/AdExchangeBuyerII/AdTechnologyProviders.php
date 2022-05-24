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

namespace Google\Service\AdExchangeBuyerII;

class AdTechnologyProviders extends \Google\Collection
{
  protected $collection_key = 'detectedProviderIds';
  /**
   * @var string[]
   */
  public $detectedProviderIds;
  /**
   * @var bool
   */
  public $hasUnidentifiedProvider;

  /**
   * @param string[]
   */
  public function setDetectedProviderIds($detectedProviderIds)
  {
    $this->detectedProviderIds = $detectedProviderIds;
  }
  /**
   * @return string[]
   */
  public function getDetectedProviderIds()
  {
    return $this->detectedProviderIds;
  }
  /**
   * @param bool
   */
  public function setHasUnidentifiedProvider($hasUnidentifiedProvider)
  {
    $this->hasUnidentifiedProvider = $hasUnidentifiedProvider;
  }
  /**
   * @return bool
   */
  public function getHasUnidentifiedProvider()
  {
    return $this->hasUnidentifiedProvider;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdTechnologyProviders::class, 'Google_Service_AdExchangeBuyerII_AdTechnologyProviders');
