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

namespace Google\Service\NetworkServices;

class HttpRouteRedirect extends \Google\Model
{
  /**
   * @var string
   */
  public $hostRedirect;
  /**
   * @var bool
   */
  public $httpsRedirect;
  /**
   * @var string
   */
  public $pathRedirect;
  /**
   * @var int
   */
  public $portRedirect;
  /**
   * @var string
   */
  public $prefixRewrite;
  /**
   * @var string
   */
  public $responseCode;
  /**
   * @var bool
   */
  public $stripQuery;

  /**
   * @param string
   */
  public function setHostRedirect($hostRedirect)
  {
    $this->hostRedirect = $hostRedirect;
  }
  /**
   * @return string
   */
  public function getHostRedirect()
  {
    return $this->hostRedirect;
  }
  /**
   * @param bool
   */
  public function setHttpsRedirect($httpsRedirect)
  {
    $this->httpsRedirect = $httpsRedirect;
  }
  /**
   * @return bool
   */
  public function getHttpsRedirect()
  {
    return $this->httpsRedirect;
  }
  /**
   * @param string
   */
  public function setPathRedirect($pathRedirect)
  {
    $this->pathRedirect = $pathRedirect;
  }
  /**
   * @return string
   */
  public function getPathRedirect()
  {
    return $this->pathRedirect;
  }
  /**
   * @param int
   */
  public function setPortRedirect($portRedirect)
  {
    $this->portRedirect = $portRedirect;
  }
  /**
   * @return int
   */
  public function getPortRedirect()
  {
    return $this->portRedirect;
  }
  /**
   * @param string
   */
  public function setPrefixRewrite($prefixRewrite)
  {
    $this->prefixRewrite = $prefixRewrite;
  }
  /**
   * @return string
   */
  public function getPrefixRewrite()
  {
    return $this->prefixRewrite;
  }
  /**
   * @param string
   */
  public function setResponseCode($responseCode)
  {
    $this->responseCode = $responseCode;
  }
  /**
   * @return string
   */
  public function getResponseCode()
  {
    return $this->responseCode;
  }
  /**
   * @param bool
   */
  public function setStripQuery($stripQuery)
  {
    $this->stripQuery = $stripQuery;
  }
  /**
   * @return bool
   */
  public function getStripQuery()
  {
    return $this->stripQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteRedirect::class, 'Google_Service_NetworkServices_HttpRouteRedirect');
