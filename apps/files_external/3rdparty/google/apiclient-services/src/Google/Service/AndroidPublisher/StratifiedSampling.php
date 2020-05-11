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

class Google_Service_AndroidPublisher_StratifiedSampling extends Google_Collection
{
  protected $collection_key = 'modRanges';
  protected $modRangesType = 'Google_Service_AndroidPublisher_ModRange';
  protected $modRangesDataType = 'array';
  protected $stratumType = 'Google_Service_AndroidPublisher_Stratum';
  protected $stratumDataType = '';

  /**
   * @param Google_Service_AndroidPublisher_ModRange
   */
  public function setModRanges($modRanges)
  {
    $this->modRanges = $modRanges;
  }
  /**
   * @return Google_Service_AndroidPublisher_ModRange
   */
  public function getModRanges()
  {
    return $this->modRanges;
  }
  /**
   * @param Google_Service_AndroidPublisher_Stratum
   */
  public function setStratum(Google_Service_AndroidPublisher_Stratum $stratum)
  {
    $this->stratum = $stratum;
  }
  /**
   * @return Google_Service_AndroidPublisher_Stratum
   */
  public function getStratum()
  {
    return $this->stratum;
  }
}
