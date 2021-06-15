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

class Google_Service_CloudAsset_MoveAnalysisResult extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $blockersType = 'Google_Service_CloudAsset_MoveImpact';
  protected $blockersDataType = 'array';
  protected $warningsType = 'Google_Service_CloudAsset_MoveImpact';
  protected $warningsDataType = 'array';

  /**
   * @param Google_Service_CloudAsset_MoveImpact[]
   */
  public function setBlockers($blockers)
  {
    $this->blockers = $blockers;
  }
  /**
   * @return Google_Service_CloudAsset_MoveImpact[]
   */
  public function getBlockers()
  {
    return $this->blockers;
  }
  /**
   * @param Google_Service_CloudAsset_MoveImpact[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_CloudAsset_MoveImpact[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
