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

namespace Google\Service\DomainsRDAP;

class Notice extends \Google\Collection
{
  protected $collection_key = 'links';
  /**
   * @var string[]
   */
  public $description;
  protected $linksType = Link::class;
  protected $linksDataType = 'array';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string[]
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string[]
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Link[]
   */
  public function setLinks($links)
  {
    $this->links = $links;
  }
  /**
   * @return Link[]
   */
  public function getLinks()
  {
    return $this->links;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notice::class, 'Google_Service_DomainsRDAP_Notice');
