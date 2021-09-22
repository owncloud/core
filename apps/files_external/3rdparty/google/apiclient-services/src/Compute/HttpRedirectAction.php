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

namespace Google\Service\Compute;

class HttpRedirectAction extends \Google\Model
{
  public $hostRedirect;
  public $httpsRedirect;
  public $pathRedirect;
  public $prefixRedirect;
  public $redirectResponseCode;
  public $stripQuery;

  public function setHostRedirect($hostRedirect)
  {
    $this->hostRedirect = $hostRedirect;
  }
  public function getHostRedirect()
  {
    return $this->hostRedirect;
  }
  public function setHttpsRedirect($httpsRedirect)
  {
    $this->httpsRedirect = $httpsRedirect;
  }
  public function getHttpsRedirect()
  {
    return $this->httpsRedirect;
  }
  public function setPathRedirect($pathRedirect)
  {
    $this->pathRedirect = $pathRedirect;
  }
  public function getPathRedirect()
  {
    return $this->pathRedirect;
  }
  public function setPrefixRedirect($prefixRedirect)
  {
    $this->prefixRedirect = $prefixRedirect;
  }
  public function getPrefixRedirect()
  {
    return $this->prefixRedirect;
  }
  public function setRedirectResponseCode($redirectResponseCode)
  {
    $this->redirectResponseCode = $redirectResponseCode;
  }
  public function getRedirectResponseCode()
  {
    return $this->redirectResponseCode;
  }
  public function setStripQuery($stripQuery)
  {
    $this->stripQuery = $stripQuery;
  }
  public function getStripQuery()
  {
    return $this->stripQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRedirectAction::class, 'Google_Service_Compute_HttpRedirectAction');
