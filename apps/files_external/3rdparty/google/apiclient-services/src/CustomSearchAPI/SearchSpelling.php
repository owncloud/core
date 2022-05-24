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

namespace Google\Service\CustomSearchAPI;

class SearchSpelling extends \Google\Model
{
  /**
   * @var string
   */
  public $correctedQuery;
  /**
   * @var string
   */
  public $htmlCorrectedQuery;

  /**
   * @param string
   */
  public function setCorrectedQuery($correctedQuery)
  {
    $this->correctedQuery = $correctedQuery;
  }
  /**
   * @return string
   */
  public function getCorrectedQuery()
  {
    return $this->correctedQuery;
  }
  /**
   * @param string
   */
  public function setHtmlCorrectedQuery($htmlCorrectedQuery)
  {
    $this->htmlCorrectedQuery = $htmlCorrectedQuery;
  }
  /**
   * @return string
   */
  public function getHtmlCorrectedQuery()
  {
    return $this->htmlCorrectedQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchSpelling::class, 'Google_Service_CustomSearchAPI_SearchSpelling');
