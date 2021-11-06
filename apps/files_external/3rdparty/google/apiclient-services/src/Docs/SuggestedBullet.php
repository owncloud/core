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

namespace Google\Service\Docs;

class SuggestedBullet extends \Google\Model
{
  protected $bulletType = Bullet::class;
  protected $bulletDataType = '';
  protected $bulletSuggestionStateType = BulletSuggestionState::class;
  protected $bulletSuggestionStateDataType = '';

  /**
   * @param Bullet
   */
  public function setBullet(Bullet $bullet)
  {
    $this->bullet = $bullet;
  }
  /**
   * @return Bullet
   */
  public function getBullet()
  {
    return $this->bullet;
  }
  /**
   * @param BulletSuggestionState
   */
  public function setBulletSuggestionState(BulletSuggestionState $bulletSuggestionState)
  {
    $this->bulletSuggestionState = $bulletSuggestionState;
  }
  /**
   * @return BulletSuggestionState
   */
  public function getBulletSuggestionState()
  {
    return $this->bulletSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedBullet::class, 'Google_Service_Docs_SuggestedBullet');
