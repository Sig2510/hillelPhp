<?php

  class Board {
    private $board = [
      ['a', 'b', 'c', 'd'],
      ['d', 'k', 'l', 'm'],
      ['m', 'f', 'b', 's']
    ];


    private $searchWord;
    private $cursor;
    private $x = [];
    private $y = [];
    private $copyBoard = [];

    public function __construct($board = null) {
      if ($board != null) {
        $this->board = $board;
      }
      $this->reserveBoard();
    }

    private function reserveBoard(){
      return $this->copyBoard = $this->board;
    }

    private function reestablishBoard(){
      return $this->board = $this->copyBoard;
    }

    private function startCount($letter, $board){
      $countLetters = 0;

      foreach ($board as $keyOut => $value) {
        foreach ($value as $keyIn => $valueIn) {
          if($letter == $valueIn){
            $countLetters++;
          }
        }
      }

      return $countLetters;
    }

    private function checkPosition($x, $y){
      $boardXsize = count($this->board)-1;
      $boardYsize = count($this->board[$x])-1;

      if($x == 0){
        if($y == 0){
          return 1;
        }else if($y == $boardYsize){
          return 2;
        } else {
          return 3;
        }
      } else if ($x == $boardXsize) {
        if($y == 0){
          return 4;
        } else if($y == $boardYsize) {
          return 5;
        } else{
          return 6;
        }
      } else {
        if($y == 0){
          return 7;
        } else if($y == $boardYsize){
          return 8;
        } else {
          return 9;
        }
      }
    }

    public function searchWord($word) {
      $this->searchWord = str_split($word);
      if (!$this->setStart($this->searchWord[0])) {
        return false;
      }

      array_shift($this->searchWord);
      $tempWord = $this->searchWord;

      for ($this->cursor = 0; $this->cursor < count($this->x); $this->cursor++) {
        if ($this->searchLocalWord($this->x[$this->cursor], $this->y[$this->cursor])) {
          $this->reestablishBoard();
          return true;
        }
        $this->searchWord = $tempWord;
      }
      $this->reestablishBoard();
      return false;
    }

    private function searchLocalWord($x, $y) {
      if (count($this->searchWord) == 0) {
        return true;
      }

      $letter = array_shift($this->searchWord);
      switch ($this->checkPosition($x, $y)) {
        case 1:
          if ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y+1] == $letter) {
            $this->y[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 2:
          if ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 3:
          if ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y+1] == $letter) {
            $this->y[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 4:
            if ($this->board[$x-1][$y] == $letter) {
              $this->x[$this->cursor] -= 1;
              $this->board[$x][$y] = null;
            } elseif ($this->board[$x][$y+1] == $letter) {
              $this->y[$this->cursor] += 1;
              $this->board[$x][$y] = null;
            } else return false;
            break;
        case 5:
          if ($this->board[$x-1][$y] == $letter) {
            $this->x[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 6:
          if ($this->board[$x-1][$y] == $letter) {
            $this->x[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y+1] == $letter) {
            $this->y[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 7:
          if ($this->board[$x-1][$y] == $letter) {
            $this->x[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y+1] == $letter) {
            $this->y[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 8:
          if ($this->board[$x-1][$y] == $letter) {
            $this->x[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
        case 9:
          if ($this->board[$x-1][$y] == $letter) {
            $this->x[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y+1] == $letter) {
            $this->y[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x+1][$y] == $letter) {
            $this->x[$this->cursor] += 1;
            $this->board[$x][$y] = null;
          } elseif ($this->board[$x][$y-1] == $letter) {
            $this->y[$this->cursor] -= 1;
            $this->board[$x][$y] = null;
          } else return false;
          break;
      }

      return $this->searchLocalWord($this->x[$this->cursor], $this->y[$this->cursor]);
    }

    private function setStart($letter) {
      for ($i = 0; $i < count($this->board); $i++) {
        for ($j = 0; $j < count($this->board[$i]); $j++) {
          if ($this->board[$i][$j] == $letter) {
            $this->x[] = $i;
            $this->y[] = $j;
          }
        }
      }

      if (count($this->x) == 0) {
        return false;
      } else {
        return true;
      }
    }
  }

  $b = new Board();

  var_dump($b->searchWord('abcdmlkdmfbs'));
