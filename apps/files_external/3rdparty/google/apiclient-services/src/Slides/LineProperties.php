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

namespace Google\Service\Slides;

class LineProperties extends \Google\Model
{
  /**
   * @var string
   */
  public $dashStyle;
  /**
   * @var string
   */
  public $endArrow;
  protected $endConnectionType = LineConnection::class;
  protected $endConnectionDataType = '';
  protected $lineFillType = LineFill::class;
  protected $lineFillDataType = '';
  protected $linkType = Link::class;
  protected $linkDataType = '';
  /**
   * @var string
   */
  public $startArrow;
  protected $startConnectionType = LineConnection::class;
  protected $startConnectionDataType = '';
  protected $weightType = Dimension::class;
  protected $weightDataType = '';

  /**
   * @param string
   */
  public function setDashStyle($dashStyle)
  {
    $this->dashStyle = $dashStyle;
  }
  /**
   * @return string
   */
  public function getDashStyle()
  {
    return $this->dashStyle;
  }
  /**
   * @param string
   */
  public function setEndArrow($endArrow)
  {
    $this->endArrow = $endArrow;
  }
  /**
   * @return string
   */
  public function getEndArrow()
  {
    return $this->endArrow;
  }
  /**
   * @param LineConnection
   */
  public function setEndConnection(LineConnection $endConnection)
  {
    $this->endConnection = $endConnection;
  }
  /**
   * @return LineConnection
   */
  public function getEndConnection()
  {
    return $this->endConnection;
  }
  /**
   * @param LineFill
   */
  public function setLineFill(LineFill $lineFill)
  {
    $this->lineFill = $lineFill;
  }
  /**
   * @return LineFill
   */
  public function getLineFill()
  {
    return $this->lineFill;
  }
  /**
   * @param Link
   */
  public function setLink(Link $link)
  {
    $this->link = $link;
  }
  /**
   * @return Link
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setStartArrow($startArrow)
  {
    $this->startArrow = $startArrow;
  }
  /**
   * @return string
   */
  public function getStartArrow()
  {
    return $this->startArrow;
  }
  /**
   * @param LineConnection
   */
  public function setStartConnection(LineConnection $startConnection)
  {
    $this->startConnection = $startConnection;
  }
  /**
   * @return LineConnection
   */
  public function getStartConnection()
  {
    return $this->startConnection;
  }
  /**
   * @param Dimension
   */
  public function setWeight(Dimension $weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return Dimension
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LineProperties::class, 'Google_Service_Slides_LineProperties');
