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

class CompositeDocForwardingDup extends \Google\Model
{
  /**
   * @var string
   */
  public $ecn;
  /**
   * @var string
   */
  public $ecnFp;
  /**
   * @var int
   */
  public $purposes;
  /**
   * @var int
   */
  public $rawPagerank;
  /**
   * @var string
   */
  public $repid;
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $urlencoding;

  /**
   * @param string
   */
  public function setEcn($ecn)
  {
    $this->ecn = $ecn;
  }
  /**
   * @return string
   */
  public function getEcn()
  {
    return $this->ecn;
  }
  /**
   * @param string
   */
  public function setEcnFp($ecnFp)
  {
    $this->ecnFp = $ecnFp;
  }
  /**
   * @return string
   */
  public function getEcnFp()
  {
    return $this->ecnFp;
  }
  /**
   * @param int
   */
  public function setPurposes($purposes)
  {
    $this->purposes = $purposes;
  }
  /**
   * @return int
   */
  public function getPurposes()
  {
    return $this->purposes;
  }
  /**
   * @param int
   */
  public function setRawPagerank($rawPagerank)
  {
    $this->rawPagerank = $rawPagerank;
  }
  /**
   * @return int
   */
  public function getRawPagerank()
  {
    return $this->rawPagerank;
  }
  /**
   * @param string
   */
  public function setRepid($repid)
  {
    $this->repid = $repid;
  }
  /**
   * @return string
   */
  public function getRepid()
  {
    return $this->repid;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param int
   */
  public function setUrlencoding($urlencoding)
  {
    $this->urlencoding = $urlencoding;
  }
  /**
   * @return int
   */
  public function getUrlencoding()
  {
    return $this->urlencoding;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDocForwardingDup::class, 'Google_Service_Contentwarehouse_CompositeDocForwardingDup');
