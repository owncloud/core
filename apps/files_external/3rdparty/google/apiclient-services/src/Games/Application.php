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

namespace Google\Service\Games;

class Application extends \Google\Collection
{
  protected $collection_key = 'instances';
  protected $internal_gapi_mappings = [
        "achievementCount" => "achievement_count",
        "leaderboardCount" => "leaderboard_count",
  ];
  /**
   * @var int
   */
  public $achievementCount;
  protected $assetsType = ImageAsset::class;
  protected $assetsDataType = 'array';
  /**
   * @var string
   */
  public $author;
  protected $categoryType = ApplicationCategory::class;
  protected $categoryDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $enabledFeatures;
  /**
   * @var string
   */
  public $id;
  protected $instancesType = Instance::class;
  protected $instancesDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastUpdatedTimestamp;
  /**
   * @var int
   */
  public $leaderboardCount;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $themeColor;

  /**
   * @param int
   */
  public function setAchievementCount($achievementCount)
  {
    $this->achievementCount = $achievementCount;
  }
  /**
   * @return int
   */
  public function getAchievementCount()
  {
    return $this->achievementCount;
  }
  /**
   * @param ImageAsset[]
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return ImageAsset[]
   */
  public function getAssets()
  {
    return $this->assets;
  }
  /**
   * @param string
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param ApplicationCategory
   */
  public function setCategory(ApplicationCategory $category)
  {
    $this->category = $category;
  }
  /**
   * @return ApplicationCategory
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string[]
   */
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  /**
   * @return string[]
   */
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Instance[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return Instance[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  /**
   * @param int
   */
  public function setLeaderboardCount($leaderboardCount)
  {
    $this->leaderboardCount = $leaderboardCount;
  }
  /**
   * @return int
   */
  public function getLeaderboardCount()
  {
    return $this->leaderboardCount;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setThemeColor($themeColor)
  {
    $this->themeColor = $themeColor;
  }
  /**
   * @return string
   */
  public function getThemeColor()
  {
    return $this->themeColor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_Games_Application');
