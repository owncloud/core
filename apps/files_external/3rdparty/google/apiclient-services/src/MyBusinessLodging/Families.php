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

namespace Google\Service\MyBusinessLodging;

class Families extends \Google\Model
{
  /**
   * @var bool
   */
  public $babysitting;
  /**
   * @var string
   */
  public $babysittingException;
  /**
   * @var bool
   */
  public $kidsActivities;
  /**
   * @var string
   */
  public $kidsActivitiesException;
  /**
   * @var bool
   */
  public $kidsClub;
  /**
   * @var string
   */
  public $kidsClubException;

  /**
   * @param bool
   */
  public function setBabysitting($babysitting)
  {
    $this->babysitting = $babysitting;
  }
  /**
   * @return bool
   */
  public function getBabysitting()
  {
    return $this->babysitting;
  }
  /**
   * @param string
   */
  public function setBabysittingException($babysittingException)
  {
    $this->babysittingException = $babysittingException;
  }
  /**
   * @return string
   */
  public function getBabysittingException()
  {
    return $this->babysittingException;
  }
  /**
   * @param bool
   */
  public function setKidsActivities($kidsActivities)
  {
    $this->kidsActivities = $kidsActivities;
  }
  /**
   * @return bool
   */
  public function getKidsActivities()
  {
    return $this->kidsActivities;
  }
  /**
   * @param string
   */
  public function setKidsActivitiesException($kidsActivitiesException)
  {
    $this->kidsActivitiesException = $kidsActivitiesException;
  }
  /**
   * @return string
   */
  public function getKidsActivitiesException()
  {
    return $this->kidsActivitiesException;
  }
  /**
   * @param bool
   */
  public function setKidsClub($kidsClub)
  {
    $this->kidsClub = $kidsClub;
  }
  /**
   * @return bool
   */
  public function getKidsClub()
  {
    return $this->kidsClub;
  }
  /**
   * @param string
   */
  public function setKidsClubException($kidsClubException)
  {
    $this->kidsClubException = $kidsClubException;
  }
  /**
   * @return string
   */
  public function getKidsClubException()
  {
    return $this->kidsClubException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Families::class, 'Google_Service_MyBusinessLodging_Families');
