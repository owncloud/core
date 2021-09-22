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

namespace Google\Service\Transcoder;

class Animation extends \Google\Model
{
  protected $animationEndType = AnimationEnd::class;
  protected $animationEndDataType = '';
  protected $animationFadeType = AnimationFade::class;
  protected $animationFadeDataType = '';
  protected $animationStaticType = AnimationStatic::class;
  protected $animationStaticDataType = '';

  /**
   * @param AnimationEnd
   */
  public function setAnimationEnd(AnimationEnd $animationEnd)
  {
    $this->animationEnd = $animationEnd;
  }
  /**
   * @return AnimationEnd
   */
  public function getAnimationEnd()
  {
    return $this->animationEnd;
  }
  /**
   * @param AnimationFade
   */
  public function setAnimationFade(AnimationFade $animationFade)
  {
    $this->animationFade = $animationFade;
  }
  /**
   * @return AnimationFade
   */
  public function getAnimationFade()
  {
    return $this->animationFade;
  }
  /**
   * @param AnimationStatic
   */
  public function setAnimationStatic(AnimationStatic $animationStatic)
  {
    $this->animationStatic = $animationStatic;
  }
  /**
   * @return AnimationStatic
   */
  public function getAnimationStatic()
  {
    return $this->animationStatic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Animation::class, 'Google_Service_Transcoder_Animation');
