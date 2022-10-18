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

class GeostoreGeopoliticalGeometryProto extends \Google\Model
{
  protected $restOfWorldPolygonType = GeostorePolygonProto::class;
  protected $restOfWorldPolygonDataType = '';
  protected $selfPolygonType = GeostorePolygonProto::class;
  protected $selfPolygonDataType = '';

  /**
   * @param GeostorePolygonProto
   */
  public function setRestOfWorldPolygon(GeostorePolygonProto $restOfWorldPolygon)
  {
    $this->restOfWorldPolygon = $restOfWorldPolygon;
  }
  /**
   * @return GeostorePolygonProto
   */
  public function getRestOfWorldPolygon()
  {
    return $this->restOfWorldPolygon;
  }
  /**
   * @param GeostorePolygonProto
   */
  public function setSelfPolygon(GeostorePolygonProto $selfPolygon)
  {
    $this->selfPolygon = $selfPolygon;
  }
  /**
   * @return GeostorePolygonProto
   */
  public function getSelfPolygon()
  {
    return $this->selfPolygon;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreGeopoliticalGeometryProto::class, 'Google_Service_Contentwarehouse_GeostoreGeopoliticalGeometryProto');
