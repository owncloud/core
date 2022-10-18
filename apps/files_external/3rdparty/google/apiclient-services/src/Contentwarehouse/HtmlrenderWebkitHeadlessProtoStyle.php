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

class HtmlrenderWebkitHeadlessProtoStyle extends \Google\Collection
{
  protected $collection_key = 'referencedResourceIndex';
  /**
   * @var string
   */
  public $backgroundAttachment;
  /**
   * @var string
   */
  public $backgroundColorArgb;
  /**
   * @var string[]
   */
  public $backgroundGradientColorStopArgb;
  /**
   * @var bool
   */
  public $backgroundGradientRepeat;
  /**
   * @var string
   */
  public $backgroundGradientType;
  /**
   * @var string
   */
  public $backgroundImageRepeat;
  /**
   * @var string
   */
  public $backgroundImageUrl;
  protected $backgroundImageXPosType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $backgroundImageXPosDataType = '';
  protected $backgroundImageYPosType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $backgroundImageYPosDataType = '';
  /**
   * @var string
   */
  public $backgroundSize;
  protected $backgroundSizeHeightType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $backgroundSizeHeightDataType = '';
  protected $backgroundSizeWidthType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $backgroundSizeWidthDataType = '';
  /**
   * @var string
   */
  public $borderColorArgbBottom;
  /**
   * @var string
   */
  public $borderColorArgbLeft;
  /**
   * @var string
   */
  public $borderColorArgbRight;
  /**
   * @var string
   */
  public $borderColorArgbTop;
  /**
   * @var string
   */
  public $borderPixelWidthBottom;
  /**
   * @var string
   */
  public $borderPixelWidthLeft;
  /**
   * @var string
   */
  public $borderPixelWidthRight;
  /**
   * @var string
   */
  public $borderPixelWidthTop;
  /**
   * @var string
   */
  public $borderStyleBottom;
  /**
   * @var string
   */
  public $borderStyleLeft;
  /**
   * @var string
   */
  public $borderStyleRight;
  /**
   * @var string
   */
  public $borderStyleTop;
  protected $clipType = HtmlrenderWebkitHeadlessProtoRectangle::class;
  protected $clipDataType = '';
  /**
   * @var string
   */
  public $direction;
  /**
   * @var string
   */
  public $display;
  /**
   * @var string
   */
  public $fontFamily;
  /**
   * @var int
   */
  public $fontSize;
  /**
   * @var string
   */
  public $fontStyle;
  /**
   * @var int
   */
  public $fontWeight;
  /**
   * @var string
   */
  public $foregroundColorArgb;
  /**
   * @var bool
   */
  public $hasBackground;
  /**
   * @var string
   */
  public $listStyleImageUrl;
  /**
   * @var string
   */
  public $listStyleType;
  protected $marginBottomType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $marginBottomDataType = '';
  protected $marginLeftType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $marginLeftDataType = '';
  protected $marginRightType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $marginRightDataType = '';
  protected $marginTopType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $marginTopDataType = '';
  /**
   * @var float
   */
  public $opacity;
  /**
   * @var string
   */
  public $overflowX;
  /**
   * @var string
   */
  public $overflowY;
  protected $paddingBottomType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $paddingBottomDataType = '';
  protected $paddingLeftType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $paddingLeftDataType = '';
  protected $paddingRightType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $paddingRightDataType = '';
  protected $paddingTopType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $paddingTopDataType = '';
  /**
   * @var string
   */
  public $position;
  /**
   * @var int[]
   */
  public $referencedResourceIndex;
  /**
   * @var string
   */
  public $textAlign;
  /**
   * @var string
   */
  public $textDecoration;
  /**
   * @var string
   */
  public $textShadowColorArgb;
  /**
   * @var string
   */
  public $visibility;
  /**
   * @var int
   */
  public $zIndex;

  /**
   * @param string
   */
  public function setBackgroundAttachment($backgroundAttachment)
  {
    $this->backgroundAttachment = $backgroundAttachment;
  }
  /**
   * @return string
   */
  public function getBackgroundAttachment()
  {
    return $this->backgroundAttachment;
  }
  /**
   * @param string
   */
  public function setBackgroundColorArgb($backgroundColorArgb)
  {
    $this->backgroundColorArgb = $backgroundColorArgb;
  }
  /**
   * @return string
   */
  public function getBackgroundColorArgb()
  {
    return $this->backgroundColorArgb;
  }
  /**
   * @param string[]
   */
  public function setBackgroundGradientColorStopArgb($backgroundGradientColorStopArgb)
  {
    $this->backgroundGradientColorStopArgb = $backgroundGradientColorStopArgb;
  }
  /**
   * @return string[]
   */
  public function getBackgroundGradientColorStopArgb()
  {
    return $this->backgroundGradientColorStopArgb;
  }
  /**
   * @param bool
   */
  public function setBackgroundGradientRepeat($backgroundGradientRepeat)
  {
    $this->backgroundGradientRepeat = $backgroundGradientRepeat;
  }
  /**
   * @return bool
   */
  public function getBackgroundGradientRepeat()
  {
    return $this->backgroundGradientRepeat;
  }
  /**
   * @param string
   */
  public function setBackgroundGradientType($backgroundGradientType)
  {
    $this->backgroundGradientType = $backgroundGradientType;
  }
  /**
   * @return string
   */
  public function getBackgroundGradientType()
  {
    return $this->backgroundGradientType;
  }
  /**
   * @param string
   */
  public function setBackgroundImageRepeat($backgroundImageRepeat)
  {
    $this->backgroundImageRepeat = $backgroundImageRepeat;
  }
  /**
   * @return string
   */
  public function getBackgroundImageRepeat()
  {
    return $this->backgroundImageRepeat;
  }
  /**
   * @param string
   */
  public function setBackgroundImageUrl($backgroundImageUrl)
  {
    $this->backgroundImageUrl = $backgroundImageUrl;
  }
  /**
   * @return string
   */
  public function getBackgroundImageUrl()
  {
    return $this->backgroundImageUrl;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setBackgroundImageXPos(HtmlrenderWebkitHeadlessProtoOffset $backgroundImageXPos)
  {
    $this->backgroundImageXPos = $backgroundImageXPos;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getBackgroundImageXPos()
  {
    return $this->backgroundImageXPos;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setBackgroundImageYPos(HtmlrenderWebkitHeadlessProtoOffset $backgroundImageYPos)
  {
    $this->backgroundImageYPos = $backgroundImageYPos;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getBackgroundImageYPos()
  {
    return $this->backgroundImageYPos;
  }
  /**
   * @param string
   */
  public function setBackgroundSize($backgroundSize)
  {
    $this->backgroundSize = $backgroundSize;
  }
  /**
   * @return string
   */
  public function getBackgroundSize()
  {
    return $this->backgroundSize;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setBackgroundSizeHeight(HtmlrenderWebkitHeadlessProtoOffset $backgroundSizeHeight)
  {
    $this->backgroundSizeHeight = $backgroundSizeHeight;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getBackgroundSizeHeight()
  {
    return $this->backgroundSizeHeight;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setBackgroundSizeWidth(HtmlrenderWebkitHeadlessProtoOffset $backgroundSizeWidth)
  {
    $this->backgroundSizeWidth = $backgroundSizeWidth;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getBackgroundSizeWidth()
  {
    return $this->backgroundSizeWidth;
  }
  /**
   * @param string
   */
  public function setBorderColorArgbBottom($borderColorArgbBottom)
  {
    $this->borderColorArgbBottom = $borderColorArgbBottom;
  }
  /**
   * @return string
   */
  public function getBorderColorArgbBottom()
  {
    return $this->borderColorArgbBottom;
  }
  /**
   * @param string
   */
  public function setBorderColorArgbLeft($borderColorArgbLeft)
  {
    $this->borderColorArgbLeft = $borderColorArgbLeft;
  }
  /**
   * @return string
   */
  public function getBorderColorArgbLeft()
  {
    return $this->borderColorArgbLeft;
  }
  /**
   * @param string
   */
  public function setBorderColorArgbRight($borderColorArgbRight)
  {
    $this->borderColorArgbRight = $borderColorArgbRight;
  }
  /**
   * @return string
   */
  public function getBorderColorArgbRight()
  {
    return $this->borderColorArgbRight;
  }
  /**
   * @param string
   */
  public function setBorderColorArgbTop($borderColorArgbTop)
  {
    $this->borderColorArgbTop = $borderColorArgbTop;
  }
  /**
   * @return string
   */
  public function getBorderColorArgbTop()
  {
    return $this->borderColorArgbTop;
  }
  /**
   * @param string
   */
  public function setBorderPixelWidthBottom($borderPixelWidthBottom)
  {
    $this->borderPixelWidthBottom = $borderPixelWidthBottom;
  }
  /**
   * @return string
   */
  public function getBorderPixelWidthBottom()
  {
    return $this->borderPixelWidthBottom;
  }
  /**
   * @param string
   */
  public function setBorderPixelWidthLeft($borderPixelWidthLeft)
  {
    $this->borderPixelWidthLeft = $borderPixelWidthLeft;
  }
  /**
   * @return string
   */
  public function getBorderPixelWidthLeft()
  {
    return $this->borderPixelWidthLeft;
  }
  /**
   * @param string
   */
  public function setBorderPixelWidthRight($borderPixelWidthRight)
  {
    $this->borderPixelWidthRight = $borderPixelWidthRight;
  }
  /**
   * @return string
   */
  public function getBorderPixelWidthRight()
  {
    return $this->borderPixelWidthRight;
  }
  /**
   * @param string
   */
  public function setBorderPixelWidthTop($borderPixelWidthTop)
  {
    $this->borderPixelWidthTop = $borderPixelWidthTop;
  }
  /**
   * @return string
   */
  public function getBorderPixelWidthTop()
  {
    return $this->borderPixelWidthTop;
  }
  /**
   * @param string
   */
  public function setBorderStyleBottom($borderStyleBottom)
  {
    $this->borderStyleBottom = $borderStyleBottom;
  }
  /**
   * @return string
   */
  public function getBorderStyleBottom()
  {
    return $this->borderStyleBottom;
  }
  /**
   * @param string
   */
  public function setBorderStyleLeft($borderStyleLeft)
  {
    $this->borderStyleLeft = $borderStyleLeft;
  }
  /**
   * @return string
   */
  public function getBorderStyleLeft()
  {
    return $this->borderStyleLeft;
  }
  /**
   * @param string
   */
  public function setBorderStyleRight($borderStyleRight)
  {
    $this->borderStyleRight = $borderStyleRight;
  }
  /**
   * @return string
   */
  public function getBorderStyleRight()
  {
    return $this->borderStyleRight;
  }
  /**
   * @param string
   */
  public function setBorderStyleTop($borderStyleTop)
  {
    $this->borderStyleTop = $borderStyleTop;
  }
  /**
   * @return string
   */
  public function getBorderStyleTop()
  {
    return $this->borderStyleTop;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRectangle
   */
  public function setClip(HtmlrenderWebkitHeadlessProtoRectangle $clip)
  {
    $this->clip = $clip;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRectangle
   */
  public function getClip()
  {
    return $this->clip;
  }
  /**
   * @param string
   */
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  /**
   * @return string
   */
  public function getDirection()
  {
    return $this->direction;
  }
  /**
   * @param string
   */
  public function setDisplay($display)
  {
    $this->display = $display;
  }
  /**
   * @return string
   */
  public function getDisplay()
  {
    return $this->display;
  }
  /**
   * @param string
   */
  public function setFontFamily($fontFamily)
  {
    $this->fontFamily = $fontFamily;
  }
  /**
   * @return string
   */
  public function getFontFamily()
  {
    return $this->fontFamily;
  }
  /**
   * @param int
   */
  public function setFontSize($fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return int
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  /**
   * @param string
   */
  public function setFontStyle($fontStyle)
  {
    $this->fontStyle = $fontStyle;
  }
  /**
   * @return string
   */
  public function getFontStyle()
  {
    return $this->fontStyle;
  }
  /**
   * @param int
   */
  public function setFontWeight($fontWeight)
  {
    $this->fontWeight = $fontWeight;
  }
  /**
   * @return int
   */
  public function getFontWeight()
  {
    return $this->fontWeight;
  }
  /**
   * @param string
   */
  public function setForegroundColorArgb($foregroundColorArgb)
  {
    $this->foregroundColorArgb = $foregroundColorArgb;
  }
  /**
   * @return string
   */
  public function getForegroundColorArgb()
  {
    return $this->foregroundColorArgb;
  }
  /**
   * @param bool
   */
  public function setHasBackground($hasBackground)
  {
    $this->hasBackground = $hasBackground;
  }
  /**
   * @return bool
   */
  public function getHasBackground()
  {
    return $this->hasBackground;
  }
  /**
   * @param string
   */
  public function setListStyleImageUrl($listStyleImageUrl)
  {
    $this->listStyleImageUrl = $listStyleImageUrl;
  }
  /**
   * @return string
   */
  public function getListStyleImageUrl()
  {
    return $this->listStyleImageUrl;
  }
  /**
   * @param string
   */
  public function setListStyleType($listStyleType)
  {
    $this->listStyleType = $listStyleType;
  }
  /**
   * @return string
   */
  public function getListStyleType()
  {
    return $this->listStyleType;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setMarginBottom(HtmlrenderWebkitHeadlessProtoOffset $marginBottom)
  {
    $this->marginBottom = $marginBottom;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getMarginBottom()
  {
    return $this->marginBottom;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setMarginLeft(HtmlrenderWebkitHeadlessProtoOffset $marginLeft)
  {
    $this->marginLeft = $marginLeft;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getMarginLeft()
  {
    return $this->marginLeft;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setMarginRight(HtmlrenderWebkitHeadlessProtoOffset $marginRight)
  {
    $this->marginRight = $marginRight;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getMarginRight()
  {
    return $this->marginRight;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setMarginTop(HtmlrenderWebkitHeadlessProtoOffset $marginTop)
  {
    $this->marginTop = $marginTop;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getMarginTop()
  {
    return $this->marginTop;
  }
  /**
   * @param float
   */
  public function setOpacity($opacity)
  {
    $this->opacity = $opacity;
  }
  /**
   * @return float
   */
  public function getOpacity()
  {
    return $this->opacity;
  }
  /**
   * @param string
   */
  public function setOverflowX($overflowX)
  {
    $this->overflowX = $overflowX;
  }
  /**
   * @return string
   */
  public function getOverflowX()
  {
    return $this->overflowX;
  }
  /**
   * @param string
   */
  public function setOverflowY($overflowY)
  {
    $this->overflowY = $overflowY;
  }
  /**
   * @return string
   */
  public function getOverflowY()
  {
    return $this->overflowY;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setPaddingBottom(HtmlrenderWebkitHeadlessProtoOffset $paddingBottom)
  {
    $this->paddingBottom = $paddingBottom;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getPaddingBottom()
  {
    return $this->paddingBottom;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setPaddingLeft(HtmlrenderWebkitHeadlessProtoOffset $paddingLeft)
  {
    $this->paddingLeft = $paddingLeft;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getPaddingLeft()
  {
    return $this->paddingLeft;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setPaddingRight(HtmlrenderWebkitHeadlessProtoOffset $paddingRight)
  {
    $this->paddingRight = $paddingRight;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getPaddingRight()
  {
    return $this->paddingRight;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setPaddingTop(HtmlrenderWebkitHeadlessProtoOffset $paddingTop)
  {
    $this->paddingTop = $paddingTop;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getPaddingTop()
  {
    return $this->paddingTop;
  }
  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param int[]
   */
  public function setReferencedResourceIndex($referencedResourceIndex)
  {
    $this->referencedResourceIndex = $referencedResourceIndex;
  }
  /**
   * @return int[]
   */
  public function getReferencedResourceIndex()
  {
    return $this->referencedResourceIndex;
  }
  /**
   * @param string
   */
  public function setTextAlign($textAlign)
  {
    $this->textAlign = $textAlign;
  }
  /**
   * @return string
   */
  public function getTextAlign()
  {
    return $this->textAlign;
  }
  /**
   * @param string
   */
  public function setTextDecoration($textDecoration)
  {
    $this->textDecoration = $textDecoration;
  }
  /**
   * @return string
   */
  public function getTextDecoration()
  {
    return $this->textDecoration;
  }
  /**
   * @param string
   */
  public function setTextShadowColorArgb($textShadowColorArgb)
  {
    $this->textShadowColorArgb = $textShadowColorArgb;
  }
  /**
   * @return string
   */
  public function getTextShadowColorArgb()
  {
    return $this->textShadowColorArgb;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
  /**
   * @param int
   */
  public function setZIndex($zIndex)
  {
    $this->zIndex = $zIndex;
  }
  /**
   * @return int
   */
  public function getZIndex()
  {
    return $this->zIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoStyle::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoStyle');
