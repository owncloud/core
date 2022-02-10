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

namespace Google\Service\Ideahub;

class GoogleSearchIdeahubV1betaListAvailableLocalesResponse extends \Google\Collection
{
  protected $collection_key = 'availableLocales';
  protected $availableLocalesType = GoogleSearchIdeahubV1betaAvailableLocale::class;
  protected $availableLocalesDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param GoogleSearchIdeahubV1betaAvailableLocale[]
   */
  public function setAvailableLocales($availableLocales)
  {
    $this->availableLocales = $availableLocales;
  }
  /**
   * @return GoogleSearchIdeahubV1betaAvailableLocale[]
   */
  public function getAvailableLocales()
  {
    return $this->availableLocales;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSearchIdeahubV1betaListAvailableLocalesResponse::class, 'Google_Service_Ideahub_GoogleSearchIdeahubV1betaListAvailableLocalesResponse');
