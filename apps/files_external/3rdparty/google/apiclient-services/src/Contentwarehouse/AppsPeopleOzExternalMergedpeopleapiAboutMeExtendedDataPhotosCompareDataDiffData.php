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

class AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData extends \Google\Model
{
  /**
   * @var float
   */
  public $blueDiff;
  /**
   * @var float
   */
  public $greenDiff;
  /**
   * @var float
   */
  public $redDiff;

  /**
   * @param float
   */
  public function setBlueDiff($blueDiff)
  {
    $this->blueDiff = $blueDiff;
  }
  /**
   * @return float
   */
  public function getBlueDiff()
  {
    return $this->blueDiff;
  }
  /**
   * @param float
   */
  public function setGreenDiff($greenDiff)
  {
    $this->greenDiff = $greenDiff;
  }
  /**
   * @return float
   */
  public function getGreenDiff()
  {
    return $this->greenDiff;
  }
  /**
   * @param float
   */
  public function setRedDiff($redDiff)
  {
    $this->redDiff = $redDiff;
  }
  /**
   * @return float
   */
  public function getRedDiff()
  {
    return $this->redDiff;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData');
