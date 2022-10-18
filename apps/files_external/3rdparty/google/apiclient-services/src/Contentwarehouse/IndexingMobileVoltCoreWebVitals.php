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

class IndexingMobileVoltCoreWebVitals extends \Google\Model
{
  /**
   * @var string
   */
  public $cls;
  /**
   * @var string
   */
  public $fid;
  /**
   * @var string
   */
  public $inp;
  /**
   * @var string
   */
  public $lcp;

  /**
   * @param string
   */
  public function setCls($cls)
  {
    $this->cls = $cls;
  }
  /**
   * @return string
   */
  public function getCls()
  {
    return $this->cls;
  }
  /**
   * @param string
   */
  public function setFid($fid)
  {
    $this->fid = $fid;
  }
  /**
   * @return string
   */
  public function getFid()
  {
    return $this->fid;
  }
  /**
   * @param string
   */
  public function setInp($inp)
  {
    $this->inp = $inp;
  }
  /**
   * @return string
   */
  public function getInp()
  {
    return $this->inp;
  }
  /**
   * @param string
   */
  public function setLcp($lcp)
  {
    $this->lcp = $lcp;
  }
  /**
   * @return string
   */
  public function getLcp()
  {
    return $this->lcp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMobileVoltCoreWebVitals::class, 'Google_Service_Contentwarehouse_IndexingMobileVoltCoreWebVitals');
