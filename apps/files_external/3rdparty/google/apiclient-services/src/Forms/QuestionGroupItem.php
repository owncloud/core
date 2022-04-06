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

namespace Google\Service\Forms;

class QuestionGroupItem extends \Google\Collection
{
  protected $collection_key = 'questions';
  protected $gridType = Grid::class;
  protected $gridDataType = '';
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $questionsType = Question::class;
  protected $questionsDataType = 'array';

  /**
   * @param Grid
   */
  public function setGrid(Grid $grid)
  {
    $this->grid = $grid;
  }
  /**
   * @return Grid
   */
  public function getGrid()
  {
    return $this->grid;
  }
  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Question[]
   */
  public function setQuestions($questions)
  {
    $this->questions = $questions;
  }
  /**
   * @return Question[]
   */
  public function getQuestions()
  {
    return $this->questions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuestionGroupItem::class, 'Google_Service_Forms_QuestionGroupItem');
