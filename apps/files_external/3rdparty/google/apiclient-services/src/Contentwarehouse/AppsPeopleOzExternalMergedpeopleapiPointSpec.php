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

class AppsPeopleOzExternalMergedpeopleapiPointSpec extends \Google\Model
{
  protected $boundsType = GeostoreRectProto::class;
  protected $boundsDataType = '';
  protected $pointType = GeostorePointProto::class;
  protected $pointDataType = '';
  /**
   * @var string
   */
  public $pointSource;

  /**
   * @param GeostoreRectProto
   */
  public function setBounds(GeostoreRectProto $bounds)
  {
    $this->bounds = $bounds;
  }
  /**
   * @return GeostoreRectProto
   */
  public function getBounds()
  {
    return $this->bounds;
  }
  /**
   * @param GeostorePointProto
   */
  public function setPoint(GeostorePointProto $point)
  {
    $this->point = $point;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param string
   */
  public function setPointSource($pointSource)
  {
    $this->pointSource = $pointSource;
  }
  /**
   * @return string
   */
  public function getPointSource()
  {
    return $this->pointSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPointSpec::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPointSpec');
