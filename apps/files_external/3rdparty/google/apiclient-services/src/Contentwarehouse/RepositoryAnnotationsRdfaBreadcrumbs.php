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

class RepositoryAnnotationsRdfaBreadcrumbs extends \Google\Collection
{
  protected $collection_key = 'crumb';
  protected $crumbType = RepositoryAnnotationsRdfaCrumb::class;
  protected $crumbDataType = 'array';
  /**
   * @var string
   */
  public $url;

  /**
   * @param RepositoryAnnotationsRdfaCrumb[]
   */
  public function setCrumb($crumb)
  {
    $this->crumb = $crumb;
  }
  /**
   * @return RepositoryAnnotationsRdfaCrumb[]
   */
  public function getCrumb()
  {
    return $this->crumb;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryAnnotationsRdfaBreadcrumbs::class, 'Google_Service_Contentwarehouse_RepositoryAnnotationsRdfaBreadcrumbs');
