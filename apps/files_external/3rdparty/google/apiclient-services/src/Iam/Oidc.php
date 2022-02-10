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

namespace Google\Service\Iam;

class Oidc extends \Google\Collection
{
  protected $collection_key = 'allowedAudiences';
  /**
   * @var string[]
   */
  public $allowedAudiences;
  /**
   * @var string
   */
  public $issuerUri;

  /**
   * @param string[]
   */
  public function setAllowedAudiences($allowedAudiences)
  {
    $this->allowedAudiences = $allowedAudiences;
  }
  /**
   * @return string[]
   */
  public function getAllowedAudiences()
  {
    return $this->allowedAudiences;
  }
  /**
   * @param string
   */
  public function setIssuerUri($issuerUri)
  {
    $this->issuerUri = $issuerUri;
  }
  /**
   * @return string
   */
  public function getIssuerUri()
  {
    return $this->issuerUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Oidc::class, 'Google_Service_Iam_Oidc');
