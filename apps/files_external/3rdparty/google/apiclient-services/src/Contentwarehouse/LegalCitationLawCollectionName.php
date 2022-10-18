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

class LegalCitationLawCollectionName extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "normalized" => "Normalized",
        "source" => "Source",
  ];
  /**
   * @var string
   */
  public $normalized;
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setNormalized($normalized)
  {
    $this->normalized = $normalized;
  }
  /**
   * @return string
   */
  public function getNormalized()
  {
    return $this->normalized;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LegalCitationLawCollectionName::class, 'Google_Service_Contentwarehouse_LegalCitationLawCollectionName');
