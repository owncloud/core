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

class CompositeDocAdditionalChecksums extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "noTransientChecksum96" => "NoTransientChecksum96",
        "simHash" => "SimHash",
        "simHashIsTrusted" => "SimHashIsTrusted",
  ];
  /**
   * @var string
   */
  public $noTransientChecksum96;
  /**
   * @var string
   */
  public $simHash;
  /**
   * @var bool
   */
  public $simHashIsTrusted;
  /**
   * @var string
   */
  public $simhashV2;
  public $simhashV2Significance;

  /**
   * @param string
   */
  public function setNoTransientChecksum96($noTransientChecksum96)
  {
    $this->noTransientChecksum96 = $noTransientChecksum96;
  }
  /**
   * @return string
   */
  public function getNoTransientChecksum96()
  {
    return $this->noTransientChecksum96;
  }
  /**
   * @param string
   */
  public function setSimHash($simHash)
  {
    $this->simHash = $simHash;
  }
  /**
   * @return string
   */
  public function getSimHash()
  {
    return $this->simHash;
  }
  /**
   * @param bool
   */
  public function setSimHashIsTrusted($simHashIsTrusted)
  {
    $this->simHashIsTrusted = $simHashIsTrusted;
  }
  /**
   * @return bool
   */
  public function getSimHashIsTrusted()
  {
    return $this->simHashIsTrusted;
  }
  /**
   * @param string
   */
  public function setSimhashV2($simhashV2)
  {
    $this->simhashV2 = $simhashV2;
  }
  /**
   * @return string
   */
  public function getSimhashV2()
  {
    return $this->simhashV2;
  }
  public function setSimhashV2Significance($simhashV2Significance)
  {
    $this->simhashV2Significance = $simhashV2Significance;
  }
  public function getSimhashV2Significance()
  {
    return $this->simhashV2Significance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDocAdditionalChecksums::class, 'Google_Service_Contentwarehouse_CompositeDocAdditionalChecksums');
