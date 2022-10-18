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

class IndexingDupsLocalizedLocalizedClusterTargetLinkLink extends \Google\Collection
{
  protected $collection_key = 'annotationSourceInfo';
  protected $annotationSourceInfoType = IndexingDupsLocalizedLocalizedClusterTargetLinkLinkAnnotationSourceInfo::class;
  protected $annotationSourceInfoDataType = 'array';
  /**
   * @var bool
   */
  public $crossDomain;
  /**
   * @var string
   */
  public $url;

  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkLinkAnnotationSourceInfo[]
   */
  public function setAnnotationSourceInfo($annotationSourceInfo)
  {
    $this->annotationSourceInfo = $annotationSourceInfo;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkLinkAnnotationSourceInfo[]
   */
  public function getAnnotationSourceInfo()
  {
    return $this->annotationSourceInfo;
  }
  /**
   * @param bool
   */
  public function setCrossDomain($crossDomain)
  {
    $this->crossDomain = $crossDomain;
  }
  /**
   * @return bool
   */
  public function getCrossDomain()
  {
    return $this->crossDomain;
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
class_alias(IndexingDupsLocalizedLocalizedClusterTargetLinkLink::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedClusterTargetLinkLink');
