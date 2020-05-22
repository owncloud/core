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

class Google_Service_AndroidPublisher_Sampling extends Google_Collection
{
  protected $collection_key = 'stratifiedSamplings';
  protected $modRangesType = 'Google_Service_AndroidPublisher_ModRange';
  protected $modRangesDataType = 'array';
  public $modulus;
  public $salt;
  protected $stratifiedSamplingsType = 'Google_Service_AndroidPublisher_StratifiedSampling';
  protected $stratifiedSamplingsDataType = 'array';
  public $useAndroidId;

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
  public function setModulus($modulus)
  {
    $this->modulus = $modulus;
  }
  public function getModulus()
  {
    return $this->modulus;
  }
  public function setSalt($salt)
  {
    $this->salt = $salt;
  }
  public function getSalt()
  {
    return $this->salt;
  }
  /**
   * @param Google_Service_AndroidPublisher_StratifiedSampling
   */
  public function setStratifiedSamplings($stratifiedSamplings)
  {
    $this->stratifiedSamplings = $stratifiedSamplings;
  }
  /**
   * @return Google_Service_AndroidPublisher_StratifiedSampling
   */
  public function getStratifiedSamplings()
  {
    return $this->stratifiedSamplings;
  }
  public function setUseAndroidId($useAndroidId)
  {
    $this->useAndroidId = $useAndroidId;
  }
  public function getUseAndroidId()
  {
    return $this->useAndroidId;
  }
}
