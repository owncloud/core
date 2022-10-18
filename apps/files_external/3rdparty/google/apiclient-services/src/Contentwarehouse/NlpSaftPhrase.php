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

class NlpSaftPhrase extends \Google\Model
{
  /**
   * @var int
   */
  public $end;
  /**
   * @var string
   */
  public $facet;
  /**
   * @var int
   */
  public $head;
  /**
   * @var int
   */
  public $start;

  /**
   * @param int
   */
  public function setEnd($end)
  {
    $this->end = $end;
  }
  /**
   * @return int
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param string
   */
  public function setFacet($facet)
  {
    $this->facet = $facet;
  }
  /**
   * @return string
   */
  public function getFacet()
  {
    return $this->facet;
  }
  /**
   * @param int
   */
  public function setHead($head)
  {
    $this->head = $head;
  }
  /**
   * @return int
   */
  public function getHead()
  {
    return $this->head;
  }
  /**
   * @param int
   */
  public function setStart($start)
  {
    $this->start = $start;
  }
  /**
   * @return int
   */
  public function getStart()
  {
    return $this->start;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftPhrase::class, 'Google_Service_Contentwarehouse_NlpSaftPhrase');
