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

class OceanPerDocData extends \Google\Model
{
  /**
   * @var string
   */
  public $flags;
  /**
   * @var int
   */
  public $numPages;
  /**
   * @var int
   */
  public $pageNumber;
  /**
   * @var int
   */
  public $pageid;
  /**
   * @var string
   */
  public $volumeid;

  /**
   * @param string
   */
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return string
   */
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param int
   */
  public function setNumPages($numPages)
  {
    $this->numPages = $numPages;
  }
  /**
   * @return int
   */
  public function getNumPages()
  {
    return $this->numPages;
  }
  /**
   * @param int
   */
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  /**
   * @return int
   */
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param int
   */
  public function setPageid($pageid)
  {
    $this->pageid = $pageid;
  }
  /**
   * @return int
   */
  public function getPageid()
  {
    return $this->pageid;
  }
  /**
   * @param string
   */
  public function setVolumeid($volumeid)
  {
    $this->volumeid = $volumeid;
  }
  /**
   * @return string
   */
  public function getVolumeid()
  {
    return $this->volumeid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanPerDocData::class, 'Google_Service_Contentwarehouse_OceanPerDocData');
